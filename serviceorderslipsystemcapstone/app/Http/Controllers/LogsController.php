<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\StaffDatabase;
use App\Models\Staff;
use App\Models\CustomerAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function ServiceLogs()
    {
        $servicedata = Service:: join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')
         ->select(
            'servicedata.serviceno',
            'servicedata.customerappointmentnumber',
            'servicedata.typeofservice',
            'servicedata.created_at'
            // Add more columns as needed
        )
        ->get();
       
        return view('admin.adminlogs', compact('servicedata'));
    }

    public function StaffLogs()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch staff data only for the authenticated user
        $staff = Staff::where('staffname', $user->name)->first();

        if ($staff) {
            // Fetch staff logs only for the specific staff
            $staffdatabase = StaffDatabase::join('servicedata', 'staffdatabase.serviceno', '=', 'servicedata.serviceno')
                ->select(
                    'staffdatabase.serviceno',
                    'staffdatabase.actionsrequired',
                    'staffdatabase.workstarted'
                    // Add more columns as needed
                )
                ->where('servicedata.staffname', $staff->staffname)
                ->get();

            // Pass the staff data and logs to the view
            return view('staff.stafflogs', compact('staffdatabase'));
        } else {
            // Handle the case when the staff data for the user is not found
            // You might want to redirect them to a profile setup page or show an error message
            return redirect()->route('profile.setup');
        }
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
}

    public function CustomerLogs()
    {
      // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch appointments only for Kenneth (assuming Kenneth's user ID is 5)
        $customerappointment = CustomerAppointment::where('customerno', $user->id)->get();

        // Pass the appointments to the view
        return view('customer.customerlogs', compact('customerappointment'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
    }
}
