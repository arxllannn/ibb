<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessPurchaseFlow;

class BusinessPurchaseFlowController extends Controller
{
    public function index(){
        return view('portal.BusinessPurchase.index');
    }

    public function add(){
        return view('portal.BusinessPurchase.add');
    }
    public function edit($id){
        $flow=BusinessPurchaseFlow::findorfail($id);
        return view('portal.BusinessPurchase.edit',compact('flow'));
    }

    public function list(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = BusinessPurchaseFlow::select('count(*) as allcount')->count();
        $totalRecordswithFilter = BusinessPurchaseFlow::select('count(*) as allcount')->where('step_name', 'like', '%' . $searchValue . '%')->count();
        $records = BusinessPurchaseFlow::orderBy($columnName, $columnSortOrder)
            ->where('step_name', 'like', '%' . $searchValue . '%')
            ->orWhere('id', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
           
            $delete_route = route('portal.business-purchase-flow.delete', $record->id); 
            $edit_route = route('portal.business-purchase-flow.edit', $record->id); 
            $data_arr[] = array(
                "id" => $record->id,
                "step_name" => $record->step_name,
                "content" => $record->content,
                "action" =>
                    '<div class="btn-group">
                   
                    <a  href="' . $edit_route . '" class="mr-1 text-info" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" onclick="delete_confirmation(\'' . $delete_route . '\')" class="mr-1 text-danger" title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>'
            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        return \Response::json($response);
    }
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'step_name' => 'required|string|max:255',
        'step_content' => 'required|string',
        'step_video' => 'file|mimes:mp4,mov,ogg,qt', // Adjust size and file type as needed
    ]);

    // Initialize the video URL variable
    $fullVideoPath = null;

    // Handle the video file upload
    if ($request->hasFile('step_video')) {
        $videoPath = $request->file('step_video')->store('flow_videos/' . now()->format('Y-m-d'), 'public');
        $fullVideoPath = asset('storage/' . $videoPath); // Generate the public URL
    
        
       
    }
    $flow = BusinessPurchaseFlow::create([
        'step_name' => $request->step_name,
        'content' => $request->step_content,
        'video_url' => $fullVideoPath, // Use the asset helper to generate the public URL
    ]);

    // Check if the creation was successful
    if ($flow) {
        return response()->json(['message' => 'Step added successfully', 'redirectURL' => route('portal.business-purchase-flow.index')], 200);
    } else {
        return response()->json(['message' => 'Failed to add Step'], 500);
    }
}
public function delete($id){
    $flow=BusinessPurchaseFlow::findorfail($id);
    $flow->delete();
    return redirect()->route('portal.business-purchase-flow.index')->with('success','Step Deleted');
}

public function update(Request $request, $id = null)
{
    // Validate the incoming request data
    $request->validate([
        'step_name' => 'required|string|max:255',
        'step_content' => 'required|string',
        'step_video' => 'nullable|file|mimes:mp4,mov,ogg,qt', // Adjust size and file type as needed
    ]);

    // Find the BusinessSaleFlow instance or create a new one
    $flow = $id ? BusinessPurchaseFlow::findOrFail($id) : new BusinessPurchaseFlow;

    // Initialize the video URL variable
    $fullVideoPath = $flow->video_url;

    // Handle the video file upload
    if ($request->hasFile('step_video')) {
        $videoPath = $request->file('step_video')->store('flow_videos/' . now()->format('Y-m-d'), 'public');
        $fullVideoPath = asset('storage/' . $videoPath); // Generate the public URL
    }

    // Update or create the BusinessSaleFlow instance
    $flow->step_name = $request->step_name;
    $flow->content = $request->step_content;
    $flow->video_url = $fullVideoPath;
    $flow->save();

    // Check if the save was successful
    if ($flow) {
        return response()->json(['message' => 'Step updated successfully', 'redirectURL' => route('portal.business-purchase-flow.index')], 200);
    } else {
        return response()->json(['message' => 'Failed to update Step'], 500);
    }
}
}
