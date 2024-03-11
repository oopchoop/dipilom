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
Route::get('/rejectTime/{id}', [TimesOfDateController::class, 'rejectTime']);
Route::get('/getDates/{id}', [TimesOfDateController::class, 'getDate']);
Route::get('/getForUser', [RecordsController::class, 'getForUser']);

Route::post('/registr', [UserController::class, 'registr']);
Route::post('/autoriz', [UserController::class, 'autoriz']);
Route::post('/makeDate', [TimesOfDateController::class, 'addDate']);
Route::post('/record', [RecordsController::class, 'create']);

Route::get('{any?}', function () {
    return view('app');
})->where('any', '.*');
