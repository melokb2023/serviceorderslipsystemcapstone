<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProgress;

class ServiceProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serviceprogress = ServiceProgress:: all();
        return view('customer.customerdata', compact('customerappointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serviceprogress = ServiceProgress::where('serviceno', $id)->get();
        return view('serviceprogress.edit', compact('serviceprogress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xserviceprogress' =>['required', 'max:20'],
        ]);

        $serviceprogress= ServiceProgress::where('servicenumber', $id)
        ->update(
             [
             'serviceprogress'=> $request->xserviceprogress,
             ]);
        return redirect()->route('serviceprogress');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
