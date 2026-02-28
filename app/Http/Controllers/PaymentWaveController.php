<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Reservations;
use App\Models\ReservationsHistoriques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentWaveController extends Controller
{
    /**
     * ✅ PAGE SUCCESS
     */
    public function success($id)
    {

        // ✅ Récupère l'objet complet, puis accède à l'attribut
        $payment = Payments::where('id_payment', $id)->first();

        if (!$payment) {
            return view('payment.error', ['message' => 'Paiement introuvable']);
        }

        $checkoutId = $payment->checkout_session_id; // ✅ string correcte

        // Vérification réelle chez Wave (source de vérité)
        $response = Http::withHeaders([
            'Authorization' => 'Bearer wave_ci_prod_W78vRFmw78kqn50m65BRZIzWUiY-kN_tJKkDWIqLTeM4xVvgn_ECUGdvg68-BisjULstegCZwAtmL2XlVHprKf8neCC2Dhdj8Q',
            'Content-Type'  => 'application/json',
        ])->get("https://api.wave.com/v1/checkout/sessions/$checkoutId");

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

        if ($payment && $payment->status !== 'success') {
            $payment->update([
                'status' => 'success',
                'transaction_id' => $session['transaction_id'],
            ]);

            $reservation = Reservations::find($payment->reservation_id);

            ReservationsHistoriques::create([
                'changed_by' => $reservation->user_id,
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
    public function error($id)
    {
        return view('payment.error', [
            'amount' => 0,
            'message' => 'Paiement annulé ou échoué',
            'payment_id' => $id,
        ]);
    }
}
