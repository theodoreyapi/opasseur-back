<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PromosCodes;
use Illuminate\Http\Request;

class ApiPromosCodes extends Controller
{
    public function getPromo($code)
    {
        $promo = PromosCodes::where('code', $code)
            ->where('active', true)
            ->first();

        if (!$promo || !$promo->isValid()) {
            return response()->json([
                'success' => false,
                'message' => 'Code promo invalide'
            ], 422);
        }

        return response()->json([
            'success' => true,
            'data' => $promo
        ]);
    }
}
