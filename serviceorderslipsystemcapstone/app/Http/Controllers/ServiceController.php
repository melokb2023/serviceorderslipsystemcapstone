<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\CustomerAppointment;
use App\Models\StaffDatabase;
use App\Models\Staff;
use App\Models\Rating;
use App\Models\User;
use App\Models\Logs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Redirect;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Accessed the Service Data";
        $logs->actiondatetime = now();
        $logs->save();
    
        $query = Service::join('customerappointment', 'servicedata.customerappointmentnumber', '=', 'customerappointment.customerappointmentnumber')
        ->join('stafflist', 'servicedata.staffnumber', '=', 'stafflist.staffnumber')
        ->join('users as customer', 'customerappointment.customerno', '=', 'customer.id')
        ->join('users as staff', 'stafflist.id', '=', 'staff.id')
        ->select(
            'servicedata.*', 
            'customer.name as customername', 
            'customer.email as customeremail', 
            'customerappointment.dateandtime',
            'stafflist.*',
            'staff.name as staffname',
            'staff.email as staffemail'
        );
    
        // Check if there is a filter for Customer Appointment Number
        if ($request->filled('customer_appointment_number_filter')) {
            $query->where('servicedata.customerappointmentnumber', $request->input('customer_appointment_number_filter'));
        }
    
        // Check if there is a filter for Customer Name
        if ($request->filled('customer_name_filter')) {
            $query->where('customer.name', 'like', '%' . $request->input('customer_name_filter') . '%');
        }
    
        // Check if there is a filter for Type of Service
        if ($request->filled('typeofservice_filter') && $request->input('typeofservice_filter') !== 'All') {
            $query->where('servicedata.typeofservice', $request->input('typeofservice_filter'));
        }
    
        if ($request->filled('serviceprogress_filter')) {
            $filterValue = $request->input('serviceprogress_filter');
        
            if ($filterValue === 'Ongoing' || $filterValue === 'Completed') {
                $query->where('servicedata.serviceprogress', $filterValue);
            }
        }
    
        $servicedata = $query->orderBy('serviceno', 'desc')->get();
    
        // Get distinct types of service for the combo box
        $typesOfService = Service::distinct('typeofservice')->pluck('typeofservice');
    
        return view('admin.servicedata', compact('servicedata', 'typesOfService'));
    }
    //////VIEW CUSTOMER LIST
    public function CustomerList(Request $request)
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Accessed the Customer List";
    $logs->actiondatetime = now();
    $logs->save();
    $month = $request->input('month');
    $year = $request->input('year');

    $query = CustomerAppointment::select(
        'customerappointment.customerappointmentnumber',
        'customerappointment.customerno',
        'users.name as customername',
        'users.email as customeremail',
        'customerappointment.appointmentpurpose', // Corrected column name
        'customerappointment.appointmenttype',
        'customerappointment.dateandtime'
        // Add more columns as needed
    )
    ->join('users', 'users.id', '=', 'customerappointment.customerno');

    if ($month && $year) {
        $query->whereMonth('customerappointment.dateandtime', $month)
            ->whereYear('customerappointment.dateandtime', $year);
    }

    $customerappointment = $query->get();

    return view('admin.customerdata', compact('customerappointment', 'month', 'year'));
}

    ///VIEW CUSTOMER
    public function ViewCustomer(string $id){
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Showed a Specific Customer";
        $logs->actiondatetime = now();
        $logs->save();
        $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->get();
        return view('admin.showcustomer', compact('customerappointment'));
    }

    //EDIT CUSTOMER
    public function EditCustomer(string $id)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Accessed the Edit Function";
        $logs->actiondatetime = now();
        $logs->save();
        $customerappointment = CustomerAppointment::where('customerappointmentnumber', $id)->get();
        return view('admin.editcustomer', compact('customerappointment'));
    }

    ///UPDATE CUSTOMER
    public function UpdateCustomer(Request $request, string $id)
    {
        $validateData =$request->validate([
            'xappointmentpurpose' =>['required', 'max:100'],
            'xappointmenttype' =>['required','max:100'],
        ]);

        $customerappointment= CustomerAppointment::where('customerappointmentnumber', $id)
        ->update(
             [
             
             'appointmentpurpose'=> $request->xappointmentpurpose,
             'appointmenttype'=> $request->xappointmenttype,
             ]);
             $logs = new Logs;
             $logs->userid = Auth::id(); 
             $logs->description = "Updated Data for: ";
             $logs->actiondatetime = now();
             $logs->save();
        return redirect()->route('customerlist');
    }

    //DELETE CUSTOMER
    public function DeleteCustomer(string $id)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Deleted a Customer";
        $logs->actiondatetime = now();
        $logs->save();
        $customerappointment= CustomerAppointment::where('customerappointmentnumber', $id);
        $customerappointment->delete();
        return redirect()->route('customerlist');
    }



