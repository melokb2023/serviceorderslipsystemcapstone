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
            'xfirstName' =>['required', 'max:20'],
            'xmiddleName'=>['required','max:20'],
            'xlastName' =>['required', 'max:20'],
            'xappointmentpurpose' =>['required', 'max:50'],
            'xappointmenttype' =>['required', 'max:70'],
        ]);
        
        $customerappointment = new CustomerAppointment();
        $customerappointment ->firstName=$request->xfirstName;
        $customerappointment ->middleName=$request->xmiddleName;
        $customerappointment ->lastName=$request->xlastName;
        $customerappointment ->appointmentpurpose=$request->xappointmentpurpose;
        $customerappointment ->appointmenttype=$request->xappointmenttype;
        $customerappointment ->save();
        return redirect()->route('servicedata');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customerappointment = CustomerAppointment::where('customernumber', $id)->get();
        return view('customer.show', compact('customerappointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customerappointment = CustomerAppointment::where('customernumber', $id)->get();
        return view('customer.edit', compact('customerappointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xfirstName' =>['required', 'max:60'],
            'xmiddleName'=>['required','max:50'],
            'xlastName' =>['required', 'max:20'],
            'xappointmentpurpose' =>['required', 'max:70'],
            'xappointmenttype' =>['required','max:50'],
        ]);

        $customerappointment= CustomerAppointment::where('customernumber', $id)
        ->update(
             [
             'firstName'=> $request->xfirstName,
             'middleName'=> $request->xmiddleName,
             'lastName'=> $request->xlastName,
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
        $student= CustomerAppointment::where('customernumber', $id);
        $student->delete();
        return redirect()->route('customerappointment');
    }
}
