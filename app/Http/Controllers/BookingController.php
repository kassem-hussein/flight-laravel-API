<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::query();
        $flight = request()->query("flight",null);
        if($flight){
            $bookings->where("flight_id",$flight);
        }
        $bookings = $bookings->paginate(5);
        return response()->json([
            "success"=>true,
            "data"=>$bookings
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        Booking::create([
            "flight_id"=>$request->flight_id,
            "passenger_id"=>$request->passenger_id,
            "booking_date"=> now()->format('Y-m-d'),
            "status"=>"started"
        ]);
        return response()->json([
            "success"=>true,
            "message"=>"Added Booking successfully"
        ]);
    }

    public function addChildren(Request $request,Booking $booking){
        $request->validate([
            "children"=>"required|array"
        ]);
        $booking->passengers()->attach($request->children);
        return response()->json([
            "success"=>true,
            "message"=>"Added Passenger children successfully"
        ],201);
    }

    public function checkout(Booking $booking){
        $total = $booking->flight->price * ($booking->passengers()->count() + 1);

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $charge = Charge::create([
            'amount' => ($total * 100), // Amount in cents
            'currency' => 'usd',
            'description' => 'Test charge',
            'source' => "tok_visa",
        ]);
        if($charge->status == "succeeded"){
            Payment::create([
                "booking_id"=>$booking->id,
                "payment_method"=>"visa_card",
                "payment_status"=>"done",
                "payment_date"=>now()->format("Y-m-d"),
                "amount"=>$total
            ]);
            $booking->update([
                "status"=>"confirmed"
            ]);
            return response()->json([
                "success"=>true,
                "message"=>"Payment for booking done !"
            ]);
        }else{
            return response()->json([
                "success"=>false,
                "message"=>"Payment Failed"
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return response()->json([
            "success"=>true,
            "data"=>$booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            "status"=>"required|string"
        ]);
        $booking->update([
            "status"=>$request->status
        ]);
        return response()->json([
            "success"=>true,
            "message"=>"Updated Booking successfully"
        ],205);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json([
            "success"=>true,
            "message"=>"Deleted Booking successfully"
        ],204);
    }
}
