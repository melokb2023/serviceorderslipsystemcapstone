<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
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
        $staff->id = $request->xstaffid;
        $user = User::find($request->xstaffid);

        // Check if the User exists
        if ($user) {
            // Assuming you have 'name' and 'email' fields in your User model
            $staff->staffname = $user->name;
            $staff->staffemail = $user->email;
            // Add more fields as needed
        }
        session()->flash('success_message', 'Staff Has Been Added');
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

    public function getStaffUsers()
    {
        $staffUsers = User::where('usertype', 'staff')->get();
        return view('admin.staffadd', compact('staffUsers'));
    }

    public function getAvailableStaffIds()
    {
        // Get all staff IDs
        $allStaffIds = User::where('usertype', 'staff')->pluck('id')->all();
    
        // Get staff IDs that are not listed in service data
        $listedStaffIds = Staff::pluck('id')->unique();
    
        // Filter available staff IDs
        $availableStaffIds = collect($allStaffIds)->reject(function ($staffId) use ($listedStaffIds) {
            return $listedStaffIds->contains($staffId);
        });
    
        return $availableStaffIds;
    }
}
