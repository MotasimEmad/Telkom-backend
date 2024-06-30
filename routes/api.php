<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers\Api'], function () {

    // Services Routes
    Route::get("get_services", [App\Http\Controllers\Api\ServicesController::class, 'get_services']);
    Route::get("get_service_by_id", [App\Http\Controllers\Api\ServicesController::class, 'get_service_by_id']);
    Route::get("get_top_services", [App\Http\Controllers\Api\ServicesController::class, 'get_top_services']);

    // Settings Routes
    Route::get("settings", [App\Http\Controllers\Api\SettingController::class, 'settings']);

    // Contact Routes
    Route::post("send_message", [App\Http\Controllers\Api\MessageController::class, 'send_message']);
});
