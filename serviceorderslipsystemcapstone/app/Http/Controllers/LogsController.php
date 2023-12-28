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
    public function ServiceLogs(Request $request)
{
    $month = $request->input('month');
    $year = $request->input('year');

    $query = Service::join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')
        ->select(
            'servicedata.serviceno',
            'servicedata.customerappointmentnumber',
            'servicedata.typeofservice',
            'servicedata.actionsrequired',
            'servicedata.dateandtime'
            // Add more columns as needed
        );

    if ($month && $year) {
        $query->whereMonth('servicedata.dateandtime', $month)
            ->whereYear('servicedata.dateandtime', $year);
    }

    $servicedata = $query->get();

    return view('admin.adminlogs', compact('servicedata', 'month', 'year'));
}
public function StaffLogs(Request $request)
{
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch staff data only for the authenticated user
        $staff = Staff::where('staffname', $user->name)->first();

        if ($staff) {
            // Extract month and year from the request
            $month = $request->input('month');
            $year = $request->input('year');

            // Fetch staff logs only for the specific staff with optional month and year filtering
            $staffdatabaseQuery = StaffDatabase::join('servicedata', 'staffdatabase.serviceno', '=', 'servicedata.serviceno')
                ->select(
                    'staffdatabase.serviceno',
                    'staffdatabase.actionsrequired',
                    'staffdatabase.actionstaken',
                    'staffdatabase.workstarted'
                    // Add more columns as needed
                )
                ->where('servicedata.staffname', $staff->staffname);

            if ($month && $year) {
                $staffdatabaseQuery->whereMonth('staffdatabase.workstarted', $month)
                    ->whereYear('staffdatabase.workstarted', $year);
            }

            $staffdatabase = $staffdatabaseQuery->get();

            // Pass the staff data, logs, and selected month and year to the view
            return view('staff.stafflogs', compact('staffdatabase', 'month', 'year'));
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

public function CustomerLogs(Request $request)
{
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Default values for month and year
        $selectedMonth = $request->input('month', date('m'));
        $selectedYear = $request->input('year', date('Y'));

        // Fetch appointments only for Kenneth (assuming Kenneth's user ID is 5)
        $customerappointment = CustomerAppointment::where('customerno', $user->id)
            ->whereMonth('dateandtime', $selectedMonth)
            ->whereYear('dateandtime', $selectedYear)
            ->get();

        // Pass the appointments to the view along with month and year
        return view('customer.customerlogs', compact('customerappointment', 'selectedMonth', 'selectedYear'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
}
}
