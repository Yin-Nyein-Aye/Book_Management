<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get("/login",[AuthController::class,"login"]);
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');
Route::post("/logout",[AuthController::class,"logout"]);

Route::middleware('user')->group(function() {
    Route::resource('/book', BookController::class);
});
