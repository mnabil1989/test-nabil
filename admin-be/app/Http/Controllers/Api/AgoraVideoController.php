<?php

namespace App\Http\Controllers\Api;
require app_path() . '/third_party/DynamicKey/AgoraDynamicKey/php/src/RtcTokenBuilder.php';

use App\Appointment;
use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;

class AgoraVideoController
{
    /**
     * Get the appointment data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/api/videoAppointment",
     *   summary="Appointment service video details",
     *   tags={"Appointment video call"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"appointment_id"},
     *     @OA\Property(
     *         property="appointment_id",
     *         type="number",
     *         example="1",
     *         description="required"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="success:",
     *         type="string",
     *         description="successful action."
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="invalid",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:there is an error.",
     *         type="string",
     *         description="there is an error."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function videoAppointment(Request $request)
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

        $appointment = Appointment::find(request()->body['appointment_id']);
        if ($user->id != $appointment->user_id && $user->doctor_id != $appointment->doctor_id) {
            return response()->json('not auth', '403');
        }

        $userId = auth('api')->id();
        $otherId = auth('api')->id() == $appointment->user_id ? $appointment->doctorId->user->id : $appointment->user_id;
        $doctorId = $appointment->doctor_id;
//        $doctorId = $appointment->doctor_id;
//      $user =  substr(md5($userId),0,10);
        $usermd5 = md5(md5($userId.env('RANDOM_STRING')));
        $othermd5 = md5(md5($otherId.env('RANDOM_STRING')));
        $doctormd5 = md5(time() . $doctorId);
        $usermd5_srt = substr($usermd5, 0, 10);
        $doctormd5_srt = substr($doctormd5, 0, 10);
        $channel = md5(md5($appointment->user_id) . md5($appointment->doctor_id) . md5($appointment->id));
        $role = $user->id == $appointment->user_id ? 0 : 1; // need to add based on the expected role integer

        $privilegeExpiredTs = \Carbon\Carbon::parse($appointment->start)->addMinutes($appointment->duration)->addHours(2);
        $privilegeExpiredTs->setTimezone(env('TimeZone'));
        $token = $this->token(env('AGORA_APP_ID'), env('AGORA_APP_CERTIFICATE'), $channel, $usermd5, $role, $privilegeExpiredTs->timestamp);

        $details = [
            'sms' => [
                'mobile' => $appointment->userId->phone,
                'text'   => $appointment->replace_attributes('sms.appointment_survey')
            ]
        ];

        dispatch(new \App\Jobs\SendNotificationJob($details))->delay($privilegeExpiredTs);

        return response()->json([
            'token' => $token,
            'channelName' => $channel,
            'userId' => $usermd5,
            'other'  => $othermd5,
            'doctor_md5' => $doctormd5_srt,
            'doctor_name' => $appointment->doctorId->title_en,
            'doctor_slug' => $appointment->doctorId->slug_en,
            'user_name' => $appointment->userId->name
        ]);
    }

    // create token
    private function token($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs)
    {
        return \App\ThirdParty\RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
    }
}
