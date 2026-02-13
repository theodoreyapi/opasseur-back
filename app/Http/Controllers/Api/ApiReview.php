<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiReview extends Controller
{
    public function getReviewByHotel($hotel_id)
    {
        $reviews = Reviews::join('opasseurs', 'opasseurs.id_opasseur', '=', 'reviews.user_id')
            ->where('reviews.hotel_id', $hotel_id)
            ->select(
                'reviews.id_review',
                'reviews.rating',
                'reviews.comment',
                'reviews.created_at',
                'opasseurs.username_opasseur',
            )
            ->orderBy('reviews.created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'average_rating' => round($reviews->avg('rating'), 1),
            'total_reviews' => $reviews->count(),
            'data' => $reviews
        ]);
    }

    /**
     * ADD review
     */
    public function addReviewByHotel(Request $request, $hotel_id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:opasseurs,id_opasseur',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Vérifier si l'utilisateur a déjà noté l'hôtel
        $exists = Reviews::where('hotel_id', $hotel_id)
            ->where('user_id', $request->user_id)
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Vous avez déjà donné un avis pour cet hôtel'
            ], 422);
        }

        Reviews::insert([
            'hotel_id'  => $hotel_id,
            'user_id'   => $request->user_id,
            'rating'    => $request->rating,
            'comment'   => $request->comment,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Avis ajouté avec succès'
        ]);
    }

    /**
     * DELETE review (par user)
     */
    public function deleteReviewByHotel(Request $request, $hotel_id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:opasseurs,id_opasseur'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $deleted = Reviews::where('hotel_id', $hotel_id)
            ->where('user_id', $request->user_id)
            ->delete();

        if ($deleted === 0) {
            return response()->json([
                'success' => false,
                'message' => 'Avis introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Avis supprimé avec succès'
        ]);
    }
}
