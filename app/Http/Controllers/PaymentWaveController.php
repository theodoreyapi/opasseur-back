<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\ReservationsHistoriques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentWaveController extends Controller
{
    /**
     * ✅ PAGE SUCCESS
     */
    public function success(Request $request)
    {
        $checkoutId = $request->query('checkout_session_id');

        if (!$checkoutId) {
            return view('payment.error', [
                'message' => 'Session Wave invalide',
            ]);
        }

        // Vérification réelle chez Wave (source de vérité)
        $response = Http::withHeaders([
                'Authorization' => 'Bearer wave_ci_prod_W78vRFmw78kqn50m65BRZIzWUiY-kN_tJKkDWIqLTeM4xVvgn_ECUGdvg68-BisjULstegCZwAtmL2XlVHprKf8neCC2Dhdj8Q',
                'Content-Type'  => 'application/json',
            ])->get("https://api.wave.com/v1/checkout/sessions/{$checkoutId}");

        if (!$response->successful()) {
            return view('payment.error', [
                'message' => 'Impossible de vérifier le paiement',
            ]);
        }

        $session = $response->json();

        if ($session['payment_status'] !== 'succeeded') {
            return view('payment.error', [
                'message' => 'Paiement non confirmé',
            ]);
        }

        $payment = Payments::where('checkout_session_id', $checkoutId)->first();

        if ($payment && $payment->status !== 'paid') {
            $payment->update([
                'status' => 'paid',
                'transaction_id' => $session['transaction_id'],
            ]);

            ReservationsHistoriques::create([
                'changed_by' => 0,
                'reservation_id' => $payment->reservation_id,
                'old_status' => 'deposit_pending',
                'new_status' => 'deposit_paid',
                'note' => 'Paiement Wave confirmé',
            ]);
        }

        return view('payment.success', [
            'amount' => $session['amount'],
            'reference' => $session['transaction_id'],
            'business' => $session['business_name'],
        ]);
    }

    /**
     * ❌ PAGE ERROR
     */
    public function error()
    {
        return view('payment.error', [
            'amount' => 0,
            'message' => 'Paiement annulé ou échoué',
        ]);
    }
}
