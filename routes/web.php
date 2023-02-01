<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Routes
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/login', function(){
    // if(Session::)
    return view('login');
});

Route::post('/login/submit', [AuthController::class, 'login']);

Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::prefix('public')->group(function () {
    Route::get('employee/{empCardID}', [EmployeeController::class, 'qrshow']);
});


Route::resource('/dashboard/employees', EmployeeController::class);

// Route::get('/dashboard/employees/{id}', function(){
//     return view('dashboard');
// });
// Route::get('/dashboard/employees', [EmployeeController::class, 'index']);
// Route::post('/dashboard/employees', [EmployeeController::class, 'store']);
//Private Routes
// Route::group(['prefix'=>'/dashboard'], function(){
//     Route::resource('employees', EmployeeController::class);
//     Route::resource('students', Controller::class);
//     Route::resource('employees', Controller::class);
//     Route::resource('employees', Controller::class);
//     Route::resource('employees', Controller::class);
//     Route::resource('employees', Controller::class);
//     Route::resource('employees', Controller::class);
//     Route::group(['prefix'=>'/dashboard/students'], function(){
    
//     });
//     Route::group(['prefix'=>'/dashboard/users'], function(){
    
//     });
//     Route::group(['prefix'=>'/dashboard/campus'], function(){
    
//     });
//     Route::group(['prefix'=>'/dashboard/departments'], function(){
    
//     });
//     Route::group(['prefix'=>'/dashboard/positions'], function(){
    
//     });
//     Route::group(['prefix'=>'/dashboard/classes'], function(){
    
//     });
//     Route::group(['prefix'=>'/dashboard/batches'], function(){
    
//     });
// });