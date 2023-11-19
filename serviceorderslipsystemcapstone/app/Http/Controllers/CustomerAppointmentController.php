<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\CustomerAppointment;

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
        $customerappointment ->save();
        return view('customer.startappointment');
    }

  
   
}
