<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CustomerAppointment;
use App\Models\StaffDatabase;
use Illuminate\Support\Facades\Hash;




class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Service::join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber');

    // Check if there is a filter for Customer Appointment Number
    if ($request->has('customer_appointment_number_filter')) {
        $query->where('servicedata.customerappointmentnumber', $request->input('customer_appointment_number_filter'));
    }

    // Check if there is a filter for Type of Service
    if ($request->has('typeofservice_filter') && $request->input('typeofservice_filter') !== 'All') {
        $query->where('servicedata.typeofservice', $request->input('typeofservice_filter'));
    }

    $servicedata = $query->get();

    // Get distinct types of service for the combo box
    $typesOfService = Service::distinct('typeofservice')->pluck('typeofservice');

    return view('admin.servicedata', compact('servicedata', 'typesOfService'));
}
    //////VIEW CUSTOMER LIST
    public function CustomerList(){
        $customerappointment = CustomerAppointment:: all();
        return view('admin.customerdata', compact('customerappointment'));
    }
    ///VIEW CUSTOMER
    public function ViewCustomer(string $id){
        $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->get();
        return view('admin.showcustomer', compact('customerappointment'));
    }

    //EDIT CUSTOMER
    public function EditCustomer(string $id)
    {
        $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->get();
        return view('admin.editcustomer', compact('customerappointment'));
    }

    ///UPDATE CUSTOMER
    public function UpdateCustomer(Request $request, string $id)
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
        return redirect()->route('customerlist');
    }

    //DELETE CUSTOMER
    public function DeleteCustomer(string $id)
    {
        $customerappointment= CustomerAppointment::where('customerappointmentnumber', $id);
        $customerappointment->delete();
        return redirect()->route('customerlist');
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
        $servicedata = new Service();
        $servicedata->customerappointmentnumber = $request->xcustomerappointmentnumber;
        $servicedata->listofproblems = $request->xlistofproblems;
        $servicedata->typeofservice = $request->xtypeofservice;
        $servicedata->maintenancerequired = $request->xmaintenancerequired;
         // Hash the password before saving
        $servicedata->customerpassword = Hash::make($request->xcustomerpassword);
        $servicedata->defectiveunits = $request->xdefectiveunits;
        $servicedata->viewtasks = $request->xviewtasks;
        $servicedata->assignedstaff = $request->xassignedstaff;
        $servicedata->remarks = $request->xremarks;
        $currentYear = date('Y');
        $lastOrder = Service::max('orderreferencecode');
        $lastYear = substr($lastOrder, 0, 4);
    
        if ($lastYear == $currentYear) {
            // If orders exist for the current year, increment the last order number
            $orderNumber = intval(substr($lastOrder, -4)) + 1;
        } else {
            // If it's a new year, start with 1
            $orderNumber = 1;
        }
    
        $orderReferenceCode = $currentYear . '-' .str_pad($orderNumber, 4, '0', STR_PAD_LEFT);
    
        $servicedata->orderreferencecode = $orderReferenceCode;

          // Get dateandtime from CustomerAppointment based on customerappointmentnumber
         $customerAppointment = CustomerAppointment::where('customerappointmentnumber', $request->xcustomerappointmentnumber)->first();

    // Check if the CustomerAppointment exists
    if ($customerAppointment) {
        $servicedata->dateandtime = $customerAppointment->dateandtime;
    }
        $servicedata->save();
        return redirect()->route('servicedata');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicedata = Service::where('serviceno', $id)->get();
        return view('admin.show', compact('servicedata'));
    }
   
    public function show2(string $id)
    {
        $servicedata = Service::where('serviceno', $id)->get();
        return view('staff.show', compact('servicedata'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicedata = Service::where('serviceno', $id)->get();
        return view('admin.edit', compact('servicedata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
      $servicedata= Service::where('serviceno', $id)
        ->update(
             [
             'listofproblems' =>$request->xlistofproblems,
             'typeofservice'=>$request->xtypeofservice,
             'maintenancerequired'=> $request->xmaintenancerequired,
             'customerpassword'=> $request->xcustomerpassword,
             'defectiveunits'=> $request->xdefectiveunits,
             'viewtasks' =>$request->xviewtasks,
             'assignedstaff'=> $request->xassignedstaff,
             'remarks'=> $request->xremarks,
             ]);
        return redirect()->route('servicedata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicedata= Service::where('serviceno', $id);
        $servicedata->delete();
        return redirect()->route('servicedata');
    }
    public function getAppointmentInfo(){
        $customerappointment = CustomerAppointment::all();
        return view('admin.add', compact('customerappointment'));
    }

    public function getAvailableCustomerAppointments()
    {
        // Get all customer appointments
        $allCustomerAppointments = CustomerAppointment::all();

        // Get customer appointments that are not listed in service data
        $listedCustomerAppointments = Service::pluck('customerappointmentnumber')->unique();
        $availableCustomerAppointments = $allCustomerAppointments->reject(function ($customerAppointment) use ($listedCustomerAppointments) {
            return $listedCustomerAppointments->contains($customerAppointment->customerappointmentnumber);
        });

        return $availableCustomerAppointments;
    }

   
  
}
