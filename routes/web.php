<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminVoteController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\UserCandidateController;
use App\Http\Controllers\UserElectionController;
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
    Route::get('/admin/home', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/election/{id}/detail', [ElectionController::class, 'showDetail'])->name('admin.election.showDetail');
    Route::get('/admin/vote/list', [AdminVoteController::class, 'list'])->name('admin.vote.list');
    Route::get('/admin/vote/detail/{id}', [AdminVoteController::class, 'detail'])->name('admin.vote.detail');
});

Route::middleware(['auth', 'role:user|admin'])->group(function () {
    Route::resource('/candidate', UserCandidateController::class)->names('user.candidate')->except('show');

    Route::get('/home', [UserDashboardController::class, 'index'])->name('user.home');
    Route::get('/election/draft', [UserElectionController::class, 'draft'])->name('user.election.draft');
    Route::get('/election/active', [UserElectionController::class, 'active'])->name('user.election.active');
    Route::get('/election/history', [UserElectionController::class, 'history'])->name('user.election.history');
    Route::get('/election/vote/{id}', [UserElectionController::class, 'vote'])->name('user.election.vote');
    Route::post('/vote/election', [UserElectionController::class, 'voteStore'])->name('user.vote.store');
});

require __DIR__.'/auth.php';
