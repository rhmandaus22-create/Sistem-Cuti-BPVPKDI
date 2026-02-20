<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveFormController;

// Halaman Awal (Landing Page)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard & Read
Route::get('/dashboard', [LeaveFormController::class, 'dashboard'])->name('dashboard');

// Create
Route::get('/formulir-cuti', [LeaveFormController::class, 'index'])->name('leave.form');
Route::post('/submit', [LeaveFormController::class, 'submit'])->name('leave.form.submit');

// Update
Route::get('/edit-cuti/{id}', [LeaveFormController::class, 'edit'])->name('leave.edit');
Route::put('/update-cuti/{id}', [LeaveFormController::class, 'update'])->name('leave.update');

// Delete
Route::delete('/hapus-cuti/{id}', [LeaveFormController::class, 'destroy'])->name('leave.destroy');

// Other
Route::get('/izin-cuti', [LeaveFormController::class, 'izinCuti'])->name('leave.izin');
Route::post('/download-word', [LeaveFormController::class, 'downloadWord'])->name('leave.download.word');
