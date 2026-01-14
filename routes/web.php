<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;



// login routes
// name sets a alias
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');


Route::middleware('auth')->group(function () {
    // regular view
    Route::get('/', function () {
        return redirect()->route('jobs.index');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD for all models
    Route::resource('jobs', JobController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);

});

