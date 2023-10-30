<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CustomerAppointment;



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
        $servicedata ->customerappointmentnumber=$request->xcustomerappointmentnumber;
        $servicedata ->contactnumber=$request->xcontactnumber;
        $servicedata ->listofproblems=$request->xlistofproblems;
        $servicedata ->email=$request->xemail;
        $servicedata ->address=$request->xaddress;
        $servicedata ->typeofservice=$request->xtypeofservice;
        $servicedata ->maintenancerequired=$request->xmaintenancerequired;
        $servicedata ->listofproblems=$request->xlistofproblems;
        $servicedata ->customerpassword=$request->xcustomerpassword;
        $servicedata ->defectiveunits=$request->xdefectiveunits;
        $servicedata ->assignedstaff=$request->xassignedstaff;
        $servicedata ->save();
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
             'customerappointmentnumber' => $request->xcustomerappointmentnumber,
             'contactnumber'=> $request->xcontactnumber,
             'listofproblems' =>$request->xlistofproblems,
             'email' =>$request->xemail,
             'address'=> $request->xaddress,
             'typeofservice'=>$request->xtypeofservice,
             'maintenancerequired'=> $request->xmaintenancerequired,
             'customerpassword'=> $request->xcustomerpassword,
             'defectiveunits'=> $request->xdefectiveunits,
             'assignedstaff'=> $request->xassignedstaff,
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
}
