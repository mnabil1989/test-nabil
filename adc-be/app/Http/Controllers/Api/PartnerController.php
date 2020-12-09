<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Partner;

use App\Http\Resources\PartnerResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="partners",
     *     path="/api/partners"   
     */
    function partners(Request $request)
    {
        $data = Partner::OrderBy('order','asc')->get();

        $data = PartnerResource::collection($data);
        return response()->json(compact(['data']), 200);

       //print_r($partners);die;
    }
          
}

