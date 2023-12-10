<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class CheckStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCheckReferenceNumber()
    {
        return view('customer.checkreferencenumber');
    }

    public function checkServiceStatus(Request $request)
    {
        // Validate the request
        $validateData = $request->validate([
            'order_reference_code' => ['required', 'max:255'],
        ]);

        // Retrieve service status based on the order reference code
        $orderReferenceCode = $request->input('order_reference_code');
        $serviceStatus = $this->getServiceStatus($orderReferenceCode);

        // Pass data to the view
        return view('customer.checkreferencenumber', compact('serviceStatus', 'orderReferenceCode'));
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
        //
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
        //
    }
}
