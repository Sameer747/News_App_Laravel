<?php
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// create a route group with prefix and name
Route::group(["prefix" => "/admin", 'as' => 'admin.'], function () {
    /**
     * Basic login, logout routes
     */
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'postLogin'])->name('postLogin');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
    /**
     *  Reset password routes
     */
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AdminAuthenticationController::class, 'postForgotPassword'])->name('forgot-password.send');
    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'postResetPassword'])->name('reset-password.send');

});

Route::group(["prefix" => "/admin", 'as' => 'admin.', 'middleware' => ['admin']], function () {
    //dashboard routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // profile routes
    Route::put('profile-password-update/{id}', [ProfileController::class, 'passwordUpdate'])->name('profile-password.update'); //update password route
    Route::resource('profile', ProfileController::class);
    // languages route
    Route::resource('language', LanguageController::class);
    // category route
    Route::resource('category', CategoryController::class);
    // news route
    Route::resource('news', NewsController::class);

});