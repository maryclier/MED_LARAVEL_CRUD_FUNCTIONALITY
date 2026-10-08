<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return redirect()->route('doctors.index');
});

Route::resource('doctors', DoctorController::class);

Route::resource('patients', PatientController::class);

Route::resource('appointments', AppointmentController::class);