<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProgress;
use App\Models\Service;
use App\Models\StaffDatabase;
class ServiceProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceprogress = ServiceProgress:: join('servicedata', 'serviceprogress.serviceno', '=', 'servicedata.serviceno')->get();
        return view('admin.serviceprogress', compact('serviceprogress'));
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
        $serviceprogress = new ServiceProgress();
        $serviceprogress ->serviceno=$request->xserviceno;
        $serviceprogress ->dateandtime=$request->xdateandtime;
        $serviceprogress ->serviceprogress=$request->xserviceprogress;
        $serviceprogress ->save();
        return redirect()->route('serviceprogress');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $serviceprogress = ServiceProgress::where('serviceprogressno', $id)->get();
        return view('admin.serviceprogress', compact('serviceprogress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serviceprogress = ServiceProgress::where('serviceprogressno', $id)->get();
        return view('admin.serviceprogressedit', compact('serviceprogress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $serviceprogress= ServiceProgress::where('serviceprogressno', $id)
        ->update(
             [
             'serviceprogress' =>$request->xserviceprogress,
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
    
    public function getServiceNumber(){
        $servicedata = Service::all();
        return view('admin.serviceprogressadd', compact('servicedata'));
    }
 
    
}
