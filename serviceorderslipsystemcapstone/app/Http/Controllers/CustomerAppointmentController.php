<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;
use Illuminate\Http\Request;
use App\Models\CustomerAppointment;
use App\Notifications\AppointmentReceivedNotification;


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
    $customerappointment->customername = auth()->user()->name;
    $customerappointment->customeremail = auth()->user()->email;
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

  
    session()->flash('success_message', 'Data Stored');
    // Send email notification using the custom notification



    return view('customer.startappointment');
}

public function CustomerSpecificAppointment()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch appointments only for Kenneth (assuming Kenneth's user ID is 5)
        $customerappointment = CustomerAppointment::where('customerno', $user->id)->get();

        // Pass the appointments to the view
        return view('customer.customerdashboard', compact('customerappointment'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
}


  
   
}
