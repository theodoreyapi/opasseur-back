<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use App\Models\Mention;
use App\Models\Politique;
use Illuminate\Http\Request;

class ApiCondition extends Controller
{
    public function getMention()
    {
        return response()->json([
            'success'=>true,
            'data'=>Mention::latest()->first()
        ]);
    }

    public function getSecurity()
    {
        return response()->json([
            'success'=>true,
            'data'=>Politique::latest()->first()
        ]);
    }

    public function getCondition()
    {
        return response()->json([
            'success'=>true,
            'data'=>Condition::latest()->first()
        ]);
    }
}
