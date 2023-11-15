<?php
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


// Route::get('/tes', function () {
//     return "hello";
// });
// create a route group with prefix and name
Route::group(["prefix"=> "/admin" ,'as' => 'admin.'], function () {
    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'postLogin'])->name('postLogin');
});
Route::group(["prefix"=> "/admin" ,'as' => 'admin.', 'middleware'=> ['admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});