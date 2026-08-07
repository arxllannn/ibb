<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function index(){
        return view('portal.resource.index');
     }
 
     public function add(){
       
         return view('portal.resource.add');
     }
     public function edit($id){
         $flow=Resource::findorfail($id);
         return view('portal.resource.edit',compact('flow'));
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
         $totalRecords = Resource::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Resource::select('count(*) as allcount')->where('content', 'like', '%' . $searchValue . '%')->orwhere('name', 'like', '%' . $searchValue . '%')->orwhere('website', 'like', '%' . $searchValue . '%')->count();
         $records = Resource::orderBy($columnName, $columnSortOrder)
             ->where('name', 'like', '%' . $searchValue . '%')
             ->orWhere('content', 'like', '%' . $searchValue . '%')
             ->orWhere('website', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
            
             $delete_route = route('portal.resource.delete', $record->id); 
             $edit_route = route('portal.resource.edit', $record->id); 
             $data_arr[] = array(
                 "id" => $record->id,
                 "name" => $record->name,
                 "website" => $record->website,
                 "content" => $record->content,
                 "phone" => $record->phone,
                 "photo" => $record->photo,
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
         'name' => 'required|string|max:255',
         'phone' => 'required|string',
         'website' => 'required|url',
         'content' => 'required|string',
         'photo' => 'required|file|mimes:jpg,jpeg,png',
         
     ]);

     if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('resource_photos/' . now()->format('Y-m-d'), 'public');
        $fullphotoPath = asset('storage/' . $photoPath); // Generate the public URL 
        
        
        $flow = Resource::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'website' => $request->website,
            'content' => $request->content,
            'photo'=>$fullphotoPath
           
        ]);
    
        // Check if the creation was successful
        if ($flow) {
            return response()->json(['message' => 'Resource added successfully', 'redirectURL' => route('portal.resource.index')], 200);
        } else {
            return response()->json(['message' => 'Failed to add Resource'], 500);
        }
    }

    
 }
 public function delete($id){
     $flow=Resource::findorfail($id);
     $flow->delete();
     return redirect()->route('portal.resource.index')->with('success','Resource Deleted');
 }
 
 public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'website' => 'required|url',
        'phone' => 'required|string',
        'content' => 'required|string',
        'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Find the team member
    $flow = Resource::findOrFail($id);

    // Update fields
    $flow->name = $request->name;
    $flow->website = $request->website;
    $flow->phone = $request->phone;
    $flow->content = $request->content;

    // Handle file upload
    if ($request->hasFile('photo')) {
        // Store the new photo
        $photoPath = $request->file('photo')->store('resource_photos/' . now()->format('Y-m-d'), 'public');
        $fullPhotoPath = asset('storage/' . $photoPath); // Generate public URL
        
        // Update photo path
        $flow->photo = $fullPhotoPath;
    }

    // Save changes
    $flow->save();

    // Return success response
    if ($flow) {
        return response()->json(['message' => 'Resource  updated successfully', 'redirectURL' => route('portal.resource.index')], 200);
    } else {
        return response()->json(['message' => 'Failed to update Resource'], 500);
    }
}
}
