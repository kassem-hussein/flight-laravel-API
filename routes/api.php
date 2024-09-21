<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(FlightController::class)->prefix("/flights")->group(function(){
    Route::get('/',"index");
    Route::post("/","store");
    Route::get("/{flight}","show");
    Route::put("/{flight}","update");
    Route::delete("/{flight}","destroy");
});

Route::controller(PassengerController::class)->prefix("/passengers")->group(function(){
    Route::get('/',"index");
    Route::post("/","store");
    Route::get("/{passenger}","show");
    Route::put("/{passenger}","update");
    Route::delete("/{passenger}","destroy");
});

