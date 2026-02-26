<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Reservations;
use App\Models\ReservationsHistoriques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiPayments extends Controller
{
    // ▶️ INITIATE PAYMENT
    public function initiatePayment(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|integer',
            'deposit_amount' => 'required|numeric|min:100',
            'payment_method' => 'required|string',
        ]);

        $reservation = Reservations::findOrFail($request->reservation_id);

        try {
            $payload = [
                'amount' => (string) $request->deposit_amount,
                'currency' => 'XOF',
                'success_url' => 'https://opassage.sodalite-consulting.com/payment/wave/success',
                'error_url'   => 'https://opassage.sodalite-consulting.com/payment/wave/error',
                'client_reference' => (string) $reservation->id_reservation,
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer wave_ci_prod_W78vRFmw78kqn50m65BRZIzWUiY-kN_tJKkDWIqLTeM4xVvgn_ECUGdvg68-BisjULstegCZwAtmL2XlVHprKf8neCC2Dhdj8Q',
                'Content-Type'  => 'application/json',
            ])->post('https://api.wave.com/v1/checkout/sessions', $payload);

            if (!$response->successful()) {
                Log::error('Wave error', $response->json());

                return response()->json([
                    'success' => false,
                    'message' => 'Erreur Wave',
                    'details' => $response->json(),
                ], 500);
            }

            $data = $response->json();

            $payment = Payments::create([
                'reservation_id' => $reservation->id_reservation,
                'amount' => $request->deposit_amount,
                'remaining_amount' => max(0, $reservation->total_price - $request->deposit_amount),
                'method' => 'mobile_money',
                'payment_method' => 'wave',
                'status' => 'pending',
                'checkout_session_id' => $data['id'], // cos-xxxx
            ]);

            ReservationsHistoriques::create([
                'changed_by' => $reservation->user_id,
                'reservation_id' => $reservation->id_reservation,
                'old_status' => $reservation->status,
                'new_status' => 'deposit_pending',
                'note' => 'Acompte initié via Wave',
            ]);

            return response()->json([
                'success' => true,
                'payment_url' => $data['wave_launch_url'],
                'payment_id' => $payment->id_payment,
            ]);
        } catch (\Throwable $e) {
            Log::error('Wave Exception', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Erreur serveur',
            ], 500);
        }
    }

    // 🔁 CALLBACK
    public function handleWaveCallback(Request $request)
    {
        $transaction_id = $request->transaction_id;
        $status = $request->payment_status; // succeeded, processing, cancelled

        $payment = Payments::where('transaction_id', $transaction_id)->first();

        if (!$payment) {
            return response()->json(['success' => false, 'message' => 'Paiement introuvable'], 404);
        }

        $payment->update(['status' => $status]);

        $reservation = $payment->reservation;

        if ($status === 'succeeded') {
            // Mettre à jour la réservation si acompte complet
            if ($payment->remaining_amount <= 0) {
                $reservation->update(['status' => 'confirmed']);
            }

            // Historique
            ReservationsHistoriques::create([
                'changed_by' => 0,
                'reservation_id' => $reservation->id_reservation,
                'old_status' => $reservation->status,
                'new_status' => 'deposit_paid',
                'note' => 'Acompte payé via Wave',
            ]);
        }

        return response()->json(['success' => true]);
    }

    // 🔍 GET PAYMENT
    public function getPayment($id)
    {
        return response()->json([
            'success' => true,
            'data' => Payments::find($id)
        ]);
    }
}
