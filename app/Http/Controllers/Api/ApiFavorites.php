<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use App\Models\HotelAmenities;
use App\Models\HotelImages;
use App\Models\HotelPricing;
use App\Models\Hotels;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiFavorites extends Controller
{
    public function addFavorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'room_id' => 'required',
            'hotel_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json(['message' => $validator->errors()], 422);

        $exists = Favorites::where($request->only('user_id', 'room_id'))->exists();
        if ($exists) {
            return response()->json(['message' => 'Déjà en favoris'], 422);
        }

        Favorites::create($request->all());

        return response()->json(['success' => true, 'message' => 'Ajouté aux favoris']);
    }

    public function getFavorites($user_id)
    {
        $rooms = Rooms::join('favorites', 'favorites.room_id', '=', 'rooms.id_room')
            ->join('hotels', 'hotels.id_hotel', '=', 'rooms.hotel_id')
            ->where('favorites.user_id', $user_id)
            ->select(
                // =====================
                // FAVORITES
                // =====================
                'favorites.id_favorite',
                'favorites.created_at as favorited_at',

                // =====================
                // ROOMS
                // =====================
                'rooms.id_room',
                'rooms.name',
                'rooms.bedrooms',
                'rooms.bathrooms',
                'rooms.living_rooms',
                'rooms.capacity',
                'rooms.price_per_night',
                'rooms.is_available',

                // =====================
                // HOTELS
                // =====================
                'hotels.id_hotel',
                'hotels.type as hotel_type',
                'hotels.short_description as desc_courte',
                'hotels.description_establishment as desc_etabli',
                'hotels.description_accommodation as desc_heberge',
                'hotels.latitude',
                'hotels.longitude',
                'hotels.currency as monnaie',
                'hotels.check_in_time as hotel_in',
                'hotels.check_out_time as hotel_out',
                'hotels.free_cancellation_hours as free_cancel',
                'hotels.reservations_count as nbre_reservation',
                'hotels.rating',
                'hotels.reviews_count as review',
                'hotels.name as hotel_name',
                'hotels.address as hotel_address'
            )
            ->paginate(10);

        $rooms->getCollection()->transform(function ($room) {

            // =====================
            // Images de la room
            // =====================
            $room->images = HotelImages::where('room_id', $room->id_room)
                ->select('id_image', 'image_path', 'type', 'is_main')
                ->get();

            // =====================
            // Tarifs de la room
            // =====================
            $room->pricings = HotelPricing::where('room_id', $room->id_room)
                ->select('id_pricing', 'label', 'nights', 'price')
                ->get();

            // =====================
            // Amenities de l’hôtel
            // =====================
            $room->amenities = HotelAmenities::where('hotel_id', $room->id_hotel)
                ->where('available', true)
                ->select(
                    'id_amenity',
                    'name',
                    'icon',
                    'available'
                )
                ->get();

            return $room;
        });

        return response()->json([
            'success' => true,
            'data' => $rooms
        ]);
    }

    public function removeFavorite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $favorite = Favorites::where('user_id', $request->user_id)
            ->where('room_id', $request->room_id)
            ->first();

        if (!$favorite) {
            return response()->json([
                'success' => false,
                'message' => 'Favori introuvable'
            ], 404);
        }

        $favorite->delete();

        return response()->json([
            'success' => true,
            'message' => 'Favori supprimé'
        ]);
    }
}
