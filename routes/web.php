<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('jobs.index');
});

// Resource routes with implicit model binding
Route::resource('jobs', JobController::class);
Route::resource('companies', CompanyController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
