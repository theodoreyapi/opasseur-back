<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPayments;
use App\Models\UserSubscriptions;
use Illuminate\Http\Request;

class ApiSubscriptionPayments extends Controller
{
    public function initiatePayment(Request $request)
    {
        $sub = UserSubscriptions::find($request->user_subscription_id);
        if (!$sub) return response()->json(['message'=>'Introuvable'],404);

        $payment = SubscriptionPayments::create([
            'user_subscription_id'=>$sub->id_user_subscription,
            'amount'=>$sub->plan->price,
            'payment_method'=>$request->payment_method,
            'status'=>'pending'
        ]);

        return response()->json(['success'=>true,'payment_id'=>$payment->id_subscription_payment]);
    }

    public function handlePaymentCallback(Request $request)
    {
        $payment = SubscriptionPayments::where('transaction_id',$request->transaction_id)->first();
        if (!$payment) return response()->json(['message'=>'Paiement introuvable'],404);

        $payment->update(['status'=>$request->status]);

        return response()->json(['success'=>true]);
    }

    public function getPaymentHistory($user_id)
    {
        return response()->json([
            'success'=>true,
            'data'=>SubscriptionPayments::whereHas('userSubscription',
                fn($q)=>$q->where('user_id',$user_id)
            )->get()
        ]);
    }
}
