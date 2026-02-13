<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelAmenities;
use App\Models\HotelImages;
use App\Models\Hotels;
use App\Models\Reviews;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiHotels extends Controller
{
    // 🔹 GET ALL HOTELS (public)
    public function getAllHotels()
    {

        $hotels = Hotels::join('communes', 'communes.id_commune', '=', 'hotels.city_id')
            ->join('pays', 'pays.id_pays', '=', 'hotels.country_id')
            ->where('hotels.active', true)
            ->select(
                'hotels.id_hotel',
                'hotels.image',
                'hotels.name',
                'hotels.type',
                'hotels.short_description',
                'hotels.price_per_night',
                'hotels.currency',
                'hotels.rating',
                'hotels.reviews_count',
                'hotels.address',
                'hotels.latitude',
                'hotels.longitude',
                'communes.nom_commune as city',
                'pays.nom_pays as country'
            )
            ->orderBy('hotels.created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $hotels
        ]);
    }

    // 🔹 GET HOTEL BY ID
    public function getHotelById($id)
    {

        // =====================
        // 1️⃣ HÔTEL
        // =====================
        $hotel = Hotels::join('communes', 'communes.id_commune', '=', 'hotels.city_id')
            ->join('pays', 'pays.id_pays', '=', 'hotels.country_id')
            ->where('hotels.id_hotel', $id)
            ->select(
                'hotels.*',
                'communes.nom_commune as city',
                'pays.nom_pays as country'
            )
            ->first();

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hôtel introuvable'
            ], 404);
        }

        // =====================
        // 2️⃣ ROOMS
        // =====================
        $rooms = Rooms::where('hotel_id', $id)
            ->select(
                'id_room',
                'name',
                'bedrooms',
                'bathrooms',
                'living_rooms',
                'capacity',
                'price_per_night',
                'is_available'
            )
            ->get();

        // =====================
        // 3️⃣ IMAGES DES ROOMS
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

        // Regroupement images par room
        $imagesByRoom = $images->groupBy('room_id');

        // Injection images dans rooms
        $rooms = $rooms->map(function ($room) use ($imagesByRoom) {
            $room->images = $imagesByRoom[$room->id_room] ?? [];
            return $room;
        });

        // =====================
        // 4️⃣ AMENITIES
        // =====================
        $amenities = HotelAmenities::where('hotel_id', $id)
            ->where('available', true)
            ->select(
                'id_amenity',
                'name',
                'icon'
            )
            ->get();

        // =====================
        // 5️⃣ REVIEWS
        // =====================
        $reviews = Reviews::join('opasseurs', 'opasseurs.id_opasseur', '=', 'reviews.user_id')
            ->where('reviews.hotel_id', $id)
            ->select(
                'reviews.id_review',
                'reviews.rating',
                'reviews.comment',
                'reviews.created_at',
                'opasseurs.nom',
                'opasseurs.prenom'
            )
            ->orderBy('reviews.created_at', 'desc')
            ->get();

        // =====================
        // 6️⃣ RESPONSE
        // =====================
        return response()->json([
            'success' => true,
            'data' => [
                'hotel'     => $hotel,
                'rooms'     => $rooms,
                'amenities' => $amenities,
                'reviews'   => $reviews
            ]
        ]);
    }

    // 🔍 SEARCH HOTELS
    public function searchHotels(Request $request)
    {

        $query = Hotels::where('active', true);

        // 🔎 Filtres dynamiques
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('min_price')) {
            $query->where('price_per_night', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price_per_night', '<=', $request->max_price);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('keyword')) {
            $query->where('name', 'LIKE', '%' . $request->keyword . '%');
        }

        if ($request->filled('rating')) {
            $query->where('rating', '>=', $request->rating);
        }

        // 📦 Pagination
        $hotels = $query
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $hotels
        ]);
    }

    // 🏨 CREATE HOTEL (manager)
    public function createHotel(Request $request)
    {
        $timestamp = Carbon::now()->format('Ymd_His');

        $roles = [
            'libelle' => 'required',
            'description' => 'nullable',
            'prix' => 'required',
            'couleur' => 'required',
            'longueur' => 'required',
            'stock' => 'required',
            'categorie' => 'required',
            'image' => 'required',
        ];
        $customMessages = [
            'libelle.required' => "Veuillez saisir le nom du produit.",
            'prix.required' => "Veuillez saisir le prix du produit.",
            'couleur.required' => "Veuillez saisir la couleur du produit.",
            'longueur.required' => "Veuillez sélectionner la longueur du produit.",
            'stock.required' => "Veuillez saisir le stock du produit.",
            'categorie.required' => "Veuillez sélectionner la catégorie du produit.",
            'image.required' => "Veuillez choisir l'image du produit.",
        ];

        $validator = Validator::make($request->all(), $roles, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'message' => collect($validator->errors()->all())
            ], 422);
        }

        if ($request->file('image') !== null) {
            $diplome = $request->file('image');
            $diplomeName = 'hotels_' . $timestamp . '.' . $diplome->getClientOriginalExtension();
            $diplome->move(public_path('hotels'), $diplomeName);
            $diplomePath = url('admin/public/hotels/' . $diplomeName);
        }

        $categorie = new Hotels();
        $categorie->name = $request->libelle;
        $categorie->type = $request->type;
        $categorie->short_description = $request->short ?? "";
        $categorie->description_establishment = $request->moyen ?? "";
        $categorie->description_accommodation = $request->long ?? "";
        $categorie->country_id  = $request->pays;
        $categorie->city_id  = $request->commune;
        $categorie->address  = $request->adresse ?? "";
        $categorie->latitude  = $request->latitude ?? 0;
        $categorie->longitude  = $request->longitude ?? 0;
        $categorie->price_per_night  = $request->price;
        $categorie->currency  = "FCFA";
        $categorie->check_in_time  = $request->in;
        $categorie->check_out_time  = $request->out;
        $categorie->active  = true;
        $categorie->image_produit = $diplomePath;
        if ($categorie->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Hôtel créé',
            ]);
        } else {
            return response()->json([
                'message' => "Impossible de créer l'hôtel. Veuillez réessayer",
            ], 404);
        }
    }

    // ✏️ UPDATE HOTEL
    public function updateHotel(Request $request, $id)
    {
        $hotel = Hotels::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hôtel introuvable'], 404);
        }

        $hotel->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Hôtel mis à jour'
        ]);
    }

    // 🗑 DELETE HOTEL
    public function deleteHotel($id)
    {
        $hotel = Hotels::find($id);

        if (!$hotel) {
            return response()->json(['message' => 'Hôtel introuvable'], 404);
        }

        $hotel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hôtel supprimé'
        ]);
    }
}
