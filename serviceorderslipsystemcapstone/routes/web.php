<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProgressController;
use App\Http\Controllers\StaffDatabaseController;
use App\Http\Controllers\CustomerAppointmentController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\LineChartController;
use App\Http\Controllers\FinancialandPerformanceDataController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class,'redirect']);


Route::get('/startservice', function () {
    return view('admin.startservice');
})->name('startservice');

Route::get('/servicelist', function () {
    return view('admin.servicelist');
})->name('servicelist');

Route::get('/adminadd', function () {
    return view('admin.add');
})->name('adminadd');

Route::get('/servicedata', function () {
    return view('admin.servicedata');
})->name('servicedata');

Route::get('/staffdatabase', function () {
    return view('staff.staffdatabase');
})->name('staffdatabase');

Route::get('/staffdatabase', function () {
    return view('staff.staffdatabase');
})->name('staffdatabase');


Route::get('/customer', function () {
   return view('customer.customerappointment');
})->name('customer');

Route::get('/serviceprogressmenu', function () {
   return view('admin.serviceprogressmenu');
})->name('serviceprogressmenu');

Route::get('/customerreviewsandratings', function () {
   return view('admin.customerreviewsandratings');
})->name('customerreviewsandratings');

Route::get('/customerrating', function () {
   return view('customer.customerrating');
})->name('customerrating');

Route::get('/customerappointment', function () {
   return view('customer.customerdata');
})->name('customerappointment');

Route::get('/startappointment', function () {
   return view('customer.startappointment');
})->name('startappointment');

Route::get('/add-appointment', function () {
   return view('customer.customerappointment');
})->name('add-appointment');

Route::get('/ratetheservice', function () {
   return view('customer.customerrating');
})->name('ratetheservice');

Route::get('/add-serviceprogress', function () {
   return view('admin.serviceprogressadd');
})->name('add-serviceprogress');

Route::get('/financialperformancereport', function () {
   return view('admin.financialperformancereport');
})->name('financialperformancereport');


Route::post('/customerappointment/add',[CustomerAppointmentController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-store');

//- Get All Data From the Student Info Table
Route::get('/customerappointment', [CustomerAppointmentController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment');

//View Student Info
Route::get('/customerappointment/{cano}', [CustomerAppointmentController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-show');

Route::delete('/customerappointment/delete/{cano}', [CustomerAppointmentController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-delete');

//Transfer Record to Edit Form
Route::get('/customerappointment/edit/{cano}', [CustomerAppointmentController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-edit');

//Save The Updated Data
Route::patch('/customerappointment/update/{cano}', [CustomerAppointmentController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-update');



//Store Student info to create function under StudentController

Route::get('/service/add', [ServiceController::class, 'getAppointmentInfo'])
   ->middleware(['auth', 'verified'])
   ->name('add-service');

Route::post('/service/add',[ServiceController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('service-store');

Route::get('/service', [ServiceController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('servicedata');

//View Student Info
Route::get('/service/{serno}', [ServiceController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('service-show');

Route::delete('/service/delete/{serno}', [ServiceController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('service-delete');

//Transfer Record to Edit Form
Route::get('/service/edit/{serno}', [ServiceController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('service-edit');

//Save The Updated Data
Route::patch('/service/update/{serno}', [ServiceController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('service-update');


//////////////////////SERVICE PROGRESS
Route::get('/serviceprogress/add', [ServiceProgressController::class, 'getServiceNumber'])
   ->middleware(['auth', 'verified'])
   ->name('add-serviceprogress');

Route::post('/serviceprogress/add',[ServiceProgressController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('serviceprogress-store');   

Route::get('/serviceprogress', [ServiceProgressController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('serviceprogress');

   //Save The Updated Data
Route::patch('/serviceprogress/update/{servicenumber}', [ServiceProgressController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('serviceprogress-update');

Route::get('/serviceprogress/{servicenumber}', [ServiceProgressController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('serviceprogress-show');

//Transfer Record to Edit Form
Route::get('/serviceprogress/edit/{servicenumber}', [ServiceProgressController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('serviceprogress-edit');


  
//STAFF DATABASE


   //View Student Info
Route::get('/staffdatabase/{serviceno}', [StaffDatabaseController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-show');

//Transfer Record to Edit Form
Route::get('/staffdatabase/edit/{serviceno}', [StaffDatabaseController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-edit');

//Save The Updated Data
Route::patch('/staffdatabase/update/{serviceno}', [StaffDatabaseController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-update');

Route::get('/staffdatabase', [StaffDatabaseController::class, 'getServiceInfo']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase');

   ///////RATINGS CONTROLLER

/////CUSTOMER RATING

Route::get('/customerrating/add', [RatingsController::class, 'getAppointmentInfo'])
   ->middleware(['auth', 'verified'])
   ->name('add-customerrating');

Route::get('/customerrating', [RatingsController::class, 'getRatingInfo'])
   ->middleware(['auth', 'verified'])
   ->name('customerrating');

Route::post('/customerrating/add',[RatingsController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('customerrating-store');

Route::get('/customerrating', [RatingsController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('customerrating');

//View Student Info
Route::get('/customerrating/{cr}', [RatingsController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('customerrating-show');


Route::get('ratings','RatingsController@ratings');
Route::post('review-store', 'BookingController@reviewstore')->name('review.store');
Route::get('/financialperformancereport', 'App\Http\Controllers\LineChartController@LineChart');
Route::get('/financialperformancereport', 'App\Http\Controllers\LineChartController@BarChart');
Route::get('/financialperformancereport', [LineChartController::class, 'LineChart'])->name('financialperformancereport');
Route::get('/ratinggraph', [LineChartController::class, 'BarChart'])->name('ratinggraph');
//Route::post('/service/add',[StudentController::class, 'store'] )
//->middleware(['auth', 'verified'])
//-//>name('service-store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Send Notification Both Admin/Customer
Route::get('send-mail', function () {

   $details = [
       'title' => 'Mail from Compusource.com',
       'body' => 'The Service is Complete.'
   ];

   Mail::to('vanicarmelle18@gmail.com')->send(new \App\Mail\MyMail($details));
  
   dd("Email is Sent.");

   $details2 = [
      'title' => 'Mail from Compusource.com Staff ',
      'body' => 'The Work is Complete.'
  ];
  
   Mail::to('kyle.melo@lccdo.edu.ph')->send(new \App\Mail\MyMail($details2));
  
   dd("Email is Sent.");
});



