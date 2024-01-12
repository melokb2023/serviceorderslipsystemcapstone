<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;
use App\Models\Rating;
use App\Models\Logs;
use App\Models\Service;
use App\Models\CustomerAppointment;
class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Accessed the Rating Menu";
    $logs->actiondatetime = now();
    $logs->save();

    // Get all ratings initially
    $query = Rating::join('servicedata', 'customerrating.serviceno', '=', 'servicedata.serviceno')
        ->join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')
        ->join('users as customer', 'customerappointment.customerno', '=', 'customer.id')
        ->join('stafflist', 'servicedata.staffnumber', '=', 'stafflist.staffnumber')
        ->join('users as staff', 'stafflist.id', '=', 'staff.id')
        ->select(
            'customerrating.*',
            'customer.name as customername',
            'staff.name as staffname'
        );

    // Check if there is a filter for Customer Name
    if ($request->filled('customer_name_filter')) {
        $query->where('customer.name', 'like', '%' . $request->input('customer_name_filter') . '%');
    }

    // Fetch the customerrating based on the applied filters
    $customerrating = $query->get();

    return view('admin.customerreviewsandratings', compact('customerrating'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 

$customerrating = new Rating();
$customerrating->serviceno = $request->xserviceno;
$customerrating->review = $request->xreview;
$customerrating->staffperformance = $request->xstaffperformance;
$customerrating->rating = $request->xrating;

$customerrating->save();
$details = [
    'title' => 'Work Completion Notification',
    'body' => 'You have a feedback!',
];

// Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
Mail::to('kyle.melo@lccdo.edu.ph')->send(new MyMail($details));
session()->flash('success_message', 'Rating Has Been Saved');
$logs = new Logs;
$logs->userid = Auth::id(); 
$logs->description = "Accessed the Rating Menu. Rated Service No.: {$request->xserviceno}, Staff Performance Score: {$request->xstaffperformance}, Rating Score: {$request->xrating} by {$customerrating->reviewername}";
$logs->actiondatetime = now();
$logs->save();
return view('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Checks Overall Rating of the Company. Rating No.: {$id}";
        $logs->actiondatetime = now();
        $logs->save();
        $customerrating= Rating::where('ratingno', $id)->get();
        return view('admin.customerreviewsandratingsshow', compact('customerrating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customerrating= Rating::where('ratingno', $id);
        $customerrating->delete();
        return redirect()->route('customerrating');
    }

   
    
    public function getCompletedServicesforRating()
{
    // Get the authenticated customer's id
    $authenticatedCustomerId = Auth::id();

    // Get completed services with Rating for the authenticated customer
    $completedServices = Service::where('serviceprogress', 'Completed')
        ->whereHas('customerAppointment', function ($query) use ($authenticatedCustomerId) {
            $query->where('customerno', $authenticatedCustomerId);
        })
        ->get();

    return $completedServices;
}

public function getService(){
    $servicedata = Service::join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')
        ->join('users as customer', 'customerappointment.customerno', '=', 'customer.id')
        ->join('stafflist', 'servicedata.staffnumber', '=', 'stafflist.staffnumber')
        ->join('users as staff', 'stafflist.id', '=', 'staff.id')
        ->where('customer.id', Auth::id())
        ->select(
            'servicedata.*',
            'customer.name as customername',
            'customer.email as customeremail',
            'customerappointment.dateandtime',
            'stafflist.*',
            'staff.name as staffname',
            'staff.email as staffemail'
        )
        ->get();

    return view('customer.customerrating', compact('servicedata'));
}


 
}
