<?php

namespace App\Http\Controllers\Api;


use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/api/booking",
     *   summary="Booking service without Signin or Signup",
     *   tags={"Booking"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={( "doctor_id" Or "clinic_id" ), "name","email","phone","comments","booking_date_time"},
     *       @OA\Property(
     *         property="doctor_id",
     *         type="integer",
     *         example="1",
     *         description="the doctor id"
     *       ),
     *       @OA\Property(
     *         property="clinic_id",
     *         type="integer",
     *         example="1",
     *         description="the clinic id"
     *       ),
     *       @OA\Property(
     *         property="name",
     *         type="string",
     *         example="Khaled",
     *         description="Visitor Name "
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="Khaled@test.com",
     *         description="Visitor email "
     *       ),
     *       @OA\Property(
     *         property="phone",
     *         type="string",
     *         example="+5999724",
     *         description="Visitor phone "
     *       ),
     *       @OA\Property(
     *         property="comments",
     *         type="string",
     *         example="Khaled",
     *         description="Visitor Comments "
     *       ),
     *       @OA\Property(
     *         property="booking_date_time",
     *         type="string",
     *         example="2020-04-09 13:43:17 ",
     *         description="optional the booking date ... date format is: Y-m-d H:M:S"
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
    public function create(Request $request)
    {
        if(isset($request->clinic_id) || isset($request->doctor_id) ){

            $validator = Validator::make($request->all(), [
                'clinic_id' => 'exists:clinics,id',
                'doctor_id' => 'exists:doctors,id',
                'workinghour_id' => 'exists:workinghours,id',
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'comments' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json( $validator->errors(),400);
            }

        }else {
            return response()->json("Must select doctor or clinic to complete booking!",400);
        }

      $booking = Booking::create($request->all());

      return response()->json( $booking,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
