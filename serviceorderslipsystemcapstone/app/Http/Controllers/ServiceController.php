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

      
      $servicedata = Service:: join('customerappointment', 'servicedata.customernumber', '=', 'customerappointment.customernumber')->get();
      $servicedata = Service:: join('customerappointment', 'servicedata.firstname', '=', 'customerappointment.customernumber')->get();
      $servicedata = Service:: join('customerappointment', 'servicedata.middlename', '=', 'customerappointment.customernumber')->get();
      $servicedata = Service:: join('customerappointment', 'servicedata.lastname', '=', 'customerappointment.customernumber')->get();
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
        $validateData =$request->validate([
            'xcustomernumber' =>['required'],
            'xfirstname' =>['required'],
            'xmiddlename'=>['required'],
            'xlastname' =>['required'],
            'xcontactnumber' =>['required', 'max:11'],
            'xaddress' =>['required','max:100'],
            'xtypeofservice' =>['required'],
            'xmaintenancerequired' =>['required'],
            'xproblemencountered' =>['required','max:100'],
            'xcustomerpassword' =>['required','max:100'],
            'xassignedstaff' =>['required'],
        ]);
        
        $servicedata = new Service();
        $servicedata ->customernumber=$request->xcustomernumber;
        $servicedata ->firstname=$request->xfirstname;
        $servicedata ->middlename=$request->xmiddlename;
        $servicedata ->lastname=$request->xlastname;
        $servicedata ->contactnumber=$request->xcontactnumber;
        $servicedata ->address=$request->xaddress;
        $servicedata ->typeofservice=$request->xtypeofservice;
        $servicedata ->maintenancerequired=$request->xmaintenancerequired;
        $servicedata ->problemencountered=$request->xproblemencountered;
        $servicedata ->customerpassword=$request->xcustomerpassword;
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
             'customernumber' => $request->xcustomernumber,
             'firstname'=> $request->xfirstname,
             'middlename'=> $request->xmiddlename,
             'lastname'=> $request->xlastname,
             'contactnumber'=> $request->xcontactnumber,
             'address'=> $request->xaddress,
             'typeofservice'=>$request->xtypeofservice,
             'maintenancerequired'=> $request->xmaintenancerequired,
             'problemencountered'=> $request->xproblemencountered,
             'customerpassword'=> $request->xcustomerpassword,
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
