<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('login',[AuthController::class,'showLogin'])->name('show.login');
Route::get('registration',[AuthController::class,'showRegistration'])->name('show.registration');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('registration',[AuthController::class,'registration'])->name('registration');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

