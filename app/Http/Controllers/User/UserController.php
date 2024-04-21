<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Services\Statistics\DavinciUsageService;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Models\SubscriptionPlan;
use App\Models\Subscriber;
use App\Models\User;
use DB;


class UserController extends Controller
{
    use Notifiable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {                         
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        $davinci = new DavinciUsageService($month, $year);

        $data = [
            'words' => $davinci->userTotalWordsGenerated(),
            'images' => $davinci->userTotalImagesGenerated(),
        ];
        
        $chart_data['word_usage'] = json_encode($davinci->userMonthlyWordsChart());
        $chart_data['image_usage'] = json_encode($davinci->userMonthlyImagesChart());
        
        if (auth()->user()->hasActiveSubscription()) {
            $subscription = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();
        } else {
            $subscription = false;
        }

        $user_subscription = ($subscription) ? SubscriptionPlan::where('id', auth()->user()->plan_id)->first() : '';
        
        $progress = [
            'words' => (auth()->user()->total_words > 0) ? ((auth()->user()->available_words / auth()->user()->total_words) * 100) : 0,
        ];

        return view('user.profile.index', compact('chart_data', 'data', 'subscription', 'user_subscription', 'progress'));           
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {   
        $storage['available'] = $this->formatSize(auth()->user()->storage_total * 1000000);

        return view('user.profile.edit', compact('storage'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {           
        $user->update(request()->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user)],
            'job_role' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'phone_number' => 'nullable|max:20',
            'address' => 'nullable|string|max:255',            
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]));
        
        if (request()->has('profile_photo')) {
        
            try {
                request()->validate([
                    'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048'
                ]);
                
            } catch (\Exception $e) {
                toastr()->error(__('PHP FileInfo function is not enabled in your hosting, make sure to enable it first'));
                return redirect()->back();
            }
            
            $image = request()->file('profile_photo');

            $name = Str::random(20);
         
            $folder = '/uploads/img/users/';
          
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            
            $this->uploadImage($image, $folder, 'public', $name);

            $user->profile_photo_path = $filePath;

            $user->save();
        }

        toastr()->success(__('Profile Successfully Updated'));
        return redirect()->route('user.profile.edit', compact('user'));

    }


    /**
     * Upload user profile image
     */
    public function uploadImage(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $image = $file->storeAs($folder, $name .'.'. $file->getClientOriginalExtension(), $disk);

        return $image;
    }


    /**
     * Format storage space to readable format
     */
    private function formatSize($size, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
    
        $size = max($size, 0); 
        $pow = floor(($size ? log($size) : 0) / log(1000)); 
        $pow = min($pow, count($units) - 1); 
        
        $size /= pow(1000, $pow);

        return round($size, $precision) . $units[$pow]; 
    }
}
