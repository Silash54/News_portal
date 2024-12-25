<?php

use App\Http\Controllers\admin\AdvertiseController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    //for company
    Route::resource('company',CompanyController::class)->names('company');
    Route::resource('advertise',AdvertiseController::class)->names('advertise');
});

require __DIR__.'/auth.php';
