<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlans;
use App\Models\UserSubscriptions;
use Illuminate\Http\Request;

class ApiUserSubscriptions extends Controller
{
     public function subscribe(Request $request)
    {
        $plan = SubscriptionPlans::find($request->subscription_plan_id);
        if (!$plan) return response()->json(['message'=>'Plan introuvable'],404);

        $start = now();
        $end = $plan->duration_type === 'monthly'
            ? $start->copy()->addMonth()
            : $start->copy()->addYear();

        $subscription = UserSubscriptions::create([
            'user_id'=>$request->user_id,
            'subscription_plan_id'=>$plan->id_subscription_plan,
            'start_date'=>$start,
            'end_date'=>$end,
            'status'=>'active',
            'auto_renew'=>$request->auto_renew ?? false
        ]);

        return response()->json(['success'=>true,'data'=>$subscription]);
    }

    public function getMySubscription($user_id)
    {
        return response()->json([
            'success'=>true,
            'data'=>UserSubscriptions::with('plan')
                ->where('user_id',$user_id)
                ->where('status','active')
                ->first()
        ]);
    }

    public function cancelSubscription(Request $request)
    {
        $sub = UserSubscriptions::find($request->user_subscription_id);
        if (!$sub) return response()->json(['message'=>'Introuvable'],404);

        $sub->update(['status'=>'canceled','auto_renew'=>false]);

        return response()->json(['success'=>true,'message'=>'Abonnement annulé']);
    }
}
