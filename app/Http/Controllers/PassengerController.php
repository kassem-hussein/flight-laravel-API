<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassengerRequest;
use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passengers =  Passenger::query()->paginate(5);
        return response()->json([
            "success"=>true,
            "data"=>$passengers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PassengerRequest $request)
    {
        Passenger::create($request->all());
        return response()->json([
            "success"=>true,
            "message"=>"Added Passenger successfully"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
        return response()->json([
            "success"=>true,
            "data"=>$passenger
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PassengerRequest $request, Passenger $passenger)
    {
        $passenger->update($request->all());
        return response()->json([
            "success"=>true,
            "message"=>"Updated Sucessfully"
        ],205);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $passenger)
    {
        $passenger->delete();
        return response()->json([
            "success"=>true,
            "message"=>"Deleted Passenger Successfully"
        ],204);
    }
}
