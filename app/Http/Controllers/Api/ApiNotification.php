<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class ApiNotification extends Controller
{
    public function getNotifications($user_id)
    {
        return response()->json([
            'success'=>true,
            'data'=>Notification::where('user_id',$user_id)->get()
        ]);
    }

    public function markAsRead(Request $request)
    {
        Notification::whereIn('id',$request->ids)
            ->update(['is_read'=>true]);

        return response()->json(['success'=>true]);
    }

    public function deleteNotification($id)
    {
        Notification::findOrFail($id)->delete();

        return response()->json(['success'=>true,'message'=>'Notification supprimée']);
    }
}
