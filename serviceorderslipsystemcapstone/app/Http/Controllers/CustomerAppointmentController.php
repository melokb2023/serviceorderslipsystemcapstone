<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MyMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Logs;

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
    ]);

    $customerappointment = new CustomerAppointment();
    $customerappointment->customerno = auth()->user()->id;
    $customerappointment->appointmentpurpose = $request->xappointmentpurpose;
    $customerappointment->appointmenttype = $request->xappointmenttype;
     // Check the appointment mode and set dateandtime accordingly
     if ($request->xappointmenttype == 'Scheduled' && $request->filled('xdateandtime')) {
        // Set dateandtime from the xdateandtime field if Scheduled
        $customerappointment->dateandtime = Carbon::parse($request->xdateandtime, 'Asia/Manila');
    } else {
        // Set dateandtime using Carbon if Direct or no xdateandtime provided
        $customerappointment->dateandtime = now('Asia/Manila');
    }
    $customerappointment->save();

    $details = [
        'title' => 'Appointment',
        'body' => 'Hi ' . auth()->user()->name . ', thanks for contacting us. We have received your appointment data and appreciate you for reaching out ',
    ];

    $details2 = [
        'title' => 'Appointment',
        'body' => 'You have an appointment coming from ' . auth()->user()->name . '. '
    ];
    // Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
    Mail::to(auth()->user()->email)->send(new MyMail($details));
    Mail::to('kyle.melo@lccdo.edu.ph')->send(new MyMail($details2));

  
    session()->flash('success_message', 'Data Stored');
    // Send email notification using the custom notification

    $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Customer Sets Appointment";
        $logs->actiondatetime = now();
        $logs->save();

    return view('dashboard');
}

public function CustomerSpecificAppointment(Request $request)
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Views the Specific Appointments for the Customer";
    $logs->actiondatetime = now();
    $logs->save();

    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch all customer appointment numbers for Kenneth (assuming Kenneth's user ID is 5)
        $appointmentNumbers = CustomerAppointment::where('customerno', $user->id)
            ->pluck('customerappointmentnumber');

        // Initialize a query to retrieve customer appointments based on the filtered appointment numbers
        $query = CustomerAppointment::whereIn('customerappointmentnumber', $appointmentNumbers);

        // Filter by appointment number if provided in the request
        if ($request->has('appointment_number')) {
            $query->where('customerappointment.customerappointmentnumber', $request->input('appointment_number'));
        }

        // Get the filtered appointments
        $customerappointments = $query->get();

        // Pass the appointments and appointment numbers to the view
        return view('customer.customerdashboard', compact('customerappointments', 'appointmentNumbers'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
}


  
   
}
