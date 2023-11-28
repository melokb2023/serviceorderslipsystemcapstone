<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use App\Models\Rating;
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
   // Validation rules
   $rules = [
    'xrateemail' => 'required|email|ends_with:@gmail.com',
    'xreview' => 'required',
    'xrating' => 'required|numeric|min:1|max:5',
];

// Custom error messages
$messages = [
    'xrateemail.email' => 'The rateemail field must be a valid email address.',
    'xrateemail.ends_with' => 'The rateemail must be a Gmail address.',
    'xreview.required' => 'The review field is required.',
    'xrating.numeric' => 'The rating must be a number.',
    'xrating.min' => 'The rating must be at least :min.',
    'xrating.max' => 'The rating must not be greater than :max.',
];

// Validate the request data
$validator = Validator::make($request->all(), $rules, $messages);

// Check if the validation fails
if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}

// If validation passes, save the data
$customerrating = new Rating();
$customerrating->rateemail = $request->xrateemail;
$customerrating->review = $request->xreview;
$customerrating->rating = $request->xrating;
$customerrating->save();
$details = [
    'title' => 'Work Completion Notification',
    'body' => 'You have a feedback!',
];

// Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
Mail::to('kyle.melo@lccdo.edu.ph')->send(new MyMail($details));
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

    public function getAppointmentInfo(){
        $customerappointment = CustomerAppointment::all();
        return view('customer.customerrating', compact('customerappointment'));
    }

}
