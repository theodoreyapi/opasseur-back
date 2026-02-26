<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelImages;
use App\Models\Hotels;
use App\Models\Payments;
use App\Models\PromosCodes;
use App\Models\Reservations;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiReservations extends Controller
{
    // ➕ CREATE RESERVATION
    public function createReservation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'room_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'promo_code' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $room = Rooms::find($request->room_id);
        if (!$room || !$room->is_available) {
            return response()->json(['message' => 'Chambre indisponible'], 422);
        }

        $days = now()->parse($request->start_date)
            ->diffInDays($request->end_date);

        $total = $days * $room->price_per_night;
        $promoId = null;

        // 🎁 Promo
        if ($request->promo_code) {
            $promo = PromosCodes::where('code', $request->promo_code)->first();
            if ($promo && $promo->isValid()) {
                if ($promo->discount_type === 'percentage') {
                    $total -= ($total * $promo->discount_value / 100);
                } else {
                    $total -= $promo->discount_value;
                }
                $promo->increment('used_count');
                $promoId = $promo->id_promo_code;
            }
        }

        $reservation = Reservations::create([
            'user_id' => $request->user_id,
            'room_id' => $room->id_room,
            'promo_code_id' => $promoId,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => max($total, 0),
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'data' => $reservation
        ]);
    }

    // 🔍 GET RESERVATION
    public function getReservation($id)
    {
        // =====================
        // 1️⃣ RÉSERVATION
        // =====================
        $reservation = Reservations::where('user_id', $id)
            ->select(
                'id_reservation',
                'user_id',
                'room_id',
                'start_date',
                'end_date',
                'total_price',
                'status',
                'created_at',
                'updated_at',
            )
            ->get();

        if ($reservation->isEmpty()) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }

        $result = $reservation->map(function ($resa) {

            // =====================
            // 2️⃣ ROOM + HOTEL + IMAGE
            // =====================
            $room = Rooms::where('id_room', $resa->room_id)
                ->select('id_room', 'hotel_id', 'name', 'capacity', 'price_per_night')
                ->first();

            if ($room) {
                // Infos hôtel
                $hotel = Hotels::where('id_hotel', $room->hotel_id)
                    ->select(
                        'id_hotel',
                        'name as hotel_name',
                        'type',
                        'address',
                        'rating',
                        'image',
                        'latitude',
                        'longitude',
                        'price_per_night',
                        'currency',
                        'check_in_time',
                        'check_out_time',
                        'free_cancellation_hours',
                    )
                    ->first();

                // Première image de la room
                $roomImage = HotelImages::where('room_id', $room->id_room)
                    ->select('image_path', 'type', 'is_main')
                    ->orderByDesc('is_main') // priorité à l'image principale
                    ->first();

                $room->hotel = $hotel;
                $room->first_image = $roomImage ? $roomImage->image_path : null;
            }

            // =====================
            // 3️⃣ PAYMENTS
            // =====================
            $payments = Payments::where('reservation_id', $resa->id_reservation)
                ->select('id_payment', 'amount', 'method', 'payment_method', 'status', 'transaction_id', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();

            // =====================
            // 4️⃣ PROMO CODE
            // =====================
            $promo = null;
            if ($resa->promo_code_id) {
                $promo = PromosCodes::where('id_promo_code', $resa->promo_code_id)
                    ->select('code', 'discount_type', 'discount_value')
                    ->first();
            }

            // =====================
            // 5️⃣ INJECTION
            // =====================
            $resa->room     = $room;
            $resa->payments = $payments;
            $resa->promo    = $promo;

            return $resa;
        });

        return response()->json([
            'success' => true,
            'data'    => $result->values()
        ]);
    }

    // 🔎 SEARCH RESERVATIONS
    public function searchReservations(Request $request)
    {
        $query = Reservations::query();

        if ($request->user_id)
            $query->where('user_id', $request->user_id);

        if ($request->status)
            $query->where('status', $request->status);

        return response()->json([
            'success' => true,
            'data' => $query->paginate(10)
        ]);
    }

    // ❌ DELETE (soft logique côté client)
    public function deleteReservation($id)
    {
        $reservation = Reservations::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Introuvable'], 404);
        }

        $reservation->update(['status' => 'canceled']);

        return response()->json([
            'success' => true,
            'message' => 'Réservation supprimée côté client'
        ]);
    }

    // ✅ CONFIRM (manager)
    public function confirmReservation($id)
    {
        $reservation = Reservations::find($id);
        if (!$reservation) {
            return response()->json(['message' => 'Introuvable'], 404);
        }

        $reservation->update(['status' => 'confirmed']);

        return response()->json([
            'success' => true,
            'message' => 'Réservation confirmée'
        ]);
    }

    // 🚫 CANCEL + NOUVEAU PROMO
    public function cancelReservation($id)
    {
        $reservation = Reservations::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Introuvable'], 404);
        }

        $reservation->update(['status' => 'canceled']);

        // 🎁 Nouveau code promo
        $newPromo = PromosCodes::create([
            'code' => strtoupper(Str::random(8)),
            'discount_type' => 'fixed',
            'discount_value' => $reservation->total_price * 0.1,
            'usage_limit' => 1,
            'active' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Réservation annulée',
            'new_promo' => $newPromo->code
        ]);
    }

    // 📋 Manager - room reservations
    public function getRoomReservations($id)
    {
        return response()->json([
            'success' => true,
            'data' => Reservations::where('room_id', $id)->get()
        ]);
    }
}
