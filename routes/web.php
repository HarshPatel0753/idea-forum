<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('login',[AuthController::class,'showLogin'])->name('show.login');
Route::get('registration',[AuthController::class,'showRegistration'])->name('show.registration');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('registration',[AuthController::class,'registration'])->name('registration');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::prefix('idea')->as('idea.')->group(function() {
        Route::get('index',[IdeaController::class,'index'])->name('index');
        Route::get('form',[IdeaController::class,'form'])->name('form');
        Route::get('edit/{idea}',[IdeaController::class,'edit'])->name('edit');
        Route::post('create-or-update',[IdeaController::class,'createOrUpdate'])->name('create_or_update');
        Route::get('destroy/{idea}',[IdeaController::class,'destroy'])->name('destroy');
        Route::get('view/{idea}',[IdeaController::class,'view'])->name('view');
        Route::post('view/{idea}/like',[IdeaController::class,'like'])->name('like');
        Route::post('view/{idea}/comment',[IdeaController::class,'comment'])->name('comment');
    });
});
