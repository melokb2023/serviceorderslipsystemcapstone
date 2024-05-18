<?php

// app/Http/Controllers/LineChartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class LineChartController extends Controller
{
    public function LineChart(Request $request)
    {
        $selectedYear = $request->input('year', date('Y'));
        $selectedMonth = $request->input('month', date('m'));
        $selectedRange = $request->input('range', '1-7'); // Default to the first week
        $selectedProgress = $request->input('progress', 'Ongoing'); // Default to Ongoing
    
        // Extract start and end day from the selected range
        list($startDay, $endDay) = explode('-', $selectedRange);
    
        $services = ['Reformatting', 'Replacement', 'Virus Removal', 'Computer Network Troubleshooting', 'Upgrade Hardware', 'Clean Up Files', 'Hardware Fixing', 'Peripheral Fixing', 'Software Installation', 'Reapplication'];
    
        $data = [];
    
        // Calculate start and end dates for the selected range
        $startOfMonth = now()->setYear($selectedYear)->setMonth($selectedMonth)->startOfMonth();
        $endOfMonth = now()->setYear($selectedYear)->setMonth($selectedMonth)->endOfMonth();
    
        $startOfDay = $startOfMonth->copy()->addDays($startDay - 1);
        $endOfDay = $startOfMonth->copy()->addDays($endDay - 1);
    
        foreach ($services as $service) {
            // Count the number of services for the selected range, year, service type, and service progress
            $count = Service::where('typeofservice', $service)
                ->whereYear('servicestarted', $selectedYear)
                ->whereMonth('servicestarted', $selectedMonth)
                ->whereBetween('servicestarted', [$startOfDay, $endOfDay])
                ->where('serviceprogress', $selectedProgress)
                ->count();
    
            $data[$service] = $count;
        }
    
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Views the Line Chart for a Specific Year, Month, Range of Days, and Service Progress";
        $logs->actiondatetime = now();
        $logs->save();
    
        // Return the view with the data
        return view('admin.financialperformancereport', compact('data', 'selectedMonth', 'selectedYear', 'selectedRange', 'selectedProgress'));
    }
    public function LineChart2()
{
    
    // Get the current month
    $currentMonth = now()->format('m'); // Assuming you have Carbon installed for the now() function

    // Define an array of months for counting
    $months = [
        '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
        '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
        '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
    ];

    $data = [];

    foreach ($months as $monthNumber => $monthName) {
        // Count the number of services for each month
        $count = DB::table('servicedata')
            ->whereMonth('created_at', $monthNumber)
            ->count();

        $data[$monthName] = $count;
    }
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Checks Ratings for the Month of";
    $logs->actiondatetime = now();
    $logs->save();

    // Pass data to the view
    return view('admin.admindashboard', compact('data'));
}


    public function BarChart(){
        // Define an array of services for counting
        $scores = ['1', '2', '3', '4', '5'];
        $data = [];

        foreach ($scores as $score) {
            $count = DB::table('customerrating')->where('rating', $score)->count();
            $data[$score] = $count;
        }

        $total = array_sum($data);
    $totalCount = array_sum(array_map(function ($key, $value) {
        return $key * $value;
    }, array_keys($data), $data));

    $average = $totalCount > 0 ? round($totalCount / $total, 1) : 0;

    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Checks Overall Rating of the Company";
    $logs->actiondatetime = now();
    $logs->save();


    // Pass data to the view
    return view('admin.ratinggraph', compact('data', 'average'));


    }



    public function BarChart2($selectedStaff = null)
    {
        // Get all unique staff names from the database
        $staffNames = Rating::join('servicedata', 'customerrating.serviceno', '=', 'servicedata.serviceno')
            ->join('stafflist', 'servicedata.staffnumber', '=', 'stafflist.staffnumber')
            ->join('users', 'stafflist.id', '=', 'users.id')
            ->distinct('users.id') // Use 'users.name' instead of 'users.id'
            ->pluck('users.name')
            ->toArray();
    
        // Fetch data for each staff and build an array for the chart
        $chartData = [];
        
        foreach ($staffNames as $staffName) {
            $data = [];
    
            // Fetch data for each month and year
            for ($year = date('Y'); $year >= 2020; $year--) {
                for ($month = 1; $month <= 12; $month++) {
                    $monthlyData = [];  // Define an array of scores for counting
                    $scores = ['1', '2', '3', '4', '5'];
    
                    foreach ($scores as $score) {
                        // Use relationships and correct column names
                        $count = Rating::whereHas('service.staff.user', function ($query) use ($staffName) {
                            $query->where('name', $staffName);
                        })
                        ->where('staffperformance', $score)
                        ->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month);
    
                        // Check if a specific staff member is selected
                        if ($selectedStaff !== null) {
                            $count->whereHas('service.staff.user', function ($query) use ($selectedStaff) {
                                $query->where('name', $selectedStaff);
                            });
                        }
    
                        $count = $count->count();
                        $monthlyData[] = $count;
                    }
    
                    // Store data for the specific month and year
                    $data["$year-$month"] = $monthlyData;
                }
            }
    
            $chartData[$staffName] = $data;
        }
    
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Views the Rating of a Specific Staff with Month and Year";
        $logs->actiondatetime = now();
        $logs->save();
    
        return view('admin.ratinggraphstaff', compact('chartData', 'staffNames'));
    }
}    
    


