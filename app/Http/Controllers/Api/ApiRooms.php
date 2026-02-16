<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelImages;
use App\Models\HotelPricing;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiRooms extends Controller
{
    // 🔹 GET ROOMS OF HOTEL
    public function getHotelRooms($hotel_id)
    {
        // =====================
        // 1️⃣ ROOMS DISPONIBLES
        // =====================
        $rooms = Rooms::where('hotel_id', $hotel_id)
            ->where('is_available', true)
            ->select(
                'id_room',
                'hotel_id',
                'name',
                'bedrooms',
                'bathrooms',
                'living_rooms',
                'capacity',
                'price_per_night',
                'is_available'
            )
            ->get();

        if ($rooms->isEmpty()) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }

        // =====================
        // 2️⃣ IMAGES DES ROOMS
        // =====================
        $roomIds = $rooms->pluck('id_room');

        $images = HotelImages::whereIn('room_id', $roomIds)
            ->select(
                'id_image',
                'room_id',
                'image_path',
                'type',
                'is_main'
            )
            ->get();

        // Regrouper images par room
        $imagesByRoom = $images->groupBy('room_id');

        // =====================
        // 3️⃣ INJECTION IMAGES DANS ROOMS
        // =====================
        $rooms = $rooms->map(function ($room) use ($imagesByRoom) {
            $room->images = $imagesByRoom[$room->id_room] ?? [];
            return $room;
        });

        // =====================
        // 4️⃣ RESPONSE
        // =====================
        return response()->json([
            'success' => true,
            'data' => $rooms
        ]);
    }

    // 🔹 GET ROOM
    public function getRoom($room_id)
    {
        // =====================
        // 1️⃣ ROOM
        // =====================
        $room = Rooms::where('id_room', $room_id)
            ->select(
                'id_room',
                'hotel_id',
                'name',
                'bedrooms',
                'bathrooms',
                'living_rooms',
                'capacity',
                'price_per_night',
                'is_available',
                'created_at'
            )
            ->first();

        if (!$room) {
            return response()->json([
                'success' => false,
                'message' => 'Chambre introuvable'
            ], 404);
        }

        // =====================
        // 2️⃣ IMAGES
        // =====================
        $images = HotelImages::where('room_id', $room_id)
            ->select(
                'id_image',
                'image_path',
                'type',
                'is_main'
            )
            ->get();

        // =====================
        // 3️⃣ PRICINGS
        // =====================
        $pricings = HotelPricing::where('room_id', $room_id)
            ->select(
                'id_pricing',
                'label',
                'nights',
                'price'
            )
            ->orderBy('nights')
            ->get();

        // =====================
        // 4️⃣ INJECTION
        // =====================
        $room->images = $images;
        $room->pricings = $pricings;

        // =====================
        // 5️⃣ RESPONSE
        // =====================
        return response()->json([
            'success' => true,
            'data' => $room
        ]);
    }

    // 🔹 GET ALL ROOMS
    public function getAllRooms()
    {
        $rooms = Rooms::join('hotels', 'hotels.id_hotel', '=', 'rooms.hotel_id')
            ->select(
                'rooms.id_room',
                'rooms.name',
                'rooms.bedrooms',
                'rooms.bathrooms',
                'rooms.living_rooms',
                'rooms.capacity',
                'rooms.price_per_night',
                'rooms.is_available',
                'hotels.id_hotel',
                'hotels.name as hotel_name',
                'hotels.address as hotel_address',
                'hotels.phone as hotel_phone',
                'hotels.rating as hotel_rating'
            )
            ->paginate(10);

        $rooms->getCollection()->transform(function ($room) {

            // Images de la room
            $room->images = HotelImages::where('room_id', $room->id_room)
                ->select('id_image', 'image_path', 'type', 'is_main')
                ->get();

            // Tarifs de la room
            $room->pricings = HotelPricing::where('room_id', $room->id_room)
                ->select('id_pricing', 'label', 'nights', 'price')
                ->get();

            return $room;
        });

        return response()->json([
            'success' => true,
            'data' => $rooms
        ]);
    }

    // 🛏 CREATE ROOM
    public function createRoom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required',
            'name' => 'required',
            'price_per_night' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $room = Rooms::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Chambre créée',
            'data' => $room
        ]);
    }

    // ✏️ UPDATE ROOM
    public function updateRoom(Request $request, $room_id)
    {
        $room = Rooms::find($room_id);

        if (!$room) {
            return response()->json(['message' => 'Chambre introuvable'], 404);
        }

        $room->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Chambre mise à jour'
        ]);
    }

    // 🔄 UPDATE AVAILABILITY
    public function updateRoomAvailability(Request $request, $room_id)
    {
        $room = Rooms::find($room_id);

        if (!$room) {
            return response()->json(['message' => 'Chambre introuvable'], 404);
        }

        $room->update([
            'is_available' => $request->is_available
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Disponibilité mise à jour'
        ]);
    }

    // 🗑 DELETE ROOM
    public function deleteRoom($room_id)
    {
        $room = Rooms::find($room_id);

        if (!$room) {
            return response()->json(['message' => 'Chambre introuvable'], 404);
        }

        $room->delete();

        return response()->json([
            'success' => true,
            'message' => 'Chambre supprimée'
        ]);
    }
}
