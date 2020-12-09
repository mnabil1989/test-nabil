<?php

namespace App\Http\Controllers\Api;

use App\ClinicRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ClinicRequestController extends Controller
{
    /**
     * @OA\Post(
     *   path="/api/clinic_requests",
     *   summary="User Login",
     *   tags={"Clinic Pages"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"first_name","phone","gender","email","clinic_id","type","url"},
     *       @OA\Property(
     *         property="first_name",
     *         type="string",
     *         example="Ahmed",
     *         description="required|string|max:255"
     *       ),@OA\Property(
     *         property="last_name",
     *         type="string",
     *         example="Tawfek",
     *         description="string|max:255"
     *       ),@OA\Property(
     *         property="gender",
     *         type="string",
     *         example="1",
     *         description="required|numeric{1:Male // 2:Female}"
     *       ),@OA\Property(
     *         property="phone",
     *         type="string",
     *         example="1234567",
     *         description="required|numeric|digits:7"
     *       ),@OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255"
     *       ),@OA\Property(
     *         property="clinic_id",
     *         type="integer",
     *         example="1",
     *         description="required|numeric"
     *       ),@OA\Property(
     *         property="type",
     *         type="integer",
     *         example="1",
     *         description="required|numeric {1:Clinic Pages // 2:Doctor Page // 3:Service Page // 4:Post Page }"
     *       ),@OA\Property(
     *         property="url",
     *         type="string",
     *         example="وحدة-قسطرة-القلب",
     *         description="required|string"
     *       ),@OA\Property(
     *         property="further_requirements",
     *         type="string",
     *         example=" I want to contact me as soon as possible ",
     *         description="string"
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
     *         description="Sent Successfully"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Validator",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="Validator.",
     *         type="string",
     *         description="Validator"
     *       )
     *     )
     *    )
     *   )
     * )
     */
    function Index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'phone' => 'required|numeric|digits:8',
            'gender' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'clinic_id'=>'required|numeric',
            'type'=>'required|numeric',
            'url'=>'required|string',
            'further_requirements'=>'string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $clinic_request = ClinicRequest::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'email' => $request->get('email'),
            'clinic_id' => $request->get('clinic_id'),
            'type' => $request->get('type'),
            'url' => $request->get('url'),
            'further_requirements' => $request->get('further_requirements')

        ]);
        return response()->json('Success', 200);
    }

    /**
     * @OA\Post(
     *   path="/api/contact_us",
     *   summary="add new reqoust to ContactUs",
     *   tags={"Contact Us"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"first_name","email","further_requirements"},
     *       @OA\Property(
     *         property="first_name",
     *         type="string",
     *         example="Ahmed",
     *         description="required|string|max:255"
     *       ),@OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255"
     *       ),@OA\Property(
     *         property="further_requirements",
     *         type="string",
     *         example=" I want to contact me as soon as possible ",
     *         description="string"
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
     *         description="Sent Successfully"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Validator",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="Validator.",
     *         type="string",
     *         description="Validator"
     *       )
     *     )
     *    )
     *   )
     * )
     */
    function addContactUs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric|digits:7',
            'further_requirements'=>'required|string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $clinic_request = ClinicRequest::create([
            'first_name' => $request->get('first_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'further_requirements' => $request->get('further_requirements')

        ]);
        return response()->json('Success', 200);
    }


}
