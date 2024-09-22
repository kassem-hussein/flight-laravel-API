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
        $flights = Flight::query();
        $departure_date = request()->query("departure-date",null);
        $departure_airport = request()->query("departure-airport",null);
        $arrival_airport = request()->query("arrival-airport",null);

        if($departure_date){
             $flights->where('departure_date',$departure_date);
        }
        if($departure_airport && $arrival_airport){
            $flights->where("departure_airport",$departure_airport)
            ->where("arrival_airport",$arrival_airport);
        }
        $flights = $flights->paginate(5);
        return response()->json([
            "success"=>true,
            "data"=>$flights,
            "dep"=>$departure_airport,
            "to"=>$arrival_airport
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