/**
     * Show the form for creating a new resource.
     */
    
    
     public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $servicedata = new Service();
        $servicedata->customerappointmentnumber = $request->xcustomerappointmentnumber;
        $servicedata->staffnumber = $request->xstaffnumber;
        $servicedata->typeofservice = $request->xtypeofservice;
        $servicedata->listofproblems = $request->xlistofproblems;
         // Hash the password before saving
        $servicedata->customerpassword = $request->xcustomerpassword;
        $servicedata->defectiveunits = $request->xdefectiveunits;
        $servicedata->actionsrequired = $request->xactionsrequired;
        $servicedata->workprogress = "Ongoing";
        $servicedata->workremarks = "";
        $servicedata->serviceprogress = "Ongoing";
        $servicedata->serviceremarks = "";
        $currentYear = date('Y');
        $lastOrder = Service::max('servicereferencecode');
        $lastYear = substr($lastOrder, 0, 4);
    
        if ($lastYear == $currentYear) {
            // If orders exist for the current year, increment the last order number
            $orderNumber = intval(substr($lastOrder, -4)) + 1;
        } else {
            // If it's a new year, start with 1
            $orderNumber = 1;
        }
    
        $serviceReferenceCode = $currentYear . '-' .str_pad($orderNumber, 4, '0', STR_PAD_LEFT);
    
        $servicedata->servicereferencecode = $serviceReferenceCode;

        // Get Customer Appointment based on customerappointmentnumber
$customerAppointment = CustomerAppointment::where('customerappointmentnumber', $request->xcustomerappointmentnumber)->first();

// Get User information based on customerno
$customerUser = User::find($customerAppointment->customerno);

// Now you have access to the customer's email
$customerEmail = $customerUser->email;

// Rest of your code
$servicedata->servicestarted = $request->xservicestarted;
$servicedata->serviceend = now();
$servicedata->save();

$details = [
    'title' => 'Order Reference Code',
    'body' => 'Service has been placed. Your order reference code is: ' . $serviceReferenceCode,
];

// Send email to the customer
Mail::to($customerEmail)->send(new MyMail($details));

// Flash success message and log the action
session()->flash('success_message', 'Data Stored');

$logs = new Logs;
$logs->userid = Auth::id(); 
$logs->description = "Service added for: " . $customerAppointment->customername;
$logs->actiondatetime = now();
$logs->save();

