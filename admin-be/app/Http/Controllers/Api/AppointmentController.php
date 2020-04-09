<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Appointment as Model;
use App\Appointment;
use App\Doctor;
use App\Workinghour;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource as MainResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AppointmentController extends Controller
{
    /**
     * Get the free time.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/appointments/freetime",
     *   summary="Appointment service (deprecated)",
     *   tags={"Appointment (Working Hours)"},
     *   @OA\Parameter(
     *      name="slug",
     *      description="doctor slug",
     *      required=true,
     *      in="query",
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="time",
     *      description="appointment time",
     *      example="04/31/2020",
     *      required=true,
     *      in="query",
     *      @OA\Schema(
     *          type="string"
     *      )
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
    function FreeTime(Request $request)
    {
        $slug = $request->get('slug');
        $doctorWithSlug = Doctor::where('status', 1)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->with('translations')->first();
        if (!$doctorWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $timestamp = strtotime($request->get('time'));
//        $timestamp = strtotime('04/31/2020');
        $day = date('l', $timestamp);
        $available = Workinghour::where('type', 'Working')->where('day', $day)->where('doctor_id', $doctorWithSlug->id)->first();
        $unavailable = Workinghour::where('type', 'Break')->where('day', $day)->where('doctor_id', $doctorWithSlug->id)->orderby('start')->get();
        $duration = $doctorWithSlug->duration;
        $count = 0;
        if ($available == null) {
            return response()->json('sorry no time available on that day', 200);

        }
        $availableArray[0][0] = strtotime($available->start);
        foreach ($unavailable as $unavailables) {
            $availableArray[$count][1] = strtotime($unavailables->start);
            $availableArray[$count + 1][0] = strtotime($unavailables->end);
            $count++;
        }
        $availableArray[$count][1] = strtotime($available->end);
        $counting = 0;
        for ($x = 0; $x < count($availableArray); $x++) {
            $times = $this->durationCounts($availableArray[$x][0], $availableArray[$x][1], $duration);
            foreach ($times as $time) {
                $timeing[$counting] = $time;
                $counting++;
            }
        }
//        dd($timeing);
        return response()->json($timeing, 200);
    }

    /**
     * Get the free time.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/appointments/free_time",
     *   summary="Appointment service",
     *   tags={"Appointment (Working Hours)"},
     *   @OA\Parameter(
     *      name="slug",
     *      description="doctor slug",
     *      required=true,
     *      in="query",
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="start_date",
     *      description="the start date ... if not provided the start date will be the current date",
     *      example="04/31/2020",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="string"
     *      )
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
    function free_time(Request $request)
    {
        $slug = $request->get('slug');
        $doctorWithSlug = Doctor::where('status', 1)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->first();
        if (!$doctorWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $current_date = \Carbon\Carbon::parse('now'); // UTC +2
        $current_date->setTimezone('EET');
        $start_date = $request->get('start_date');
        if ($request->start_date) {
            $start_date = \Carbon\Carbon::parse($request->start_date);
            $start_date->setTimezone('EET');

            if ($start_date->isPast() && !$start_date->is($current_date->format('m/d/Y')))
                return response()->json(['error' => 'date is in the past'], 422);
        }
        $period = \Carbon\CarbonPeriod::create($start_date, 7);

        $dates = [];
        foreach ($period as $key => $date) {

            $day = $date->format('l');
            $working_hours = Workinghour::where('type', 'Working')->where('day', $day)->where('doctor_id', $doctorWithSlug->id)->orderby('start')->first();
            if ($working_hours != null) {
                $day = date('l', strtotime($date->format('m/d/Y')));
                $available = Workinghour::where('type', 'Working')->where('day', $day)->where('doctor_id', $doctorWithSlug->id)->first();
                $unavailable = Workinghour::where('type', 'Break')->where('day', $day)->where('doctor_id', $doctorWithSlug->id)->orderby('start')->get();
                $duration = $doctorWithSlug->duration;
                $count = 0;
                $availableArray[0][0] = strtotime($available->start);
                foreach ($unavailable as $unavailables) {
                    $availableArray[$count][1] = strtotime($unavailables->start);
                    $availableArray[$count + 1][0] = strtotime($unavailables->end);
                    $count++;
                }
                $availableArray[$count][1] = strtotime($available->end);
                $counting = 0;
                for ($x = 0; $x < count($availableArray); $x++) {
                    $times = $this->durationCounts($availableArray[$x][0], $availableArray[$x][1], $duration);
                    foreach ($times as $time) {
                        $timeing[$counting] = $time;
                        $counting++;
                    }
                }
                $appoints = Appointment::where('doctor_id', $doctorWithSlug->id)->get();
                foreach ($appoints as $appoint) {
                    if ($date->format('m/d/Y') == date('m/d/Y', strtotime($appoint->start))) {
                        $c = 0;
                        foreach ($timeing as $t) {

                            if ($t == date('H:i', strtotime($appoint->start))) {
                                unset($timeing[$c]);
                            }
                            $c++;
                        }

                    }
                }
                $arr = [];
                $c = 0;
                foreach ($timeing as $t) {
                    $arr[$c] = $t;
                    $c++;
                }
                if ($date->format('m/d/Y') == date('m/d/Y', strtotime(now()))) {
                    $c = 0;
                    foreach ($arr as $t) {

                        if (strtotime($t) < strtotime(date("H:i", strtotime('+1 hours')))) {
                            unset($arr[$c]);
                        }
                        $c++;
                    }
                }
                $Times = [];
                $c = 0;
                foreach ($arr as $t) {
                    $Times[$c] = $t;
                    $c++;
                }
                $dates[$date->format('m/d/Y')] = $Times;
            } else {

                $dates[$date->format('m/d/Y')] = [];
            }
        }
        return $dates;
    }

    function durationCounts($start, $end, $duarte)
    {
        $timess = [];
        $times = $start;
        $duration = $duarte * 60;
        if (($end - $start) % $duration != 0) {
            $count = ($end - $start) / $duration - 1;
        } else {
            $count = ($end - $start) / $duration;
        }
        for ($i = 0; $i < $count; $i++) {
            $timess[$i] = date('H:i', $times);
            $times = $times + $duration;
        }
        return $timess;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Model $appointment
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/api/appointments",
     *   summary="Appointment service",
     *   tags={"Appointment (Working Hours)"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"slug", "start"},
     *       @OA\Property(
     *         property="slug",
     *         type="string",
     *         example="dr-saeed-refaat",
     *         description="doctor slug"
     *       ),
     *       @OA\Property(
     *         property="start",
     *         type="string",
     *         example="2020-03-30 14:23:00",
     *         description="the start of the appointment"
     *       ),
     *       @OA\Property(
     *         property="comments",
     *         type="string",
     *         example="hi doctor",
     *         description="to add a comment for the appointment"
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
    public function store(Model $appointment, Request $request)
    {
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
            'start' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $appointment_object = $appointment->where('doctor_id', $doctor->id)->where('start', $request->start)->first();
        if ($appointment_object)
            return response()->json(['appointment' => 'this appointment already exists']);
        return $appointment->create([
            'doctor_id' => $doctor->id,
            'user_id' => $user->id,
            'start' => $request->start,
            'duration' => $doctor->duration,
            'comments' => $request->comments,
            'confirmed' => 0,
            'payment_confirmed' => 0
        ]);
    }

    /**
     * Get the appointments for the authenticated user/doctor.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/appointments/mine",
     *   summary="Appointment service",
     *   tags={"Appointment (Working Hours)"},
     *   security={{"bearerAuth":{}}},
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
    function mine()
    {
        $appointments = auth('api')->user()->doctor_id != 0 ? auth('api')->user()->doctor->appointments : auth('api')->user()->appointments;
        return MainResource::collection($appointments);
    }
}
