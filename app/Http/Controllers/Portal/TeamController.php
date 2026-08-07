<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(){
        return view('portal.team.index');
     }
 
     public function add(){
       
         return view('portal.team.add');
     }
     public function edit($id){
         $flow=Team::findorfail($id);
         return view('portal.team.edit',compact('flow'));
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
         $totalRecords = Team::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Team::select('count(*) as allcount')->where('content', 'like', '%' . $searchValue . '%')->orwhere('name', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%')->count();
         $records = Team::orderBy($columnName, $columnSortOrder)
             ->where('name', 'like', '%' . $searchValue . '%')
             ->orWhere('content', 'like', '%' . $searchValue . '%')
             ->orWhere('email', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
            
             $delete_route = route('portal.team.delete', $record->id); 
             $edit_route = route('portal.team.edit', $record->id); 
             $data_arr[] = array(
                 "id" => $record->id,
                 "name" => $record->name,
                 "email" => $record->email,
                 "content" => $record->content,
                 "designation" => $record->designation,
                 "photo" => $record->photo,
                 "position" => $record->position,
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
         'designation' => 'required|string',
         'email' => 'required|string',
         'content' => 'required|string',
         'photo' => 'required|file|mimes:jpg,jpeg,png',
         'position' => 'nullable|integer|min:1',

     ]);

     if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('team_photos/' . now()->format('Y-m-d'), 'public');
        $fullphotoPath = asset('storage/' . $photoPath); // Generate the public URL


        $flow = Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'content' => $request->content,
            'photo'=>$fullphotoPath,
            'position'=>$request->position ?: ((int) Team::max('position') + 1)

        ]);
    
        // Check if the creation was successful
        if ($flow) {
            return response()->json(['message' => 'Member added successfully', 'redirectURL' => route('portal.team.index')], 200);
        } else {
            return response()->json(['message' => 'Failed to add Team Member'], 500);
        }
    }

    
 }
 public function delete($id){
     $flow=Team::findorfail($id);
     $flow->delete();
     return redirect()->route('portal.team.index')->with('success','Team Deleted');
 }
 
 public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'designation' => 'required|string|max:255',
        'content' => 'required|string',
        'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        'position' => 'nullable|integer|min:1',
    ]);

    // Find the team member
    $flow = Team::findOrFail($id);

    // Update fields
    $flow->name = $request->name;
    $flow->email = $request->email;
    $flow->designation = $request->designation;
    $flow->content = $request->content;
    if ($request->filled('position')) {
        $flow->position = $request->position;
    }

    // Handle file upload
    if ($request->hasFile('photo')) {
        // Store the new photo
        $photoPath = $request->file('photo')->store('team_photos/' . now()->format('Y-m-d'), 'public');
        $fullPhotoPath = asset('storage/' . $photoPath); // Generate public URL
        
        // Update photo path
        $flow->photo = $fullPhotoPath;
    }

    // Save changes
    $flow->save();

    // Return success response
    if ($flow) {
        return response()->json(['message' => 'Team member updated successfully', 'redirectURL' => route('portal.team.index')], 200);
    } else {
        return response()->json(['message' => 'Failed to update team member'], 500);
    }
}
}
