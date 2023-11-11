<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancialandPerformanceDataController extends Controller
{
    public function LineChart(){
        return view('financialperformancereport');
    }
}
