<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMarkdown;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index(){
        return view('portal.messages.index');
    }

    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:30',
        'phone' => 'nullable|string|max:15',
        'email' => 'required|email|max:35',
        'subject' => 'nullable|string|max:30',
        'message' => 'nullable|string',
        'g-recaptcha-response' => 'required|captcha', // Validate CAPTCHA
    ]);

    // Set default values for phone and subject if not provided
    $validatedData['phone'] = $validatedData['phone'] ?? 'N/A';
    $validatedData['subject'] = $validatedData['subject'] ?? 'N/A';
    $validatedData['message'] = $validatedData['message'] ?? 'N/A';
    Message::create($validatedData);
    try {
        // Send the email
        Mail::to('support@infinitybusinessbrokers.com')
            ->send(new ContactMessageMarkdown(
                $validatedData['name'],
                $validatedData['phone'],
                $validatedData['email'],
                $validatedData['subject'],
                $validatedData['message']
            ));

        // Redirect with a success message
        
    } catch (\Exception $e) {
        // Log the error and provide user-friendly feedback
        \Log::error('Message saving or email sending error: ' . $e->getMessage());
       // return redirect()->back()->with('error', 'There was an issue submitting your message. Please try again later.');
    }
    return redirect()->back()->with('success', 'Your message has been sent successfully!');
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
         $totalRecords = Message::select('count(*) as allcount')->count();
         $totalRecordswithFilter = Message::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->orwhere('phone', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%')->orwhere('subject', 'like', '%' . $searchValue . '%')->orwhere('message', 'like', '%' . $searchValue . '%')->count();
         $records = Message::orderBy($columnName, $columnSortOrder)
             ->where('name', 'like', '%' . $searchValue . '%')
             ->orwhere('phone', 'like', '%' . $searchValue . '%')
             ->orwhere('email', 'like', '%' . $searchValue . '%')
             ->orwhere('subject', 'like', '%' . $searchValue . '%')
             ->orwhere('message', 'like', '%' . $searchValue . '%')
             ->select('*')
             ->skip($start)
             ->take($rowperpage)
             ->orderBy($columnName, $columnSortOrder)
             ->orderBy('created_at', 'desc') 
             ->get();
 
         $data_arr = array();
 
         foreach ($records as $record) {
            
             $delete_route = route('portal.message.delete', $record->id); 
              
             $data_arr[] = array(
                 "id" => $record->id,
                 "name" => $record->name,
                 "phone" => $record->phone,
                 "email" => $record->email,
                 "message" => $record->message,
                 "subject" => $record->subject,
                 "created_at" => $record->created_at->format('Y-m-d H:i:s'),
                 "action" =>
                     '<div class="btn-group">
                    
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

     public function delete($id){
        $flow=Message::findorfail($id);
        $flow->delete();
        return redirect()->route('portal.message.index')->with('success','Message Deleted');
    }
}
