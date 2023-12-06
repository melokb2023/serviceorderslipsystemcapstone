<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class CheckStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkStatus(Request $request)
    {
        // Validate the request data
        $request->validate([
            'order_reference_code' => 'required|string|max:255',
        ]);

        // Retrieve the service based on the order reference code
        $service = Service::where('orderreferencecode', $request->input('order_reference_code'))->first();

        // Check if the service exists
        if ($service) {
            // Service found
            return view('checkreferencenumber', ['service' => $service]);
        } else {
            // Service not found
            return view('checkreferencenumber', ['error' => 'Service not found for the provided order reference code.']);
        }
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
