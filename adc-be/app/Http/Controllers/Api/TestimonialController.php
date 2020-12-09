<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Testimonial;

use App\Http\Resources\TestimonialResource;
use App\Http\Resources\TestimonialArResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="testimonials",
     *     path="/api/testimonials"   
     */
    function testimonials(Request $request)
    {
        $data = Testimonial::OrderBy('order','asc')->with('translations')->get();

        
        $data = TestimonialResource::collection($data);
        if($request->input('lang') == 'en'){
            $data = TestimonialResource::collection($data);
            return response()->json(compact(['data']), 200);
        }elseif ($request->input('lang') == 'ar'){
            $data = TestimonialArResource::collection($data);
            return response()->json(compact(['data']), 200);
        }else{
            return response()->json("please enter language you want", 200);
        }
    }
          
}