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
        $validateData =$request->validate([
            'xfirstname' =>['required', 'max:100'],
            'xmiddlename'=>['required','max:100'],
            'xlastname' =>['required', 'max:100'],
            'xcontactnumber' =>['required', 'max:100'],
            'xemail' =>['required', 'max:100'],
            'xaddress' =>['required', 'max:100'],
            'xappointmentpurpose' =>['required', 'max:100'],
            'xappointmenttype' =>['required', 'max:100'],
            'xdateandtime' =>['required'],
        ]);
        
        $customerappointment = new CustomerAppointment();
        $customerappointment ->firstname=$request->xfirstname;
        $customerappointment ->middlename=$request->xmiddlename;
        $customerappointment ->lastname=$request->xlastname;
        $customerappointment ->contactnumber=$request->xcontactnumber;
        $customerappointment ->email=$request->xemail;
        $customerappointment ->address=$request->xaddress;
        $customerappointment ->appointmentpurpose=$request->xappointmentpurpose;
        $customerappointment ->appointmenttype=$request->xappointmenttype;
        $customerappointment ->dateandtime=$request->xdateandtime;
        $customerappointment ->serviceprogress = 'Pending';
        $customerappointment ->save();

        $details = [
            'title' => 'Appointment',
            'body' => 'Hi, thanks for contacting us. We have received your appointment data and appreciate you for reaching out ',
        ];

        // Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
        Mail::to($customerappointment ->email)->send(new MyMail($details));
        return view('customer.startappointment');
    }



  
   
}