return redirect()->route('servicedata');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Viewed Service with ID: " . $id;
        $logs->actiondatetime = now();
        $logs->save();
        $servicedata = Service::where('serviceno', $id)->get();
        return view('admin.show', compact('servicedata'));
    }
   
    public function show2(string $id)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Views Service with ID {$id} for the Staff to See"; // Updated description
        $logs->actiondatetime = now();
        $logs->save();
        $servicedata = Service::where('serviceno', $id)->get();
        return view('staff.show', compact('servicedata'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Edit the Service";
        $logs->actiondatetime = now();
        $logs->save();
        $servicedata = Service::where('serviceno', $id)->get();
        return view('admin.edit', compact('servicedata'));
    }

    /**
     * Update the specified resource in storage.
     */
    

    
     
     public function update(Request $request, string $id)
     {

        $servicedata = Service::where('serviceno', $id)->first();


         // Update the Service record
       if ($request->xserviceprogress == 'Completed' && $servicedata->workprogress == "Completed") {
        // Update the Service record
        Service::where('serviceno', $id)
            ->update([
                'listofproblems' => $request->xlistofproblems,
                'typeofservice' => $request->xtypeofservice,
                'customerpassword' => $request->xcustomerpassword,
                'defectiveunits' => $request->xdefectiveunits,
                'actionsrequired' => $request->xactionsrequired,
                'serviceend' => $request->xserviceend,
                'serviceprogress' => $request->xserviceprogress,
                'serviceremarks' => $request->xserviceremarks,
            ]);

            $customerappointment = CustomerAppointment::where('customerappointmentnumber', $servicedata->customerappointmentnumber)->first();

            // Get User information based on customerno
            $customerUser = User::find($customerappointment->customerno);
            $customerEmail = $customerUser->email;

        $details = [
            'title' => 'Work Completion Notification',
            'body' => 'Your service is complete! You may now claim your unit',
        ];

        // Send email to a recipient (replace 'recipient@example.com' with the actual recipient email)
        Mail::to($customerEmail)->send(new MyMail($details));
        session()->flash('success_message', 'Data Updated');
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Updated the Service Data";
        $logs->actiondatetime = now();
        $logs->save();
        return redirect()->route('servicedata');
    } 
    else {
        Service::where('serviceno', $id)
        ->update([
            'listofproblems' => $request->xlistofproblems,
            'typeofservice' => $request->xtypeofservice,
            'customerpassword' => $request->xcustomerpassword,
            'defectiveunits' => $request->xdefectiveunits,
            'actionsrequired' => $request->xactionsrequired,
            'serviceprogress' => $request->xserviceprogress,
            'serviceremarks' => $request->xserviceremarks,
        ]);
        session()->flash('success_message', 'Data Updated');
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Updated the Service Data";
        $logs->actiondatetime = now();
        $logs->save();
        return redirect()->route('servicedata');
    }
 }
    



    public function update2(Request $request, string $id)
    {
       
      $servicedata= Service::where('serviceno', $id)
        ->update(
             [
             
             'workprogress'=> $request->xworkprogress,
             
             ]);
             $logs = new Logs;
             $logs->userid = Auth::id(); 
             $logs->description = "Updated the Work Progress";
             $logs->actiondatetime = now();
             $logs->save();
        return redirect()->route('staffdatabase');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicedata= Service::where('serviceno', $id);
        $servicedata->delete();
        session()->flash('success_message', 'Data Deleted');
        return redirect()->route('servicedata');
    }

    public function editstaff(string $id)
    {
        $servicedata = Service::where('serviceno', $id)->get();
        $staff = Staff::all();
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Accessed the Change Staff Option";
        $logs->actiondatetime = now();
        $logs->save();
        return view('admin.replacestaff', compact('servicedata','staff'));
    }

    public function updatestaff(Request $request, string $id)
    {
       
      $servicedata= Service::where('serviceno', $id)
        ->update(
             [
             
             'staffnumber'=> $request->xstaffnumber,
             
             ]);
        session()->flash('success_message', 'You successfully changed the staff');
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Admin Changes Staff for a Specific Service";
        $logs->actiondatetime = now();
        $logs->save();
        return redirect()->route('servicedata');
    }



    public function getAppointmentInfo()
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Accessed the Start Service Menu";
    $logs->actiondatetime = now();
    $logs->save();
    
    $customerappointment = CustomerAppointment::join('users', 'customerappointment.customerno', '=', 'users.id')
        ->select('customerappointment.*', 'users.name as customername')
        ->get();

    return view('admin.add', compact('customerappointment'));
}
    
    public function getAvailableCustomerAppointments()
    {
        // Get all customer appointments
        $allCustomerAppointments = CustomerAppointment::join('users', 'customerappointment.customerno', '=', 'users.id')
        ->select('customerappointment.customerappointmentnumber', 'customerappointment.customerno', 'users.name as customername')
        ->get();

        // Get customer appointments that are not listed in service data
        $listedCustomerAppointments = Service::pluck('customerappointmentnumber')->unique();
        $availableCustomerAppointments = $allCustomerAppointments->reject(function ($customerAppointment) use ($listedCustomerAppointments) {
            return $listedCustomerAppointments->contains($customerAppointment->customerappointmentnumber);
        });

        return $availableCustomerAppointments;
    }

    public function getAvailableServiceNumbers()
{
    // Get all service numbers
    $allServiceNumbers = Service::all();

    // Get service numbers that are not listed in service data
    $listedServiceNumbers = Service::pluck('serviceno')->unique();
    $availableServiceNumbers = $allServiceNumbers->reject(function ($servicedata) use ($listedServiceNumbers) {
        return $listedServiceNumbers->contains($servicedata->serviceno);
    });

    return $availableServiceNumbers;
}


