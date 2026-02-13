<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlans;
use Illuminate\Http\Request;

class ApiSubscriptionPlans extends Controller
{
    public function getSubscriptions()
    {
        return response()->json([
            'success'=>true,
            'data'=>SubscriptionPlans::where('active',true)->get()
        ]);
    }
}
