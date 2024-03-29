<?php

use App\Http\Controllers\Resepsionis\DashboardController as ResepsionisDashboardController;
use App\Http\Controllers\Resepsionis\PatientDataController as ResepsionisPatientDataController;
use App\Http\Controllers\Resepsionis\PatientExaminationController as ResepsionisPatientExaminationController;
use Illuminate\Support\Facades\Route;

Route::resource('/resepsionis', ResepsionisDashboardController::class);
Route::resource('/data-pasien', ResepsionisPatientDataController::class);
Route::resource('/antrian-pasien', ResepsionisPatientExaminationController::class);

Route::Get('provinces', [ResepsionisPatientDataController::class, 'getProvinces'])->name('data-pasien.provinces');
Route::Get('cities', [ResepsionisPatientDataController::class, 'getCities'])->name('data-pasien.cities');
Route::Get('districts', [ResepsionisPatientDataController::class, 'getDistrict'])->name('data-pasien.districts');
Route::Get('villages', [ResepsionisPatientDataController::class, 'getVillage'])->name('data-pasien.villages');

