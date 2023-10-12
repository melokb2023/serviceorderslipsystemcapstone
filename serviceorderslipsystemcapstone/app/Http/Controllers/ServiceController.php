<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

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

      $servicedata = Service:: all();
      return view('student.index', compact('student'));

     
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
            'xmiddleName'=>['max:20'],
            'xlastName' =>['required', 'max:20'],
            'xcontactNumber' =>['required', 'max:11'],
            'xaddress' =>['required','max:15'],
            'xtypeofservice' =>['required'],
            'xmaintenancerequired' =>['required'],
            'xproblemencountered' =>['required','max:30'],
            'xassignedstaff' =>['required'],
        ]);
        
        $servicedata = new Service();
        $servicedata ->firstName=$request->xfirstName;
        $servicedata ->middleName=$request->xmiddleName;
        $servicedata ->lastName=$request->xlastName;
        $servicedata ->contactNumber=$request->xcontactNumber;
        $servicedata ->address=$request->xaddress;
        $servicedata ->typeofservice=$request->xtypeofservice;
        $servicedata ->maintenancerequired=$request->xmaintenancerequired;
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
        return view('service.show', compact('servicenumber'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicedata = Service::where('serviceno', $id)->get();
        return view('service.edit', compact('servicedata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xfirstName' =>['required', 'max:20'],
            'xmiddleName'=>['max:20'],
            'xlastName' =>['required', 'max:20'],
            'xcontactNumber' =>['required', 'max:11'],
            'xaddress' =>['required','max:15'],
            'xtypeofservice' =>['required'],
            'xmaintenancerequired' =>['required'],
            'xproblemencountered' =>['required','max:30'],
            'xassignedstaff' =>['required'],
        ]);

        $servicedata= Service::where('sno', $id)
        ->update(
             [
             'firstName'=> $request->xfirstName,
             'middleName'=> $request->xmiddleName,
             'lastName'=> $request->xlastName,
             'contactnumber'=> $request->xcontactnumber,
             'address'=> $request->xaddress,
             'xtypeofservice'=>$request->xtypeofservice,
             'maintenancerequired'=> $request->xmaintenancerequired,
             'problemencountered'=> $request->xproblemencountered,
             'assignedstaff'=> $request->xassignedstaff,
             ]);
        return redirect()->route('servicedata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student= Service::where('sno', $id);
        $student->delete();
        return redirect()->route('student');
    }
}
