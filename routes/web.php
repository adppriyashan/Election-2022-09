<?php

use App\Http\Controllers\ElectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NominatorController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\VotersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'permitted']);

Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->middleware(['auth', 'permitted']);
    Route::post('/enroll', [UserController::class, 'enroll'])->name('admin.users.enroll')->middleware(['auth']);
    Route::get('/list', [UserController::class, 'list'])->name('admin.users.list')->middleware(['auth']);
    Route::get('/get', [UserController::class, 'getOne'])->name('admin.users.get.one')->middleware(['auth']);
    Route::get('/delete', [UserController::class, 'deleteOne'])->name('admin.users.delete.one')->middleware(['auth']);
    Route::get('/find', [UserController::class, 'find'])->name('admin.users.find.one')->middleware(['auth']);
});

Route::prefix('/usertypes')->group(function () {
    Route::get('/', [UserTypeController::class, 'index'])->middleware(['auth', 'permitted']);
    Route::post('/enroll', [UserTypeController::class, 'enroll'])->name('admin.usertypes.enroll')->middleware(['auth']);
    Route::get('/list', [UserTypeController::class, 'list'])->name('admin.usertypes.list')->middleware(['auth']);
    Route::get('/get', [UserTypeController::class, 'getOne'])->name('admin.usertypes.get.one')->middleware(['auth']);
    Route::get('/delete', [UserTypeController::class, 'deleteOne'])->name('admin.usertypes.delete.one')->middleware(['auth']);
});

Route::prefix('/party')->group(function () {
    Route::get('/', [PartyController::class, 'index'])->middleware(['auth', 'permitted']);
    Route::post('/enroll', [PartyController::class, 'enroll'])->name('admin.parties.enroll')->middleware(['auth']);
    Route::get('/list', [PartyController::class, 'list'])->name('admin.parties.list')->middleware(['auth']);
    Route::get('/get', [PartyController::class, 'getOne'])->name('admin.parties.get.one')->middleware(['auth']);
    Route::get('/delete', [PartyController::class, 'deleteOne'])->name('admin.parties.delete.one')->middleware(['auth']);
});

Route::prefix('/voters')->group(function () {
    Route::get('/', [VotersController::class, 'index'])->middleware(['auth', 'permitted']);
    Route::post('/enroll', [VotersController::class, 'enroll'])->name('admin.voters.enroll')->middleware(['auth']);
    Route::get('/list', [VotersController::class, 'list'])->name('admin.voters.list')->middleware(['auth']);
    Route::get('/get', [VotersController::class, 'getOne'])->name('admin.voters.get.one')->middleware(['auth']);
    Route::get('/delete', [VotersController::class, 'deleteOne'])->name('admin.voters.delete.one')->middleware(['auth']);
});

Route::prefix('/election')->group(function () {
    Route::get('/', [ElectionController::class, 'index'])->middleware(['auth', 'permitted']);
    Route::post('/enroll', [ElectionController::class, 'enroll'])->name('admin.election.enroll')->middleware(['auth']);
    Route::get('/list', [ElectionController::class, 'list'])->name('admin.election.list')->middleware(['auth']);
    Route::get('/get', [ElectionController::class, 'getOne'])->name('admin.election.get.one')->middleware(['auth']);
    Route::get('/delete', [ElectionController::class, 'deleteOne'])->name('admin.election.delete.one')->middleware(['auth']);
});

Route::prefix('/nominators')->group(function () {
    Route::get('/', [NominatorController::class, 'index'])->middleware(['auth', 'permitted']);
    Route::post('/enroll', [NominatorController::class, 'enroll'])->name('admin.nominators.enroll')->middleware(['auth']);
    Route::get('/list', [NominatorController::class, 'list'])->name('admin.nominators.list')->middleware(['auth']);
    Route::get('/get', [NominatorController::class, 'getOne'])->name('admin.nominators.get.one')->middleware(['auth']);
    Route::get('/approve', [NominatorController::class, 'approve'])->name('admin.nominators.approve.one')->middleware(['auth']);
    Route::get('/delete', [NominatorController::class, 'deleteOne'])->name('admin.nominators.delete.one')->middleware(['auth']);
});

Route::get('/vote', function () {
    return view('main');
});

Route::get('/verifyVoter', [ElectionController::class, 'verifyVoter']);
Route::get('/checkVoterVerification', [ElectionController::class, 'checkVoterVerification']);
Route::post('/enrollVote', [ElectionController::class, 'enrollVote']);
