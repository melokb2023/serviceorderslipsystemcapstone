<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\CustomerAppointment;

class FinancialandPerformanceDataController extends Controller
{
    public function LineChart(){
        $result = Rating::select('customerrating.ratingno', 'customerappointment.firstname', 'customerrating.customerappointmentnumber', 'customerappointment.appointmentpurpose', 'customerrating.review', 'customerrating.rating')
       ->leftJoin('customerappointment', 'customerappointment.customerappointmentnumber', '=', 'customerrating.customerappointmentnumber')
       ->orderBy('customerrating.ratingno')
        ->get();

// Extract data for the chart
$labels = $result->pluck('firstname');
$data = $result->pluck('rating');

return view('your.view.name', compact('labels', 'data'));
    }
}
