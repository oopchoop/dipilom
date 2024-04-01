<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\DoctorTypesController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\TimesOfDateController;
use App\Http\Controllers\UserController;
use App\Models\Doctors;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', [UserController::class, 'user']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/types', [DoctorTypesController::class, 'getTypes']);
Route::get('/getDoctor/{id}', [DoctorsController::class, 'getDoctor']);
Route::get('/getDoctorWithType/{id}', [DoctorsController::class, 'getDoctorWithTypeId']);
Route::get('/rejectTime/{id}', [TimesOfDateController::class, 'rejectTime']);
Route::get('/getDates/{id}', [TimesOfDateController::class, 'getDate']);
Route::get('/getForUser', [RecordsController::class, 'getForUser']);
Route::get('/getAllDoctors', [DoctorsController::class, 'doctorsList']);
Route::get('/getLostUserRecords/{id}', [TimesOfDateController::class, 'getLostUserRecords']);
Route::get('/getActiveUserRecords/{id}', [TimesOfDateController::class, 'getActiveUserRecords']);
Route::get('/getActiveDoctorRecords/{id}', [TimesOfDateController::class, 'getActiveDoctorRecords']);
Route::get('/reject/{id}', [TimesOfDateController::class, 'rejectRecord']);
Route::get('/getAllRecords', [TimesOfDateController::class, 'getAllRecords']);
Route::get('/getAllRecordsWithDoctor/{id}', [TimesOfDateController::class, 'getAllRecordsWithDoctor']);

Route::post('/registr', [UserController::class, 'registr']);
Route::post('/autoriz', [UserController::class, 'autoriz']);
Route::post('/makeDate', [TimesOfDateController::class, 'addDate']);
Route::post('/record', [RecordsController::class, 'create']);
Route::post('/createTicket', [TimesOfDateController::class, 'createTicket']);

Route::post('/makeDoctor', [DoctorsController::class, 'createDoctor']);

Route::get('{any?}', function () {
    return view('app');
})->where('any', '.*');
