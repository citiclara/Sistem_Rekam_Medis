<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PrescriptionController;

Route::get('/', function () {
    return view('home'); // ✅ arahkan ke resources/views/home.blade.php
});

// Patients
Route::resource('patients', PatientController::class);

// Doctors
Route::resource('doctors', DoctorController::class);

// Treatments
Route::resource('treatments', TreatmentController::class);

// Medications
Route::resource('medications', MedicationController::class);

// Prescriptions
Route::resource('prescriptions', PrescriptionController::class);

