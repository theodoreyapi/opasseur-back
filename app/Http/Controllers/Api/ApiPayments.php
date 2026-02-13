<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Reservations;
use Illuminate\Http\Request;

class ApiPayments extends Controller
{
    // ▶️ INITIATE PAYMENT
    public function initiatePayment(Request $request)
    {
        $reservation = Reservations::find($request->reservation_id);

        if (!$reservation) {
            return response()->json(['message'=>'Réservation introuvable'],404);
        }

        $payment = Payments::create([
            'reservation_id'=>$reservation->id_reservation,
            'amount'=>$reservation->total_price,
            'method'=>'mobile_money',
            'payment_method'=>$request->payment_method,
            'status'=>'pending'
        ]);

        return response()->json([
            'success'=>true,
            'payment_id'=>$payment->id_payment
        ]);
    }

    // 🔁 CALLBACK
    public function handlePaymentCallback(Request $request)
    {
        $payment = Payments::where('transaction_id',$request->transaction_id)->first();

        if (!$payment) {
            return response()->json(['message'=>'Paiement introuvable'],404);
        }

        $payment->update(['status'=>$request->status]);

        if ($request->status === 'success') {
            $payment->reservation->update(['status'=>'confirmed']);
        }

        return response()->json(['success'=>true]);
    }

    // 🔍 GET PAYMENT
    public function getPayment($id)
    {
        return response()->json([
            'success'=>true,
            'data'=>Payments::find($id)
        ]);
    }
}
