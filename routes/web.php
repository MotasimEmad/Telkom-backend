<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('dashboard', [App\Http\Controllers\Dashboard\HomeController::class, 'dashboard'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    // Services Routes
    Route::resource('services', App\Http\Controllers\Dashboard\ServicesController::class);

    // Setting Routes
    Route::resource('settings', App\Http\Controllers\Dashboard\SettingController::class);
});

require __DIR__ . '/auth.php';
