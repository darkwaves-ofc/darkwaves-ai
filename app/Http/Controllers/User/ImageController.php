<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LicenseController;
use App\Services\Statistics\UserService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use App\Models\SubscriptionPlan;
use App\Models\Image;
use App\Models\User;
use Yajra\DataTables\DataTables;


class ImageController extends Controller
{
    private $api;
    private $user;

    public function __construct()
    {
        $this->api = new LicenseController();
        $this->user = new UserService();
    }

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            $data = Image::where('user_id', Auth::user()->id)->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>
                                            <a download href=" '. url($row["image"]) .'"><i class="fa-solid fa-cloud-arrow-down table-action-buttons edit-action-button" title="Download Image"></i></a>
                                            <a class="deleteResultButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="Delete Image"></i></a> 
                                        </div>';
                        return $actionBtn;
                    })
                    ->addColumn('created-on', function($row){
                        $created_on = '<span class="font-weight-bold">'.date_format($row["created_at"], 'd M Y').'</span><br><span>'.date_format($row["created_at"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('custom-image', function($row){
                        $path = URL::asset($row['image']);
                        $user = '<div class="d-flex">
                                <div class="widget-user-image-sm overflow-hidden mr-4"><img alt="Avatar" src="' . $path . '"></div>
                                <div><a class="file-name font-weight-bold" href="#" id="'.$row["id"].'">' . $row['name'] . '</a><br><span class="text-muted">'.$row["description"].'</span></div>
                            </div>';                        
                        return $user;
                    })
                    ->rawColumns(['actions', 'created-on', 'custom-image'])
                    ->make(true);
                    
        }

        return view('user.images.index');
    }


    /**
	*
	* Process Davinci Image
	* @param - file id in DB
	* @return - confirmation
	*
	*/
	public function process(Request $request) 
    {
        if ($request->ajax()) {

            $open_ai = new OpenAi(config('services.openai.key'));

            $verify = $this->user->verify_license();
            if($verify['status']!=true){return false;}

            # Check if user has access to the template
            if (auth()->user()->group == 'user') {
                if (config('settings.image_feature_user') != 'allow') {
                    $data['status'] = 'error';
                    $data['message'] = __('AI Image feature is not available for your account, subscribe to get access');
                    return $data;
                }
            } elseif (!is_null(auth()->user()->group)) {
                $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
                if ($plan) {
                    if (!$plan->image_feature) {
                        $data['status'] = 'error';
                        $data['message'] = __('AI Image feature is not available for your subscription plan');
                        return $data;
    
                    }
                }
            }             

            # Verify if user has enough credits
            if ((auth()->user()->available_images + auth()->user()->available_images_prepaid) < $request->max_results) {
                $data['status'] = 'error';
                $data['message'] = __('Not enough image balance to proceed, subscribe or top up your image balance and try again');
                return $data;
            }


            $max_results = (int)$request->max_results;

            $complete = $open_ai->image([
                'prompt' => $request->title,
                'size' => $request->resolution,
                'n' => $max_results,
                "response_format" => "url",
            ]);

            $response = json_decode($complete , true);
            $plan_type = (auth()->user()->plan_id) ? 'paid' : 'free';  

            if (isset($response['data'])) {
                if (count($response['data']) > 1) {
                    foreach ($response['data'] as $key => $value) {
                        $url = $value['url'];

                        $name = Str::random(10) . '.png';

                        $image = file_get_contents($url);
                        file_put_contents(public_path('images/' . $name), $image);

                        $content = new Image();
                        $content->user_id = auth()->user()->id;
                        $content->name = $request->name . '-' . $key;
                        $content->description = $request->title;
                        $content->resolution = $request->resolution;
                        $content->image = 'images/' . $name;
                        $content->plan_type = $plan_type;
                        $content->save();
                    }
                } else {
                    $url = $response['data'][0]['url'];

                    $name = Str::random(10) . '.png';

                    $image = file_get_contents($url);
                    file_put_contents(public_path('images/' . $name), $image);

                    $content = new Image();
                    $content->user_id = auth()->user()->id;
                    $content->name = $request->name;
                    $content->description = $request->title;
                    $content->resolution = $request->resolution;
                    $content->image = 'images/' . $name;
                    $content->plan_type = $plan_type;
                    $content->save();
                }
                
                # Update credit balance
                $this->updateBalance($max_results);

                $data['status'] = 'success';
                $data['old'] = auth()->user()->available_images + auth()->user()->available_images_prepaid;
                $data['current'] = auth()->user()->available_images + auth()->user()->available_images_prepaid - $max_results;
                return $data; 

            } else {

                $message = $response['error']['message'];

                $data['status'] = 'error';
                $data['message'] = $message;
                return $data;
            }
           

        }
	}


    /**
	*
	* Update user image balance
	* @param - total words generated
	* @return - confirmation
	*
	*/
    public function updateBalance($images) {

        $user = User::find(Auth::user()->id);

        if (Auth::user()->available_words > $images) {

            $total_images = Auth::user()->available_images - $images;
            $user->available_images = $total_images;

        } elseif (Auth::user()->available_images_prepaid > $images) {

            $total_images_prepaid = Auth::user()->available_images_prepaid - $images;
            $user->available_images_prepaid = $total_images_prepaid;

        } elseif ((Auth::user()->available_images + Auth::user()->available_images_prepaid) == $images) {

            $user->available_images = 0;
            $user->available_images_prepaid = 0;

        } else {

            $remaining = $images - Auth::user()->available_images;
            $user->available_images = 0;

            $user->available_images_prepaid = Auth::user()->available_images_prepaid - $remaining;

        }

        $user->update();

    }


     /**
	*
	* Process media file
	* @param - file id in DB
	* @return - confirmation
	*
	*/
	public function view(Request $request) 
    {
        if ($request->ajax()) {

            $verify = $this->user->verify_license();
            if($verify['status']!=true){return false;}

            $image = Image::where('id', request('id'))->first(); 

            if ($image->user_id == Auth::user()->id){

                $data['status'] = 'success';
                $data['url'] = URL::asset($image->image);
                return $data;  
    
            } else{

                $data['status'] = 'error';
                $data['message'] = __('There was an error while retrieving this image');
                return $data;
            }  
        }
	}


    /**
	*
	* Delete File
	* @param - file id in DB
	* @return - confirmation
	*
	*/
	public function delete(Request $request) 
    {
        if ($request->ajax()) {

            $verify = $this->user->verify_license();
            if($verify['status']!=true){return false;}

            $image = Image::where('id', request('id'))->first(); 

            if ($image->user_id == auth()->user()->id){

                if(Storage::exists($image->image)){
                    Storage::delete($image->image);
                }

                $image->delete();

                $data['status'] = 'success';
                return $data;  
    
            } else{

                $data['status'] = 'error';
                $data['message'] = __('There was an error while deleting the image');
                return $data;
            }  
        }
	}

}
