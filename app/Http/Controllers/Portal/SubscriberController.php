<?php

namespace App\Http\Controllers\Portal;
use App\Mail\SubscriberBroadcast;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function index(){
       return view('portal.subscribers.index') ;
    }

    public function store(Request $request){
         
        $validated_data = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);
        $subscriber = Subscriber::create($validated_data);
        return back()->with('success', 'You have successfully subscribed!');
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
        $totalRecords = Subscriber::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Subscriber::select('count(*) as allcount')->where('email', 'like', '%' . $searchValue . '%')->count();
        $records = Subscriber::orderBy($columnName, $columnSortOrder)
            ->where('email', 'like', '%' . $searchValue . '%')
           
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy($columnName, $columnSortOrder)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
           
            $delete_route = route('portal.subscriber.delete', $record->id); 
           
            $data_arr[] = array(
                "id" => $record->id,
                "email" => $record->email,
                "created_at" => $record->created_at,
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
        Subscriber::findorfail($id)->delete();
        return redirect()->route('portal.subscriber.index')->with('success','Subscriber Deleted');
    }
    public function broadcast(){
        return view('portal.subscribers.broadcast');
    }

    public function spreadBroadcast(Request $request)
    {
        // Validate the incoming request
        $validated_data = $request->validate([
            'email_content' => 'required|string|max:255',  // Email subject
            'content' => 'required|string',                // Email body/content
        ]);

        // Get all subscribers from the database
        $subscribers = Subscriber::all();

        // Loop through each subscriber and queue the email
        foreach ($subscribers as $subscriber) {
            // Queue the email to be sent
            Mail::to($subscriber->email)
                ->queue(new SubscriberBroadcast($validated_data['email_content'], $validated_data['content']));
        }

        return response()->json(['message' => 'Email Broadcasted', 'redirectURL' => route('portal.subscriber.index')], SUCCESS_CODE);
    }
}
