<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\StaffDatabase;
use App\Models\CustomerAppointment;
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
        $staffdatabase = StaffDatabase::join('servicedata', 'staffdatabase.serviceno', '=', 'servicedata.serviceno')
        ->select(
            'staffdatabase.serviceno',
            'staffdatabase.actionstaken',
            'staffdatabase.created_at'
            // Add more columns as needed
        )
        ->get();
    
    return view('staff.stafflogs', compact('staffdatabase'));
    }

    public function CustomerLogs()
    {
        $customerappointment = CustomerAppointment:: select('customerappointment.customerappointmentnumber','customerappointment.firstname', 'customerappointment.middlename', 'customerappointment.lastname', 'customerappointment.appointmentpurpose', 'customerappointment.appointmenttype','customerappointment.created_at')
        ->get();
        return view('customer.customerlogs', compact('customerappointment'));
    }
}
