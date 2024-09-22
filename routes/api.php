<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PaymentsController;
use App\Models\Payment;
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

Route::controller(BookingController::class)->prefix("/bookings")->group(function(){
    Route::get('/',"index");
    Route::post("/","store");
    Route::post("/{booking}/children","addChildren");
    Route::post("/{booking}/checkout","checkout");
    Route::get("/{booking}","show");
    Route::put("/{booking}","update");
    Route::delete("/{booking}","destroy");
});

Route::controller(PaymentsController::class)->prefix('/payments')->group(function(){
    Route::get('/','index');
    Route::put('/','update');
    Route::get('/{payment}',"show");
    Route::delete('/{payment}',"destroy");
});
