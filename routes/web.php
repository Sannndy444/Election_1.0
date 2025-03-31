<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ElectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/pending', function () {
    return view('pending');
})->middleware(['auth', 'verified'])->name('pending');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin/candidate', CandidateController::class)->names('admin.candidate')->except('show');
    Route::resource('/admin/user', UserController::class)->names('admin.user')->except('show');
    Route::resource('/admin/election', ElectionController::class)->names('admin.election')->except('show');

    Route::get('/admin/user/verif', [Usercontroller::class, 'verif'])->name('admin.user.verif');
    Route::get('/admin/user/verification/{id}', [Usercontroller::class, 'verification'])->name('admin.user.verification');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user|admin'])->group(function () {
    Route::get('/home', [UserDashboardController::class, 'index'])->name('home');
});

require __DIR__.'/auth.php';
