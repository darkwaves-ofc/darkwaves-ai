<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\CustomTemplate;
use Yajra\DataTables\DataTables;

class CustomTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomTemplate::orderBy('group', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    $actionBtn = '<div>      
                                    <a class="editButton" id="' . $row["id"] . '" type="' . $row['type'] . '" href="#"><i class="fa fa-edit table-action-buttons view-action-button" title="Edit Description"></i></a>      
                                    <a class="makeProButton" id="' . $row["id"] . '" type="' . $row['type'] . '" href="#"><i class="fa-solid fa-square-parking table-action-buttons request-action-button" title="Move to Pro Template"></i></a>
                                    <a class="removeProButton" id="' . $row["id"] . '" type="' . $row['type'] . '" href="#"><i class="fa-solid fa-square-parking-slash table-action-buttons delete-action-button" title="Remove from Pro Template"></i></a> 
                                    <a class="activateButton" id="' . $row["id"] . '" type="' . $row['type'] . '" href="#"><i class="fa fa-check table-action-buttons request-action-button" title="Activate Template"></i></a>
                                    <a class="deactivateButton" id="' . $row["id"] . '" type="' . $row['type'] . '" href="#"><i class="fa fa-close table-action-buttons delete-action-button" title="Deactivate Template"></i></a>  
                                    <a class="deleteTemplate" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="Delete Template"></i></a> 
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

        return view('admin.davinci.custom.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);     
        
        $template_code = strtoupper(Str::random(5));
        $status = (isset($request->activate)) ? true : false;
        $tone = (isset($request->tone)) ? true : false;
        $icon = ($request->category == 'text') ? str_replace('"></i>', ' main-icon"></i>', $request->icon) : str_replace('"></i>', ' ' . $request->category . '-icon"></i>', $request->icon);

        $fields = array();

        foreach ($request->names as $key => $value) {
            if (!is_null($value)) {
                $fields[$key]['name'] = $value;
                $fields[$key]['placeholder'] = $request->placeholders[$key];
                $fields[$key]['input'] = $request->input_field[$key];
                $fields[$key]['code'] = $request->code[$key];
            }
        }

        $template = new CustomTemplate([
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'status' => $status,
            'professional' => false,
            'template_code' => $template_code,
            'name' => $request->name,
            'icon' => $icon,
            'group' => $request->category,
            'slug' => 'custom-template',
            'prompt' => $request->prompt,
            'tone' => $tone,
            'fields' => $fields,
        ]); 
        
        $template->save();            

        toastr()->success(__('Custom Template was successfully created'));
        return redirect()->back();       
    }

}
