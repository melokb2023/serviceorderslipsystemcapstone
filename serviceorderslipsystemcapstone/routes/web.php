<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProgressController;
use App\Http\Controllers\StaffDatabaseController;
use App\Http\Controllers\CustomerAppointmentController;


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

Route::get('/student/add', function () {
    return view('student.add');
})->middleware(['auth', 'verified'])->name('add-student');

//Store Student info to create function under StudentController
Route::post('/service/add',[ServiceController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('service-store');

//- Get All Data From the Student Info Table
Route::get('/service', [ServiceController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('service');

//View Student Info
Route::get('/service/{serviceno}', [ServiceController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('service-show');

Route::delete('/service/delete/{serviceno}', [ServiceController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('service-delete');

//Transfer Record to Edit Form
Route::get('/service/edit/{serviceno}', [ServiceController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('student-edit');

//Save The Updated Data
Route::patch('/service/update/{serviceno}', [ServiceController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('service-update');

Route::post('/customerappointment/add',[CustomerAppointmentController::class, 'store'] )
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-store');

//- Get All Data From the Student Info Table
Route::get('/customerappointment', [CustomerAppointmentController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment');

//View Student Info
Route::get('/customerappointment/{customernumber}', [CustomerAppointmentController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-show');

Route::delete('/customerappointment/delete/{customernumber}', [CustomerAppointmentController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-delete');

//Transfer Record to Edit Form
Route::get('/customerappointment/edit/{customernumber}', [CustomerAppointmentController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-edit');

//Save The Updated Data
Route::patch('/customerappointment/update/{serviceno}', [CustomerAppointmentController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('customerappointment-update');

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

//Save The Updated Data
Route::patch('/serviceprogress/update/{servicenumber}', [ServiceProgressController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('serviceprogress-update');

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
