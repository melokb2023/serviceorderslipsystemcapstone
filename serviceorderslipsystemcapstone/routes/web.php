<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
