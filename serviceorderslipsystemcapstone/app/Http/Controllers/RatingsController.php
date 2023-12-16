<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use App\Models\Rating;
use App\Models\Service;
use App\Models\CustomerAppointment;
class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerrating = Rating::all();
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
$customerrating->reviewerid = auth()->user()->id;
$customerrating->reviewername = auth()->user()->name;
$customerrating->review = $request->xreview;
$customerrating->rating = $request->xrating;
$customerrating->save();
$details = [
    'title' => 'Work Completion Notification',
    'body' => 'You have a feedback!',
];

// Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
Mail::to('kyle.melo@lccdo.edu.ph')->send(new MyMail($details));
session()->flash('success_message', 'Rating Has Been Saved');
return view('customer.startappointment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    // Get completed services with Rating
    $completedServices = Service::where('serviceprogress', 'Completed')
        ->get();

    // Get service numbers that are not listed in service data
    $listedServiceNumbers = Rating::pluck('serviceno')->unique();
    $filteredServices = $completedServices->reject(function ($servicedata) use ($listedServiceNumbers) {
        // Adjust the condition based on your specific requirements
        return $listedServiceNumbers->contains($servicedata->serviceno);
    });

    return $filteredServices;
}
        public function getService(){
        $servicedata = Service::all();
        return view('customer.customerrating', compact('servicedata'));
    }

}
