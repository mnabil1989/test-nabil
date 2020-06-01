<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Appointment as Model;
use App\Appointment;
use App\AppointmentNote;
use App\AppointmentTransit;
use App\Category;
use App\Doctor;
use App\Payment;
use App\Workinghour;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource as MainResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    function AppointmentTransit(Request $request)
    {

        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        $validator = Validator::make($request->all(), [
            'start'    => 'required|date',
            'slug'     => 'required',
            'comments' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $slug = $request->get('slug');
        $doctor = Doctor::where('status', 1)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->first();
        if (!$doctor) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $order_id = $this->generateRandomString() . strtotime(now());
        $appointment_transit = AppointmentTransit::create([
            'doctor_id' => $doctor->id,
            'user_id' => $user->id,
            'start' => $request->get('start'),
            'duration' => $doctor->duration,
            'comments' => $request->get('comments'),
            'confirmed' => 0,
            'payment_confirmed' => 0,
            'order_id' => $order_id,
            'currency' => $doctor->currency,
        ]);

        // upload attachments into the server and save the attachments path in the cache
//        if($request->attachments)
//        {
//            $validator = Validator::make($request->all(), [
//                'attachments'   => 'array',
//                'attachments.*' => 'required|file|max:1024',
//            ]);
//            if ($validator->fails()) {
//                return response()->json($validator->errors(), 400);
//            }
//
//            $attachments_path = [];
//            foreach ($request->file('attachments') as $attachment)
//            {
//                $filename           = time() . '.' . $attachment->getClientOriginalExtension();
//                $date               = date('FY');
//                $path               = $attachment->move(storage_path('app/public/appointments/' . $date), $filename);
//                $attachments_path[] = '/appointments/' . $date . '/' . $filename;
//            }
//            cache()->put("appointment_transit-{$appointment_transit->id}-attachments_path", $attachments_path);
//        }


        // save the attachments path in the cache (temporary)
        if($request->attachments)
        {
            $validator = Validator::make($request->all(), [
                'attachments'   => 'array',
                'attachments.*' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $attachments_path = [];
            foreach ($request->attachments as $attachment)
            {
                $attachments_path[] = $attachment;
            }
            cache()->put("appointment_transit-{$appointment_transit->id}-attachments_path", $attachments_path);
        }
        return response()->json(['order_id' => $order_id, 'session_id' => $this->getSessionId($order_id)], 200);
    }

    function generateRandomString($length = 5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function AppointmentTransit_Confirm(Request $request)
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $appointment_transit = AppointmentTransit::where('order_id', $request->get('order_id'))->first();
        if ($appointment_transit == null) {
            return response()->json('order_id not match any of our code', 400);
        }
        if ($appointment_transit->user_id != $user->id) {
            return response()->json('user_id not match any of our code', 400);
        }
        $orderid = $appointment_transit->order_id;
        $merchantId = env('merchantId');
        $merchantName = env('merchantName');
        $merchantPassword = env('merchantPassword');
        $url = env('merchantUrl') . "/merchant/$merchantId/order/$orderid";
        $client = new \GuzzleHttp\Client();//GuzzleHttp\Client
        $result = $client->get($url, [
            'auth' => [$merchantName, $merchantPassword]
        ]);
        $response = json_decode($result->getBody(), true);
        Log::debug($response);
        $price = $response['amount'];
        $currency = $response['currency'];
        $orderId = $response['id'];
        $result = $response['result'];
        $authorizationCode = $response['transaction'][0]['transaction']['authorizationCode'];
        $receipt = $response['transaction'][0]['transaction']['receipt'];
        $terminal = $response['transaction'][0]['transaction']['terminal'];

        if (strtolower($result) == 'failure') {
            event(new \App\Events\PaymentFailedEvent($appointment_transit));
            return response()->json(['data' => 'payment has failed, kindly check with your bank', 'error' => 5101], 401);
        }
        if (strtolower($result) == 'pending') {
            event(new \App\Events\PaymentPendingEvent($appointment_transit));
            return response()->json(['data' => 'payment is still pending, kindly check with your bank', 'error' => 5102], 401);
        }

        $doctor = Doctor::where('id', $appointment_transit->doctor_id)->first();
        if ($appointment_transit->order_id != $orderId) {
            return response()->json(['data' => 'Order Id  not equal our Data', 'error' => 5005], 401);
        }
        if (intval($doctor->price) != $price) {
            return response()->json(['data' => 'price is lower than the doctor price', 'error' => 5006], 402);
        }

        $appointment = Appointment::create([
            'doctor_id' => $appointment_transit->doctor_id,
            'user_id' => $appointment_transit->user_id,
            'start' => $appointment_transit->start,
            'duration' => $appointment_transit->duration,
            'comments' => $appointment_transit->comments,
            'confirmed' => 0,
            'payment_confirmed' => 0
        ]);
        $appointment->update([
            'payment_confirmed' => 1
        ]);
        $appointment->save();

        // save the attachments path into the DB and remove the cached attachments path
        if(cache()->has("appointment_transit-{$appointment_transit->id}-attachments_path"))
        {
            $attachments = cache()->get("appointment_transit-{$appointment_transit->id}-attachments_path");
            foreach($attachments as $key => $attachment)
            {
                \App\Attachment::create([
                    'appointment_id' => $appointment->id,
                    'attachment'     => $attachment
                ]);
            }
            cache()->forget("appointment_transit-{$appointment_transit->id}-attachments_path");
        }

        $appointment_transit->update([
            'status' => 'SUCCESS',
            'appointment_id' => $appointment->id,
        ]);
        Payment::create([
            'order_id' => $appointment_transit->order_id,
            'appointment_id' => $appointment->id,
            'user_id' => $appointment->user_id,
            'amount_invoiced' => $doctor->price,
            'amount_charged' => $price,
            'authorizationCode' => $authorizationCode,
            'receipt' => $receipt,
            'terminal' => $terminal,
            'currency' => $currency,
        ]);
        return response()->json(['Success'], 200);
    }

    function AppointmentTransit_Free(Request $request)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $appointment_transit = AppointmentTransit::where('order_id', $request->get('order_id'))->first();
        if ($appointment_transit == null) {
            return response()->json('order_id not match any of our code', 400);
        }
        if ($appointment_transit->user_id != $user->id) {
            return response()->json('user_id not match any of our code', 400);
        }
        $appointment = Appointment::create([
            'doctor_id' => $appointment_transit->doctor_id,
            'user_id' => $appointment_transit->user_id,
            'start' => $appointment_transit->start,
            'duration' => $appointment_transit->duration,
            'comments' => $appointment_transit->comments,
            'confirmed' => 0,
            'payment_confirmed' => 0
        ]);
        $appointment->save();
        // save the attachments path into the DB and remove the cached attachments path
        if(cache()->has("appointment_transit-{$appointment_transit->id}-attachments_path"))
        {
            $attachments = cache()->get("appointment_transit-{$appointment_transit->id}-attachments_path");
            foreach($attachments as $key => $attachment)
            {
                \App\Attachment::create([
                    'appointment_id' => $appointment->id,
                    'attachment'     => $attachment
                ]);
            }
            cache()->forget("appointment_transit-{$appointment_transit->id}-attachments_path");
        }
        $appointment_transit->update([
            'status' => 'SUCCESS',
            'appointment_id' => $appointment->id,
        ]);
        return response()->json(['Success'], 200);
    }

    function getSessionId($order_id)
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
//        $validator = Validator::make($request->all(), [
//            'order_id' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return response()->json($validator->errors(), 400);
//        }
        $appointment_transit = AppointmentTransit::where('order_id', $order_id)->first();
        if ($appointment_transit == null) {
            return response()->json('order_id not match any of our code', 400);
        }
        if ($appointment_transit->user_id != $user->id) {
            return response()->json('user_id not match any of our code', 400);
        }
        $orderid = $appointment_transit->order_id;
        $merchantId = env('merchantId');
        $merchantName = env('merchantName');
        $merchantPassword = env('merchantPassword');
        $url = env('merchantUrl') . "/merchant/$merchantId/session";
        $client = new \GuzzleHttp\Client();//GuzzleHttp\Client
        $result = $client->post($url, [
            'auth' => [$merchantName, $merchantPassword]
        ]);
        $response = json_decode($result->getBody(), true);
        return $response['session']['id'];
    }
}
