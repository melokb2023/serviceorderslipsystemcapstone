<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('admin.staffdata', compact('staff'));
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
        $staff = new Staff();
        $staff->staffname = $request->xstaffname;
        $staff->save();
        return redirect()->route('staff');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = Staff::where('staffnumber', $id)->get();
        return view('admin.staffshow', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::where('staffnumber', $id)->get();
        return view('admin.staffedit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xstaffname' =>['required', 'max:255'],
        ]);

        $customerappointment= Staff::where('staffnumber', $id)
        ->update(
             [
             
             'staffname'=> $request->xstaffname,
             ]);
        return redirect()->route('staff');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff= Staff::where('staffnumber', $id);
        $staff->delete();
        return redirect()->route('staff');
    }
}
