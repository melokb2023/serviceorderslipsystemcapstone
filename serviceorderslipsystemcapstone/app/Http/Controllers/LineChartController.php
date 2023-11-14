<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LineChartController extends Controller
{
    public function LineChart()
    {
        $data = DB::select("SELECT AVG(rating) AS customerrating FROM customerrating");
        // Now $data contains the average rating
    
        return view('admin.financialperformancereport', compact('data'));
    }

    public function LineChart2(){
        $data = "SELECT COUNT(typeofservice) FROM servicedata WHERE typeofservice = 'Reformatting'"; 
        $data2 = "SELECT COUNT(typeofservice) FROM servicedata WHERE typeofservice = 'Replacement'"; 
        $data3 = "SELECT COUNT(typeofservice) FROM servicedata WHERE typeofservice = 'Virus Removal'"; 
        $data4 = "SELECT COUNT(typeofservice) FROM servicedata WHERE typeofservice = 'Computer Network Troubleshooting'"; 
        $data5 = "SELECT COUNT(typeofservice) FROM servicedata WHERE typeofservice = 'Upgrade Hardware'"; 
        return view('admin.financialperformancereport',compact('data'));
    }
}
