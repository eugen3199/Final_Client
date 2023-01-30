<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EmployeeController;

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
    return redirect('/home/dashboard');
});

Route::get('/login', function(){
    // if(Session::)
    return view('login');
});

Route::post('/login/submit', [TestController::class, 'login']);

Route::get('/dashboard', [TestController::class, 'index']);

Route::resource('/dashboard/employees', EmployeeController::class);

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