<?php

namespace App\Http\Controllers;

use App\Models\StaffDatabase;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Logs;
use Illuminate\Support\Facades\DB;
use App\Mail\MyMail;
use App\Models\CustomerAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class StaffDatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Accessed the Staff Work Menu";
    $logs->actiondatetime = now();
    $logs->save();
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();
    
        // Fetch staff data only for the authenticated user using the User model
        $staff = User::where('name', $user->name)->first();
    
        // Retrieve the StaffDatabase entries for the specific staff based on serviceno
        $staffdatabaseQuery = Service::leftJoin('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')
        ->leftJoin('stafflist', 'servicedata.staffnumber', '=', 'stafflist.staffnumber')
        ->leftJoin('users as customer', 'customerappointment.customerno', '=', 'customer.id')
        ->leftJoin('users as staff', 'stafflist.id', '=', 'staff.id')
        ->leftJoin('staffwork', 'servicedata.serviceno', '=', 'staffwork.serviceno')
        ->select(
            'servicedata.*',
            'customer.name as customername',
            'customer.email as customeremail',
            'customerappointment.dateandtime',
            'stafflist.*',
            'staff.name as staffname',
            'staff.email as staffemail',
            'staffwork.worknumber',
            'staffwork.actionstaken',
            'staffwork.workstarted',
            'servicedata.workprogress as workprogress' // Update this line
        )
        ->where('staff.id', '=', Auth::user()->id);
            

        // Rest of your code...

        // Apply filters
        if ($request->filled('workNumber')) {
            $staffdatabaseQuery->where('staffwork.worknumber', $request->input('workNumber'));
        }

      

        if ($request->filled('workProgress')) {
            $filterValue = $request->input('workProgress');
        
            if ($filterValue === 'Ongoing' || $filterValue === 'Completed') {
                $staffdatabaseQuery->where('servicedata.workprogress', $filterValue);
            }
        }

        // Retrieve the filtered StaffDatabase entries
        $staffdatabase = $staffdatabaseQuery->get();
        
        // Pass the staff data and filtered staffdatabase to the view
        return view('staff.staffdatabase', compact('staff', 'staffdatabase'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
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
public function store(Request $request, $id)
{
    // Retrieve the associated Service record
    $service = Service::where('serviceno', $id)->first();

    // Create a new StaffDatabase record
    $staffdatabase = new StaffDatabase();
    $staffdatabase->serviceno = $service->serviceno; // Use 'serviceno' from the associated Service record
    $staffdatabase->workstarted = $request->xworkstarted;
    $staffdatabase->actionstaken = '';
    $staffdatabase->save();

 
    // Log the action
    $logs = new Logs;
    $logs->userid = Auth::id();
    $logs->description = "Stored Data";
    $logs->actiondatetime = now();
    $logs->save();

    return redirect()->route('staffdatabase');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staffdatabase = Service::where('serviceno', $id)->get();
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Views Service with ID {$id} for the Staff to See"; // Updated description
        $logs->actiondatetime = now();
        $logs->save();
        return view('staff.show', compact('servicedata'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $servicedata = Service::where('serviceno', $id)->get();
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Edits";
        $logs->actiondatetime = now();
        $logs->save();
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
            'workprogress' => $request->xworkprogress,
        ]);

    // Update the corresponding entry in the StaffDatabase table
    StaffDatabase::where('serviceno', $id)
        ->update([
            'actionstaken' => $request->xactionstaken,
        ]);

    // Retrieve the corresponding CustomerAppointment record
    $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->first();

    // If the work progress is set to 'Unable to Complete', send an email notification
    if ($request->xworkprogress == 'Unable to Complete' && $customerappointment) {
        $details = [
            'title' => 'Work Completion Notification',
            'body' => 'We regret to inform you that the work with ID ' . $id . ' cannot continue. Sorry for the inconvenience. We recommend seeking services from another shop. The admin will be notified of this.',
        ];
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Staff Sets Progress to Unable to Complete";
        $logs->actiondatetime = now();
        $logs->save();
        // Send email to the customer
        Mail::to($customerappointment->customeremail)->send(new MyMail($details));

        // Flash a session message
        session()->flash('success_message', 'Work Data Updated');
    } elseif ($request->xworkprogress == 'Completed') {
        // If the work progress is set to 'Completed', send an email notification
        $details = [
            'title' => 'Work Completion Notification',
            'body' => 'The work with ID ' . $id . ' is marked as completed. The admin will be notified of this.',
        ];

        // Send email to the customer
        Mail::to('melokylebryant4@gmail.com')->send(new MyMail($details));
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Sets Work Progress to Completed";
        $logs->actiondatetime = now();
        $logs->save();

        // Flash a session message
        session()->flash('success_message', 'Work Progress Updated: Completed');
    } else {
        session()->flash('success_message', 'Work Progress Updated');
    }

    return redirect()->route('staffdatabase');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
  
    }
    public function addWork(Request $request){
        $staffdatabase = new StaffDatabase();
        $staffdatabase ->workstarted-> $request->xworkstarted;
        $staffdatabase->actionstaken = "";
        $staffdatabase->save();
        return redirect()->route('staffdatabase');
    }

    public function getService($id) {
        $servicedata = Service::where('serviceno', '=', $id)->first();
        return view('staff.add', compact('servicedata', 'id'));
    }

    public function countWork()
    {
        // Logging the access to the Staff Dashboard
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Accesses the Staff Dashboard";
        $logs->actiondatetime = now();
        $logs->save();
       
        // Assuming you have a StaffDatabase model
        $user = Auth::user();
    
        // Count of all works assigned to the staff
        $staffDatabaseCount = Service::whereHas('staff.user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->count();
    
        // Count of ongoing works assigned to the staff
        $ongoingWorksCount = Service::whereHas('staff.user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->where('workprogress', 'Ongoing')->count();
        
        // Count of completed works assigned to the staff
        $completedWorksCount = Service::whereHas('staff.user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->where('workprogress', 'Completed')->count();
    
        // Count of works for each month (ongoing and completed)
        $data = [];
        $months = [
            '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
            '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
            '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
        ];
        
        foreach ($months as $monthNumber => $monthName) {
            // Count ongoing works for each month
            $ongoingCount = Service::whereHas('staff.user', function ($query) use ($user) {
                $query->where('id', $user->id);
            })->where('workprogress', 'Ongoing')
              ->whereMonth('created_at', $monthNumber)
              ->count();
    
            // Count completed works for each month
            $completedCount = Service::whereHas('staff.user', function ($query) use ($user) {
                $query->where('id', $user->id);
            })->where('workprogress', 'Completed')
              ->whereMonth('created_at', $monthNumber)
              ->count();
    
            $data[$monthName] = [
                'Ongoing' => $ongoingCount,
                'Completed' => $completedCount,
            ];
        }
    
        return view('staff.staffdashboard', compact('staffDatabaseCount', 'data', 'ongoingWorksCount', 'completedWorksCount'));
    }
public function getAvailableServiceNumbers()
{
    // Get the authenticated user's ID
    $userId = Auth::id();

    // Get all service numbers assigned to the authenticated staff member
    $assignedServiceNumbers = Service::whereHas('staff', function ($query) use ($userId) {
        $query->where('id', $userId);
    })->pluck('serviceno')->unique();

    // Get all service numbers that are not assigned to any staff member or are assigned to the authenticated staff member
    $availableServiceNumbers = Service::where(function ($query) use ($userId) {
        $query->whereNull('staffnumber')
            ->orWhere('staffnumber', $userId); // Assuming staffnumber is the column in Service model
    })->whereNotIn('serviceno', $assignedServiceNumbers)
        ->get();

    return $availableServiceNumbers;
}


public function SpecificStaff()
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Fetched Specific Data for a Specific Staff";
    $logs->actiondatetime = now();
    $logs->save();
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch staff data only for the authenticated user
        $staff = User::where('name', $user->name)->get();

        // Pass the staff data to the view
        return view('staff.staffdatabase', compact('staffdatabase'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
}
   

}
