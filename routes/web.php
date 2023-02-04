<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\BatchController;

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
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::prefix('public')->group(function () {
    Route::get('employee/{empCardID}', [EmployeeController::class, 'qrshow']);
});

Route::prefix('emprelated')->group(function () {
    Route::resource('campuses', CampusController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('posiitions', PositionController::class);
    Route::resource('prefixes', PrefixController::class);
});

Route::prefix('studrelated')->group(function () {
    Route::resource('classes', ClassController::class);
    Route::resource('batches', BatchController::class);
    Route::resource('prefixes', PrefixController::class);
});

Route::prefix('dashboard')->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::resource('students', StudentController::class);
    Route::resource('users', AuthController::class);
});