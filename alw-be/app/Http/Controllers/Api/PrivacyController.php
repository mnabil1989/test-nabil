<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SiteSetting;

class PrivacyController extends Controller
{
    /**
     * get all the privacy
     *
     * @OA\Get(
     *     path="/api/privacy",
     *     tags={"Privacy Setting"},
     *     @OA\Response(
     *     response="200",
     *      description="get all the privacy")
     * )
     */
    function index()
    {
        $privacy = [
            'refund_cancellation_policy'    => setting('site.refund_cancellation_policy'),
            'refund_cancellation_policy_ar' => setting('site.refund_cancellation_policy_ar'),
            'delivery_shipment_policy'      => setting('site.delivery_shipment_policy'),
            'delivery_shipment_policy_ar'   => setting('site.delivery_shipment_policy_ar'),
            'privacy_policy'                => setting('site.privacy_policy'),
            'privacy_policy_ar'             => setting('site.privacy_policy_ar')
        ];

        return response()->json(compact(['privacy']), 200);
    }
}
