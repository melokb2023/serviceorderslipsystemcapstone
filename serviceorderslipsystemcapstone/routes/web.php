<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProgressController;
use App\Http\Controllers\StaffDatabaseController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\CustomerAppointmentController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\LineChartController;
use App\Http\Controllers\FinancialandPerformanceDataController;
use App\Http\Controllers\CheckStatusController;
use App\Http\Controllers\StaffController;
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

Route::get('/landingpagehome', function () {
   return view('landingpagehome');
})->name('landingpagehome');

Route::get('/landingpageaboutus', function () {
   return view('landingpageaboutus');
})->name('landingpageaboutus');

Route::get('/landingpagecontactus', function () {
   return view('landingpagecontactus');
})->name('landingpagecontactus');

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

Route::get('/reportmenu', function () {
   return view('admin.reportmenu');
})->name('reportmenu');

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

Route::get('/staffdatabasemenu', function () {
   return view('staff.staffdatabasemenu');
})->name('staffdatabasemenu');

Route::get('/financialperformancereport', function () {
   return view('admin.financialperformancereport');
})->name('financialperformancereport');

Route::get('/startlist', function () {
   return view('admin.staffadd');
})->name('startlist');


///////////CUSTOMER APPOINTMENT  /////////////////////////////////////////////////////////////////////

Route::post('/customerappointment/add',[CustomerAppointmentController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-store');



//-//////////////////////////////////////////////////////SERVICE CONTROLLER(VIEW, UPDATE AND DELETE)////////////////////////////////
Route::get('/customerlist', [ServiceController::class, 'CustomerList']) 
   ->middleware(['auth', 'verified'])
   ->name('customerlist');

//View Student Info
Route::get('/customerlist/{cano}', [ServiceController::class, 'ViewCustomer']) 
   ->middleware(['auth', 'verified'])
   ->name('customerlist-show');

Route::delete('/customerlist/delete/{cano}', [ServiceController::class, 'DeleteCustomer']) 
   ->middleware(['auth', 'verified'])
   ->name('customerlist-delete');

//Transfer Record to Edit Form
Route::get('/customerlist/edit/{cano}', [ServiceController::class, 'EditCustomer']) 
   ->middleware(['auth', 'verified'])
   ->name('customerlist-edit');

//Save The Updated Data
Route::patch('/customerlist/update/{cano}', [ServiceController::class, 'UpdateCustomer']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-update');



////////////////////////////////////////////////////////////SERVICE CONTROLLER  //////////////////////////////////

Route::get('/service/add', [ServiceController::class, 'getAppointmentInfo'])
   ->middleware(['auth', 'verified'])
   ->name('add-service');

Route::get('/service/add', [ServiceController::class, 'getStaff'])
   ->middleware(['auth', 'verified'])
   ->name('add-service');

Route::post('/service/add',[ServiceController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('service-store');

Route::get('/service', [ServiceController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('servicedata');

Route::get('/customerlist', [ServiceController::class, 'CustomerList']) 
   ->middleware(['auth', 'verified'])
   ->name('customerlist');

//View Student Info
Route::get('/service/{serno}', [ServiceController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('service-show');

Route::delete('/service/delete/{serno}', [ServiceController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('service-delete');

   //Save The Updated Data
Route::patch('/service/update/{serno}', [ServiceController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('service-update');

//Transfer Record to Edit Form
Route::get('/service/edit/{serno}', [ServiceController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('service-edit');

//////////////////////SERVICE PROGRESS////////////////////////////////////////////////////////////////
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



Route::get('/staffdatabase/add', [StaffDatabaseController::class, 'getService']) 
   ->middleware(['auth', 'verified'])
   ->name('add-staffdatabase');

Route::post('/staffdatabase/add',[StaffDatabaseController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('staffdatabase-store');

Route::get('/staffdatabase', [StaffDatabaseController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase');

Route::patch('/staffdatabase/update/{serviceno}', [StaffDatabaseController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-update');

Route::get('/staffdatabase/{serviceno}', [StaffDatabaseController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-show');

Route::get('/staffdatabase/{serviceno}', [ServiceController::class, 'show2']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-show');

//Transfer Record to Edit Form
Route::get('/staffdatabase/edit/{serviceno}', [StaffDatabaseController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('staffdatabase-edit');
//Save The Updated Data



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


/////////////////////////////////////LOGS///////////////////////////////////////////

Route::get('/servicelogs', [LogsController::class, 'ServiceLogs']) 
   ->middleware(['auth', 'verified'])
   ->name('servicelogs');
Route::get('/stafflogs', [LogsController::class, 'StaffLogs']) 
   ->middleware(['auth', 'verified'])
   ->name('stafflogs');
Route::get('/customerlogs', [LogsController::class, 'CustomerLogs']) 
   ->middleware(['auth', 'verified'])
   ->name('customerlogs');

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


///////CHECK STATUS
Route::get('/check-status', [CheckStatusController::class, 'index'])->name('public-check-status');


////////////////////////////////////////////////////////////////STAFF LIST ///////////////////////////////////


Route::post('/staff/add',[StaffController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('staff-store');

Route::get('/staff', [StaffController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('staff');

Route::get('/staff/{staff}', [StaffController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('staff-show');

Route::delete('/staff/delete/{staff}', [StaffController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('staff-delete');

   //Save The Updated Data
Route::patch('/staff/update/{staff}', [StaffController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('staff-update');

Route::get('/staff/edit/{staff}', [StaffController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('staff-edit');
