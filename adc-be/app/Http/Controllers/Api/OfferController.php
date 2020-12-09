<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Offer;

use App\Http\Resources\TopofferResource;
use App\Http\Resources\TopofferArResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="partners",
     *     path="/api/partners"   
     */
    function offers(Request $request)
    {
        //$data = Offer::OrderBy('order','asc')->get();
        if(isset($_GET['page'])){        
            $pagination=9;
        }else{
            $pagination=1000;
        }

        $data = Offer::OrderBy("order","asc")->paginate($pagination)->appends('lang',$request->input('lang'));
        if ($request->input('lang') == 'en') {
            $data = TopofferResource::collection($data);
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = TopofferArResource::collection($data);
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }


    }
    function topoffers(Request $request)
    {
        $data = Offer::OrderBy('order','asc')->where(['top_offer'=>1])->get();
        if ($request->input('lang') == 'en') {
            $data = TopofferResource::collection($data);
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = TopofferArResource::collection($data);
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }


    }
    function banneroffer(Request $request)
    {
        $data = Offer::OrderBy('created_at','Desc')->where(['top_offer'=>1])->limit(1)->get();
        if ($request->input('lang') == 'en') {
            $data = TopofferResource::collection($data);
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = TopofferArResource::collection($data);
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }


    }
       
}

