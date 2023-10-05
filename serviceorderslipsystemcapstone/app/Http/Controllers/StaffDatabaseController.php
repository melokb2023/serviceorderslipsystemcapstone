<?php

namespace App\Http\Controllers;

use App\Models\StaffDatabase;
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

      $student = StaffDatabase:: all();
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
            'xidNo' => ['required', 'max:8'],
            'xfirstName' =>['required', 'max:20'],
            'xmiddleName'=>['max:20'],
            'xlastName' =>['required', 'max:20'],
            'xsuffix' =>['max:5'],
            'xcourse' =>['required','max:15'],
            'xyear' =>['required'],
            'xbirthDate' =>['required','date'],
            'xgender' =>['required']
        ]);
        
        $student = new StaffDatabase();
        $student ->idNo=$request->xidNo;
        $student ->firstName=$request->xfirstName;
        $student ->middleName=$request->xmiddleName;
        $student ->lastName=$request->xlastName;
        $student ->suffix=$request->xsuffix;
        $student ->course=$request->xcourse;
        $student ->year=$request->xyear;
        $student ->birthDate=$request->xbirthDate;
        $student ->gender=$request->xgender;
        $student ->save();
        return redirect()->route('student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = StaffDatabase::where('sno', $id)->get();
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = StaffDatabase::where('sno', $id)->get();
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xidNo' => ['required', 'max:8'],
            'xfirstName' =>['required', 'max:20'],
            'xmiddleName'=>['max:15'],
            'xlastName' =>['required', 'max:20'],
            'xsuffix' =>['max:5'],
            'xcourse' =>['required','max:15'],
            'xyear' =>['required'],
            'xbirthDate' =>['required','date'],
            'xgender' =>['required']
        ]);

        $student= StaffDatabase::where('sno', $id)
        ->update(
             ['idNo' => $request->xidNo,
             'firstName'=> $request->xfirstName,
             'middleName'=> $request->xmiddleName,
             'lastName'=> $request->xlastName,
             'suffix'=> $request->xsuffix,
             'course'=> $request->xcourse,
             'year'=>$request->xyear,
             'birthDate'=> $request->xbirthDate,
             'gender'=> $request->xgender,
             ]);
        return redirect()->route('student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student= StaffDatabase::where('sno', $id);
        $student->delete();
        return redirect()->route('student');
    }
}
