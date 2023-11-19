<?php

namespace App\Http\Controllers;

use App\Models\StaffDatabase;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;

use Illuminate\Http\Request;

class StaffDatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $staffdatabase = StaffDatabase::join('servicedata', 'staffdatabase.serviceno', '=', 'servicedata.serviceno')->get();
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
        $staffdatabase = new StaffDatabase();
        $staffdatabase ->serviceno=$request->xserviceno;
        $staffdatabase ->actionstaken='None';
        $staffdatabase ->workprogress='Ongoing';
        $staffdatabase ->save();
        return redirect()->route('staffdatabase');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staffdatabase = Service::where('serviceno', $id)->get();
        return view('staff.show', compact('servicedata'));
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
        // Update the StaffDatabase model
        StaffDatabase::where('staffnumber', $id)->update([
            'actionstaken' => $request->xactionstaken,
            'workprogress' => $request->xworkprogress,
        ]);
    
        // Retrieve the updated StaffDatabase model
        $staffdatabase = StaffDatabase::where('staffnumber', $id)->first();
    
        // If-else statement to customize email content based on $staffdatabase->workprogress
        // Check if the service progress is set to 'Completed'
        if ($request->xworkprogress == 'Completed') {
            // Retrieve the corresponding service record
            $service = Service::where('serviceno', $staffdatabase->staffnumber)->first();
    
            // Check if the service record is found
            if ($service) {
                // Customize email content based on the completed service
                $details = [
                    'title' => 'Work Completion Notification',
                    'body' => 'The work number with ID ' . $service->staffnumber . ' is marked as completed.',
                ];
    
                // Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
                Mail::to('vanicarmelle18@gmail.com')->send(new MyMail($details));
            }
        }
    
        return redirect()->route('staffdatabase');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
  
    }

    public function getService(){
        $servicedata= Service::all();
        return view('staff.add', compact('servicedata'));
    }

    public function getService2(){
        $servicedata= Service::all();
        return view('staff.show', compact('servicedata'));
    }

}