public function getAvailableStaffNumbers()
{
    // Get all service numbers
    $allStaffNumbers = Staff::join('users', 'stafflist.id', '=', 'users.id')
    ->select('stafflist.staffnumber', 'users.name as staffname')
    ->get();

    // Get staff numbers that are not listed in service data or have completed services
    $listedStaffNumbers = Service::where('serviceprogress', '!=', 'Completed')->pluck('staffnumber')->unique();
    
    $availableStaffNumbers = $allStaffNumbers->reject(function ($staff) use ($listedStaffNumbers) {
        return $listedStaffNumbers->contains($staff->staffnumber);
    });

    return $availableStaffNumbers;
}




    public function ServiceInfo(){
        $servicedata = Service::select('serviceno', 'typeofservice', 'workprogress')->get();
        return view('staff.staffdatabase', compact('servicedata'));
    }

    public function getStaff(){
        $staff = Staff::join('users', 'stafflist.id', '=', 'users.id')
            ->select('stafflist.*', 'users.name as staffname')
            ->get();
    
        return view('admin.add', compact('staff'));
    }

  

    public function checkServiceStatus(Request $request)
    {
        $orderReferenceCode = $request->input('order_reference_code');
    
        // Query the service data based on the provided order reference code
        $serviceData = Service::where('orderreferencecode', $orderReferenceCode)
        ->select('serviceprogress', 'customername')
        ->first();
        
        if($serviceData){
        $serviceStatus = $serviceData->serviceprogress;
        $customerName = $serviceData->customername;
        $logs = new Logs;
        $logs->userid = Auth::id(); 
        $logs->description = "Checks Reference Code";
        $logs->actiondatetime = now();
        $logs->save();

        // Pass the data to the view
        return view('customer.checkreferencenumber', compact('orderReferenceCode', 'serviceStatus', 'customerName'));
        }
        
        elseif (!empty($serviceStatus)) {
            return view('customer.checkreferencenumber', compact('serviceStatus', 'orderReferenceCode'));
        } else {
            // If serviceStatus is empty, redirect back with an error message
            return redirect()->back()->withInput()->withErrors(['order_reference_code' => 'Invalid Order Reference Code']);
        }
    }
    public function countAll()
{
    $logs = new Logs;
                $logs->userid = Auth::id(); 
                $logs->description = "Accessed the Admin Dashobard";
                $logs->actiondatetime = now();
                $logs->save();
    $typesOfServicesCount = Service::select('typeofservice')->distinct()->count();

    $customerAppointmentsCount = CustomerAppointment::count();
    $serviceDataCount = Service::count();
    $ratingsCount = Rating::count();
    
   
    
    $months = [
        '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
        '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
        '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'
    ];

    $data = [];

    foreach ($months as $monthNumber => $monthName) {
        // Count the number of job orders for each month
        $count = DB::table('servicedata')
            ->whereMonth('created_at', $monthNumber)
            ->count();

        $data[$monthName] = $count;
    }

    return view('admin.admindashboard', compact('typesOfServicesCount', 'customerAppointmentsCount', 'serviceDataCount', 'ratingsCount','data'));
}

public function LineChart2()
{
    $logs = new Logs;
    $logs->userid = Auth::id(); 
    $logs->description = "Accessed the Chart for Service";
    $logs->actiondatetime = now();
    $logs->save();
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



   


   


}
