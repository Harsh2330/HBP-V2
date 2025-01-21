<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CasePaperController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('appointments/{appointment}/reschedule', [AppointmentController::class, 'reschedule'])->name('appointments.reschedule');
    Route::get('appointments/{appointment}/reschedule', [AppointmentController::class, 'rescheduleView'])->name('appointments.rescheduleView');

    Route::delete('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
    Route::get('/appointments/schedule', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::resource('appointments', AppointmentController::class);

});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'adminIndex'])->name('admin.dashboard');

// Add doctor panel routes
Route::get('doctor/dashboard', [HomeController::class, 'doctorIndex'])->name('doctor.dashboard');

// Add patient panel routes
Route::get('patient/dashboard', [HomeController::class, 'patientIndex'])->name('patient.dashboard');

Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::resource('user', UserController::class);
    Route::get('users', [UserController::class, 'index'])->name('users.index'); // Add this line
});

// Case Paper routes
Route::get('/case-paper', [CasePaperController::class, 'create'])->name('case-paper.create');
Route::post('/case-paper', [CasePaperController::class, 'store'])->name('case-paper.store');
Route::get('/case-paper/{id}', [CasePaperController::class, 'show'])->name('case-paper.show');

Route::get('/case-papers/select-user', [CasePaperController::class, 'selectUser'])->name('case-paper.select-user');
Route::get('/case-papers/user-records', [CasePaperController::class, 'userRecords'])->name('case-paper.user-records');
Route::get('/case-papers/select-user-and-records', [CasePaperController::class, 'selectUserAndRecords'])->name('case-paper.select-user-and-records');