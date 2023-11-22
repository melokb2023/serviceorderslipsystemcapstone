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
    public function index()
    {
       // $student = new Student;
       // $student->idNo = "C20-0002";
       // $student->firstName = "Kyle Bryant";
       // $student->middleName = "Mejares";
       // $student->lastName= "Melo";
       // $student->suffix = "";
       // $student->course = "BSIT";
       // $student->year = 3;
       // $student->birthDate = "2001-01-27";
       // $student->gender = "Male";
       // $student->save();
//
       //echo "Grades data successfully saved in the database";

      
      $servicedata = Service:: join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')->get();
      return view('admin.servicedata', compact('servicedata'));
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

    public function getServiceInfo(){
        $staffdatabase = Service::select('serviceno','customerappointmentnumber','contactnumber','email','address','typeofservice','listofproblems','maintenancerequired','customerpassword','assignedstaff','defectiveunits')->get();
        return view('staff.staffdatabase', compact('staffdatabase'));
    }
  
}
