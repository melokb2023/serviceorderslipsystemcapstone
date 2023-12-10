<?php

namespace App\Http\Controllers;

use App\Models\StaffDatabase;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use App\Models\CustomerAppointment;
use Illuminate\Http\Request;

class StaffDatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffdatabase = StaffDatabase::join('servicedata', 'staffdatabase.serviceno', '=', 'servicedata.serviceno')
            ->select(
                'staffdatabase.*',  // Select all columns from staffdatabase
                'servicedata.typeofservice',
                'servicedata.actionsrequired',  // Add more columns from servicedata as needed
                'servicedata.workprogress'      // Add more columns from servicedata as needed
            )
            ->get();
    
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
  /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // Retrieve the associated Service record
    $service = Service::where('serviceno', $request->xserviceno)->first();

    // Update or insert into StaffDatabase table
    StaffDatabase::updateOrInsert(
        ['serviceno' => $request->xserviceno,
         'workstarted' => $request->xworkstarted,
    ],
        [
            'actionsrequired' => $service ? $service->actionsrequired : null,
            'staffnumber' => $service ? $service->staffnumber : null,
            'typeofservice' => $service ? $service->typeofservice : null,
            'workprogress' => $service ? $service->workprogress : null,
        ]
    );

    // Retrieve the updated StaffDatabase entries
    $staffdatabase = StaffDatabase::join('servicedata', 'staffdatabase.serviceno', '=', 'servicedata.serviceno')
        ->select(
            'staffdatabase.*',
            'servicedata.typeofservice',
            'servicedata.actionsrequired',
            'servicedata.workprogress'
        )
        ->get();

    return view('staff.staffdatabase', compact('staffdatabase'));
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
        $servicedata = Service::where('serviceno', $id)->get();
        return view('staff.edit', compact('servicedata'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Update the Service record
    $servicedata = Service::where('serviceno', $id)
        ->update([
            'listofproblems' => $request->xlistofproblems,
            'typeofservice' => $request->xtypeofservice,
            'customerpassword' => $request->xcustomerpassword,
            'defectiveunits' => $request->xdefectiveunits,
            'actionsrequired' => $request->xactionsrequired,
            'serviceprogress' => $request->xserviceprogress,
            'serviceremarks' => $request->xserviceremarks,
        ]);

    // Retrieve the corresponding CustomerAppointment record
    $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->first();

    // If the work progress is set to 'Completed', send an email notification
    if ($request->xworkprogress == 'Completed' && $customerappointment) {
        $details = [
            'title' => 'Work Completion Notification',
            'body' => 'The work number with ID ' . $id . ' is marked as completed. The admin will be notified of this.',
        ];

        // Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
        Mail::to($customerappointment->customeremail)->send(new MyMail($details));
    }

    return redirect()->route('servicedata');
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

    public function countWork()
{
    // Assuming you have a StaffDatabase model
    $staffDatabaseCount = StaffDatabase::count();
    return view('staff.staffdashboard', compact('staffDatabaseCount'));
}

public function getAvailableServiceNumbers(){
    // Get all service numbers
    $allServiceNumbers = Service::all();

    // Get service numbers that are not listed in staff database
    $listedServiceNumbers = StaffDatabase::pluck('serviceno')->unique();
    $availableServiceNumbers = $allServiceNumbers->reject(function ($servicedata) use ($listedServiceNumbers) {
        return $listedServiceNumbers->contains($servicedata->serviceno);
    });

    return $availableServiceNumbers;
}
   

}
