<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAppointment;

class CustomerAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerappointment = CustomerAppointment:: all();
        return view('customer.customerdata', compact('customerappointment'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
        return redirect()->route('customerappointment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->get();
        return view('customer.show', compact('customerappointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->get();
        return view('customer.edit', compact('customerappointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xfirstname' =>['required', 'max:100'],
            'xmiddlename'=>['required','max:100'],
            'xlastname' =>['required', 'max:100'],
            'xcontactnumber' =>['required', 'max:100'],
            'xemail' =>['required', 'max:100'],
            'xaddress' =>['required', 'max:100'],
            'xappointmentpurpose' =>['required', 'max:100'],
            'xappointmenttype' =>['required','max:100'],
        ]);

        $customerappointment= CustomerAppointment::where('customerappointmentnumber', $id)
        ->update(
             [
             'firstname'=> $request->xfirstname,
             'middlename'=> $request->xmiddlename,
             'lastname'=> $request->xlastname,
             'contactnumber'=> $request->xcontactnumber,
             'email'=> $request->xemail,
             'address'=> $request->xaddress,
             'appointmentpurpose'=> $request->xappointmentpurpose,
             'appointmenttype'=> $request->xappointmenttype,
             ]);
        return redirect()->route('customerappointment');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customerappointment= CustomerAppointment::where('customerappointmentnumber', $id);
        $customerappointment->delete();
        return redirect()->route('customerappointment');
    }
}
