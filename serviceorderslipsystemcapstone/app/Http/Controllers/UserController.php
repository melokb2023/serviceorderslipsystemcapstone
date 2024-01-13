<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('usertype', ['staff', 'customer'])->get();

    return view('admin.userslist', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editusertype(string $id)
    {
        $users = User::where('id', $id)->get();
        return view('admin.userschangeusertype', compact('users'));
    }

    public function editpassword(string $id)
    {
        $users = User::where('id', $id)->get();
        return view('admin.userschangepassword', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::where('id', $id)
        ->update([
            'usertype' => $request->xusertype,
        ]);

        return redirect()->route('users');
    }

    
public function update2(Request $request, string $id)
{
    // Validate the request data if needed

    // Hash the new password
    $hashedPassword = Hash::make($request->xpassword);

    // Update the user in the database with the hashed password
    User::where('id', $id)->update(['password' => $hashedPassword]);

    // Redirect to the 'users' route after updating
    return redirect()->route('users');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}