<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DeviceStateController;
use App\Http\Controllers\RegisterDeviceController;
use App\Http\Controllers\sensorRegisterController;
use App\Http\Controllers\customerReisterController;
use App\Http\Controllers\deviceIssueController;
use App\Http\Controllers\LoginCtrl;

// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\View;
// use Illuminate\Http\Request;
// use App\Http\Controllers\LoginCtrl;
// use App\Http\Controllers\DeviceRegisterCtrl;
// use App\Http\Controllers\DeviceStatsCtrl;
// use App\Http\Controllers\DeviceIssueCtrl;
// use App\Http\Controllers\SensorRegisterCtrl;
// use App\Http\Controllers\CustomerRegister;

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
Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login')->with("message","");
});

// Route::get('/register', function () {
//     return view('register')->with("message","");
// });

Route::get('dashboard',[DeviceStateController::class,'Index']);
Route::get('/deviceRegForm',[RegisterDeviceController::class,'Index']);
Route::get('/deviceIssueForm',[deviceIssueController::class,'Index']);
Route::get('/sensorRegForm',[sensorRegisterController::class,'Index']);
Route::get('/entryCustomer',[customerReisterController::class,'Index']);
Route::get('/table', function () {
    return view('table');
});


Route::post('/login',[LoginController::class,'Login']);
// Route::post('/register',[RegisterController::class,'Register']);
Route::post('/deviceRegForm',[RegisterDeviceController::class,'RegisterDevice']);
Route::post('/sensorRegForm',[sensorRegisterController::class,'registerSensor']);
Route::post('/entryCustomer',[customerReisterController::class,'registerCustomer']);
Route::post('/deviceIssueForm',[deviceIssueController::class,'IssueDevice']);

// Route::get('/device-state-reg', function () {
//     return view('DeviceRegForm');
// });
// Route::post('/device-state',[DeviceStateController::class,'DeviceState']);

Route::get('/logout',[LoginController::class,'Logout']);