<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\SellingPoint;

use App\Http\Resources\SellingpointResource;
use App\Http\Resources\SellingpointArResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SellingpointController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="selling_points",
     *     path="/api/selling_points"   
     */
    function selling_points(Request $request)
    {
        $sellingpoint = SellingPoint::all();
        if ($request->input('lang') == 'en') {
            $data = SellingpointResource::collection($sellingpoint);
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = SellingpointArResource::collection($sellingpoint);
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }


    }
          
}

