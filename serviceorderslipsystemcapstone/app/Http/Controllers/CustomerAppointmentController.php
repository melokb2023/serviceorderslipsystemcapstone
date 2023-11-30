<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use Illuminate\Http\Request;
use App\Models\CustomerAppointment;
use App\Models\ServiceProgress;

class CustomerAppointmentController extends Controller
{
   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validateData = $request->validate([
        'xappointmentpurpose' => ['required', 'max:100'],
        'xappointmenttype' => ['required', 'max:100'],
        'xdateandtime' => ['required'],
    ]);

    $customerappointment = new CustomerAppointment();
    $customerappointment->customerno = auth()->user()->id;
    $customerappointment->appointmentpurpose = $request->xappointmentpurpose;
    $customerappointment->appointmenttype = $request->xappointmenttype;
    $customerappointment->dateandtime = $request->xdateandtime;
    $customerappointment->save();

    $details = [
        'title' => 'Appointment',
        'body' => 'Hi ' . auth()->user()->name . ', thanks for contacting us. We have received your appointment data and appreciate you for reaching out ',
    ];

    // Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
    Mail::to(auth()->user()->email)->send(new MyMail($details));

    return view('customer.startappointment');
}


  
   
}
