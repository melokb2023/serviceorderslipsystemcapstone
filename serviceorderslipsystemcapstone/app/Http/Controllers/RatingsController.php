<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\CustomerAppointment;
class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerrating = Rating:: select('customerrating.ratingno', 'customerappointment.firstname', 'customerrating.customerappointmentnumber', 'customerappointment.appointmentpurpose', 'customerrating.review', 'customerrating.rating')
        ->leftJoin('customerappointment', 'customerappointment.customerappointmentnumber', '=', 'customerrating.customerappointmentnumber')
        ->orderBy('customerrating.ratingno')
        ->get();
        return view('admin.customerreviewsandratings', compact('customerrating'));
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
        $customerrating = new Rating();
        $customerrating ->customerappointmentnumber=$request->xcustomerappointmentnumber;
        $customerrating ->review=$request->xreview;
        $customerrating ->rating=$request->xrating;
        $customerrating ->save();
        return view('customer.startappointment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customerrating= Rating::where('ratingno', $id)->get();
        return view('admin.customerreviewsandratingsshow', compact('customerrating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customerrating= Rating::where('ratingno', $id);
        $customerrating->delete();
        return redirect()->route('customerrating');
    }

    public function getAppointmentInfo(){
        $customerappointment = CustomerAppointment::all();
        return view('customer.customerrating', compact('customerappointment'));
    }

}
