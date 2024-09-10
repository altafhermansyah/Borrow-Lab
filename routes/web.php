<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/tes', function () {
    return view('test.index');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('items', \App\Http\Controllers\ItemController::class);
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('borrow', \App\Http\Controllers\BorrowController::class);
});
