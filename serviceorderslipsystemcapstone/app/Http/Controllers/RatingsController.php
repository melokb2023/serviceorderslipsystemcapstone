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
        $query = Rating::query();
    
        // Check if there is a reviewername_filter parameter in the URL
        if ($request->has('reviewername_filter')) {
            // If the reviewername_filter is provided, search the results by the reviewer name
            $query->where('reviewername', 'like', '%' . $request->input('reviewername_filter') . '%');
        }
    
        // Fetch the unique reviewer names for the combo box
        $reviewerNames = Rating::distinct('reviewername')->pluck('reviewername');
    
        // Fetch the customerrating based on the applied filters
        $customerrating = $query->get();
    
        return view('admin.customerreviewsandratings', compact('customerrating', 'reviewerNames'));
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
$customerrating->reviewerid = auth()->user()->id;
$customerrating->reviewername = auth()->user()->name;
$customerrating->review = $request->xreview;
$customerrating->staffperformance = $request->xstaffperformance;
$customerrating->rating = $request->xrating;
$service= Service::where('serviceno', $request->xserviceno)->first();
if ($service) {
    $customerrating->assignedstaff = $service->staffname;
}
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
    $logs->description = "Accessed the Rating Menu. Rated Service No.: {$request->xserviceno}, Staff Performance Score: {$request->xstaffperformance}, Rating Score: {$request->xrating}";
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
        // Get the name of the currently authenticated customer
        $authenticatedCustomerName = Auth::user()->name;
    
        // Get service numbers assigned to the authenticated customer from Rating
        $assignedServiceNumbers = Rating::where('reviewername', $authenticatedCustomerName)
            ->pluck('serviceno')
            ->unique();
    
        // Get completed services with Rating for the authenticated customer
        $completedServices = Service::where('serviceprogress', 'Completed')
            ->where('customername', $authenticatedCustomerName)
            ->whereNotIn('serviceno', $assignedServiceNumbers)
            ->get();
    
        // You may further filter or adjust the condition based on your specific requirements
    
        return $completedServices;
    }
    public function getService(){
        $servicedata = Service::all();
        return view('customer.customerrating', compact('servicedata'));
    }


 
}
