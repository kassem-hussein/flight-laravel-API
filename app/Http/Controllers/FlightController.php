<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
use App\Models\Flight;


class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flight = Flight::query()->paginate(5);
        return response()->json([
            "success"=>true,
            "data"=>$flight
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlightRequest $request)
    {
        Flight::create($request->all());
        return response()->json([
            "success"=>true,
            "message"=>"Added Flight successfully"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        return response()->json([
            "success"=>true,
            "data"=>$flight
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlightRequest $request, Flight $flight)
    {
        $flight->update($request->all());
        return response()->json([
            "success"=>true,
            "message"=>"Flight Updated successfully"
        ],205);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return response()->json([
            "success"=>true,
            "message"=>"Flight Deleted successfully"
        ],204);

    }
}
