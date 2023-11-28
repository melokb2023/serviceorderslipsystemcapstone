<?php

// app/Http/Controllers/LineChartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineChartController extends Controller
{
    public function LineChart(){
        // Define an array of services for counting
        $services = ['Reformatting', 'Replacement', 'Virus Removal', 'Computer Network Troubleshooting', 'Upgrade Hardware','Clean Up Files','Hardware Fixing','Peripheral Fixing','Software Installation','Reapplication'];
        $data = [];

        foreach ($services as $service) {
            $count = DB::table('servicedata')->where('typeofservice', $service)->count();
            $data[$service] = $count;
        }

        // Pass data to the view
        return view('admin.financialperformancereport', compact('data'));


    }

    public function BarChart(){
        // Define an array of services for counting
        $scores = ['1', '2', '3', '4', '5'];
        $data = [];

        foreach ($scores as $score) {
            $count = DB::table('customerrating')->where('rating', $score)->count();
            $data[$score] = $count;
        }

        // Pass data to the view
        return view('admin.ratinggraph', compact('data'));


    }
}
