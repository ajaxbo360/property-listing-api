<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// public routes
Route::post("/login", [AuthController::class, 'Login']);

Route::post("/register", [AuthController::class, 'Register']);
Route::get("/brokers", [AuthController::class, 'index']);
Route::get("/brokers/{broker}", [BrokersController::class, 'show']);

Route::get("/properties", [PropertiesController::class, 'index']);
Route::get("/properties/{property}", [PropertiesController::class, 'show']);




// private routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource("/brokers", BrokersController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/properties', PropertiesController::class)->only(['store', 'update', 'destroy']);


    Route::post("/logout", [AuthController::class, 'Logout']);
});
