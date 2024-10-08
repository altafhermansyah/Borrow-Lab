<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ItemCatController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryStController;
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
    Route::resource('loans', \App\Http\Controllers\LoanController::class);
    Route::resource('itemCat', \App\Http\Controllers\ItemCatController::class);
    Route::resource('borrow', \App\Http\Controllers\BorrowController::class);
    Route::resource('return', \App\Http\Controllers\ReturnController::class);
    Route::resource('studentHistory', \App\Http\Controllers\HistoryStController::class);
});
