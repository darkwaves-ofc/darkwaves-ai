<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Statistics\DavinciUsageService;
use App\Models\CustomTemplate;
use App\Models\Template;
use DataTables;

class AdminDavinciController extends Controller
{
    /**
     * Display Transfer Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', date('m'));

        $davinci = new DavinciUsageService($month, $year);

        $usage_data = [
            'free_current_month' => $davinci->getTotalFreeWordsCurrentMonth(),
            'paid_current_month' => $davinci->getTotalPaidWordsCurrentMonth(),
            'images_current_month' => $davinci-> getTotalImagesCurrentMonth(),
            'contents_current_month' => $davinci->getTotalContentsCurrentMonth(),
            'free_current_year' => $davinci->getTotalFreeWordsCurrentYear(),
            'paid_current_year' => $davinci->getTotalPaidWordsCurrentYear(),
            'images_current_year' => $davinci->getTotalImagesCurrentYear(),
            'contents_current_year' => $davinci->getTotalContentsCurrentYear(),
        ];
        
        $total_words_monthly = $davinci->getTotalWordsCurrentMonth(); 
        $total_words_yearly = $davinci->getTotalWordsCurrentYear();

        $chart_data['words_yearly'] = json_encode($davinci->getMonthlyWordsChart());
        $chart_data['words_monthly'] = json_encode($davinci->getDailyWordsChart());

        return view('admin.davinci.dashboard.index', compact('chart_data', 'usage_data', 'total_words_monthly', 'total_words_yearly'));
    }


    /**
     * Display Transfer Results
     *
     * @return \Illuminate\Http\Response
     */
    public function templates(Request $request)
    {
        if ($request->ajax()) {
            $data = Template::orderBy('group', 'asc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>      
                                        <a class="editButton" id="' . $row["id"] . '" href="#"><i class="fa fa-edit table-action-buttons view-action-button" title="Edit Description"></i></a>      
                                        <a class="makeProButton" id="' . $row["id"] . '" href="#"><i class="fa-solid fa-square-parking table-action-buttons request-action-button" title="Move to Pro Template"></i></a>
                                        <a class="removeProButton" id="' . $row["id"] . '" href="#"><i class="fa-solid fa-square-parking-slash table-action-buttons delete-action-button" title="Remove from Pro Template"></i></a> 
                                        <a class="activateButton" id="' . $row["id"] . '" href="#"><i class="fa fa-check table-action-buttons request-action-button" title="Activate Template"></i></a>
                                        <a class="deactivateButton" id="' . $row["id"] . '" href="#"><i class="fa fa-close table-action-buttons delete-action-button" title="Deactivate Template"></i></a>  
                                    </div>';
                        
                        return $actionBtn;
                    })
                    ->addColumn('updated-on', function($row){
                        $created_on = '<span class="font-weight-bold">'.date_format($row["updated_at"], 'd M Y').'</span><br><span>'.date_format($row["updated_at"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('custom-name', function($row){
                        $user = '<div class="d-flex">
                                    <div class="template-edit mr-2">'. $row['icon'] .'</div>
                                    <div class="widget-user-name pt-1"><span class="font-weight-bold">'. $row['name'] .'</span></div>
                                </div>';
                        return $user;
                    }) 
                    ->addColumn('package', function($row){
                        $package = ($row['professional']) ? 'Professional' : 'Regular';
                        $size = '<span class="cell-box plan-'. strtolower($package) .'">' . $package .'</span>';
                        return $size;
                    })
                    ->addColumn('custom-status', function($row){
                        $status = ($row['status']) ? 'Active' : 'Deactive';
                        $custom_voice = '<span class="cell-box status-'.strtolower($status).'">'. $status.'</span>';
                        return $custom_voice;
                    })
                    ->rawColumns(['actions', 'updated-on', 'custom-name', 'package', 'custom-status'])
                    ->make(true);
                    
        }

        return view('admin.davinci.templates.index');
    }


    /**
     * Update the description.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function descriptionUpdate(Request $request)
    {   
        if ($request->ajax()) {

            if (request('type') == 'custom') {
                $template = CustomTemplate::where('id', request('id'))->firstOrFail();
            } else {
                $template = Template::where('id', request('id'))->firstOrFail();
            } 
            
            $template->update(['description' => request('name')]);
            return  response()->json('success');
        } 
    }


    /**
     * Activate template
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function templateActivate(Request $request)
    {
        if ($request->ajax()) {

            if (request('type') == 'custom') {
                $template = CustomTemplate::where('id', request('id'))->firstOrFail();
            } else {
                $template = Template::where('id', request('id'))->firstOrFail();
            }

            if ($template->status == true) {
                return  response()->json(true);
            }

            $template->update(['status' => true]);

            return  response()->json('success');
        }
    }


    /**
     * Activate all templates.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function templateActivateAll(Request $request)
    {
        if ($request->ajax()) {

            Template::query()->update(['status' => true]);

            return  response()->json('success');
        } 
    }


    /**
     * Deactivate template.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function templateDeactivate(Request $request)
    {
        if ($request->ajax()) {

            if (request('type') == 'custom') {
                $template = CustomTemplate::where('id', request('id'))->firstOrFail();
            } else {
                $template = Template::where('id', request('id'))->firstOrFail();
                
            } 

            if ($template->status == false) {
                return  response()->json(false);
            }

            $template->update(['status' => false]);

            return  response()->json('success');
        }
    }


     /**
     * Deactivate all templates.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function templateDeactivateAll(Request $request)
    {
        if ($request->ajax()) {

            Template::query()->update(['status' => false]);

            return  response()->json('success');
        }         
    }


    /**
     * Assign pro package
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignProPackage(Request $request)
    {
        if ($request->ajax()) {

            if (request('type') == 'custom') {
                $template = CustomTemplate::where('id', request('id'))->firstOrFail();
            } else {
                $template = Template::where('id', request('id'))->firstOrFail();
                
            } 

            if ($template->professional == true) {
                return  response()->json(true);
            }

            $template->update(['professional' => true]);

            return  response()->json('success');
        }
    }


    /**
     * Remove pro package
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeProPackage(Request $request)
    {
        if ($request->ajax()) {

            if (request('type') == 'custom') {
                $template = CustomTemplate::where('id', request('id'))->firstOrFail();
            } else {
                $template = Template::where('id', request('id'))->firstOrFail();
                
            } 

            if ($template->professional == false) {
                return  response()->json(false);
            }

            $template->update(['professional' => false]);

            return  response()->json('success');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTemplate(Request $request)
    {
        if ($request->ajax()) {

            $result = CustomTemplate::where('id', request('id'))->firstOrFail();  

            if ($result->user_id == auth()->user()->id){

                $result->delete();

                return response()->json('success');    
    
            } else{
                return response()->json('error');
            } 
        }              
    }

}
