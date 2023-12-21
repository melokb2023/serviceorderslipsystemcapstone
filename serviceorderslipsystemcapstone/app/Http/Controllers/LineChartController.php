<?php

// app/Http/Controllers/LineChartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Rating;

class LineChartController extends Controller
{
    public function LineChart(Request $request)
    {
        $selectedYear = $request->input('year', date('Y'));
        $selectedMonth = $request->input('month', date('m'));
    
        $services = ['Reformatting', 'Replacement', 'Virus Removal', 'Computer Network Troubleshooting', 'Upgrade Hardware', 'Clean Up Files', 'Hardware Fixing', 'Peripheral Fixing', 'Software Installation', 'Reapplication'];
    
        $data = [];
    
        foreach ($services as $service) {
            // Count the number of services for the selected month, year, and service type
            $count = Service::where('typeofservice', $service)
                ->whereYear('servicestarted', $selectedYear)
                ->whereMonth('servicestarted', $selectedMonth)
                ->count();
    
            $data[$service] = $count;
        }
    
        // Return the view with the data
        return view('admin.financialperformancereport', compact('data', 'selectedMonth', 'selectedYear'));
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
        $totalCount = array_sum($data);
        $average = $totalCount > 0 ? array_sum(array_keys($data)) / $totalCount : 0;

        // Pass data to the view
        return view('admin.ratinggraph', compact('data', 'average'));


    }

    public function BarChart2($selectedStaff = null) {
        // Get all unique staff names from the database
        $staffNames = Rating::distinct('assignedstaff')->pluck('assignedstaff');
    
        // Fetch data for each staff and build an array for the chart
        $chartData = [];
    
        foreach ($staffNames as $staffName) {
            $data = [];
    
            // Fetch data for each month and year
            for ($year = date('Y'); $year >= 2020; $year--) {
                for ($month = 1; $month <= 12; $month++) {
                    $scores = ['1', '2', '3', '4', '5'];
                    $monthlyData = [];
    
                    foreach ($scores as $score) {
                        $count = Rating::where('rating', $score)
                            ->whereYear('created_at', $year)
                            ->whereMonth('created_at', $month);
    
                        // Check if a specific staff member is selected
                        if ($selectedStaff !== null) {
                            $count = $count->where('assignedstaff', $staffName);
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
    
        return view('admin.ratinggraphstaff', compact('chartData', 'staffNames'));
    }
    

}
