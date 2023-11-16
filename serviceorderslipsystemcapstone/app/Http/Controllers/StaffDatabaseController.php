<?php

namespace App\Http\Controllers;

use App\Models\StaffDatabase;
use App\Models\Service;
use Illuminate\Http\Request;

class StaffDatabaseController extends Controller
{
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
   
       $staffdatabase = StaffDatabase:: join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')->get();
       return view('staff.staffdatabase', compact('staffdatabase'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staffdatabase = StaffDatabase::where('staffnumber', $id)->get();
        return view('staff.show', compact('staffdatabase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staffdatabase = StaffDatabase::where('staffnumber', $id)->get();
        return view('staff.edit', compact('staffdatabase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            
            'xactionstaken' =>['required', 'max:70'],
            'xworkprogress'=>['required'],
        ]);

        $staffdatabase= StaffDatabase::where('staffnumber', $id)
        ->update(
             ['actionstaken'=> $request->xactionstaken,
             'workprogress'=> $request->xworkprogress,
             ]);
        return redirect()->route('staffdatabase');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
  
    }

    public function getServiceInfo(){
        $staffdatabase = Service::all();
        return view('staff.staffdatabase', compact('staffdatabase'));
    }
}
