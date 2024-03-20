<?php

use App\Http\Controllers\Resepsionis\DashboardController as ResepsionisDashboardController;
use App\Http\Controllers\Resepsionis\PatientDataController as ResepsionisPatientDataController;
use App\Http\Controllers\Resepsionis\PatientExaminationController as ResepsionisPatientExaminationController;
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

Route::resource('/resepsionis', ResepsionisDashboardController::class);
Route::resource('/data-pasien', ResepsionisPatientDataController::class);
Route::resource('/antrian-pasien', ResepsionisPatientExaminationController::class);
