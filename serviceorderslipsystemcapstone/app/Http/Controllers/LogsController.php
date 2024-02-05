<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\StaffDatabase;
use App\Models\Staff;
use App\Models\Logs;
use App\Models\CustomerAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function ServiceLogs(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
    
        $query = Logs::join('users', 'logs.userid', '=', 'users.id')
            ->select(
                'logs.userid',
                'logs.description',
                'logs.actiondatetime',
                'users.name', // Add the user name
                'users.usertype' // Add the user type
                // Add more columns as needed
            );
    
        if ($month && $year) {
            $query->whereMonth('logs.actiondatetime', $month)
                ->whereYear('logs.actiondatetime', $year);
        }
    
        $query->orderBy('logs.id', 'asc'); 
        $servicedata = $query->paginate(10); 
    
        return view('admin.adminlogs', compact('servicedata', 'month', 'year'));
    }
    public function StaffLogs(Request $request)
{
    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Default values for month and year
        $month = $request->input('month', date('m'));
        $year = $request->input('year', date('Y'));

        // Fetch logs for the specified customer
        $logs = Logs::join('users', 'logs.userid', '=', 'users.id')
        ->where('logs.userid', $user->id)
        ->whereMonth('logs.actiondatetime', $month)
        ->whereYear('logs.actiondatetime', $year)
        ->select(
            'logs.*',
            'users.name',
            'users.usertype'
        )
        ->paginate(10);

        // Pass the logs to the view along with month and year
        return view('staff.stafflogs', compact('logs', 'month', 'year'));
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

        // Fetch logs for the specified customer
        $logs = Logs::join('users', 'logs.userid', '=', 'users.id')
        ->where('logs.userid', $user->id)
        ->whereMonth('logs.actiondatetime', $selectedMonth)
        ->whereYear('logs.actiondatetime', $selectedYear)
        ->select(
            'logs.*',
            'users.name',
            'users.usertype'
        )
        ->paginate(10);

        // Pass the logs to the view along with month and year
        return view('customer.customerlogs', compact('logs', 'selectedMonth', 'selectedYear'));
    } else {
        // Handle the case when the user is not authenticated
        // You might want to redirect them to the login page or show an error message
        return redirect()->route('login');
    }
}
}
