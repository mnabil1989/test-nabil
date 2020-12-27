<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Slider;

use App\Http\Resources\SliderResource;
use App\Http\Resources\SliderArResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SlidersController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="partners",
     *     path="/api/partners"   
     */
    function sliders(Request $request)
    {

        $data = Slider::where(['status'=>1])->OrderBy('order','asc')->get();
        if(empty($request->input('lang'))) {
            return response()->json("please enter language you want", 200);

        }

        if ($request->input('lang') == 'en') {
            $data = SliderResource::collection($data);
            return response()->json(compact(['data']), 200);
        } else{
            $data = SliderArResource::collection($data);
            return response()->json(compact(['data']), 200);
        }

        return response()->json(compact(['data']), 200);
       
    }
          
}

