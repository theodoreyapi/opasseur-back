<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use App\Models\HotelImages;
use App\Models\Hotels;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiApiFavorites extends Controller
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
        $favorites = Favorites::where('user_id', $user_id)
            ->select(
                'id_favorite',
                'user_id',
                'room_id',
                'hotel_id',
                'created_at'
            )
            ->get();

        if ($favorites->isEmpty()) {
            return response()->json([
                'success' => true,
                'data' => []
            ]);
        }


        $roomIds  = $favorites->pluck('room_id')->unique();
        $hotelIds = $favorites->pluck('hotel_id')->unique();

        $rooms = Rooms::whereIn('id_room', $roomIds)
            ->select(
                'id_room',
                'hotel_id',
                'name',
                'price_per_night',
                'capacity'
            )
            ->get()
            ->keyBy('id_room');

        $roomImages = HotelImages::whereIn('room_id', $roomIds)
            ->select(
                'id_image',
                'room_id',
                'image_url'
            )
            ->get()
            ->groupBy('room_id');

        $hotels = Hotels::whereIn('id_hotel', $hotelIds)
            ->select(
                'id_hotel',
                'name',
                'address',
                'city'
            )
            ->get()
            ->keyBy('id_hotel');

        $favorites = $favorites->map(function ($fav) use ($rooms, $roomImages, $hotels) {

            $room = $rooms[$fav->room_id] ?? null;

            if ($room) {
                $room->images = $roomImages[$room->id_room] ?? [];
            }

            $fav->room  = $room;
            $fav->hotel = $hotels[$fav->hotel_id] ?? null;

            return $fav;
        });

        return response()->json([
            'success' => true,
            'data' => $favorites
        ]);
    }

    public function removeFavorite($id)
    {
        Favorites::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Favori supprimé']);
    }
}
