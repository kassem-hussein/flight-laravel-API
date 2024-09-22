<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments  = Payment::query();
        $start = request()->query("start-date",null);
        $end = request()->query("end-date",null);
        if($start != null){
            $payments->where('payment_date','>=',$start);
        }
        if($end !=null){
            $payments->where('payment_date','<=',$end);
        }
        $payments = $payments->paginate(5);
        return response()->json([
            "success"=>true,
            "data"=>$payments,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return response()->json([
            "success"=>true,
            "data"=>$payment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            "payment_method"=>"nullable|string",
            "payment_status"=>"nullable|string"
        ]);
        $payment->update($request->all());
        return response()->json([
            "success"=>true,
            "message"=>"payment updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json([
            "success"=>true,
            "message"=>"payment deleted successfully"
        ]);
    }
}
