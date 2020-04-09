<?php

namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Http\Resources\PostArResource;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\SocialAccount;
use App\User;
use Illuminate\Auth\Events\Registered as RegisteredEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Socialite;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *   path="/api/login",
     *   summary="User Login",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"email", "password"},
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255"
     *       ),
     *       @OA\Property(
     *         property="password",
     *         type="string",
     *         example="123123",
     *         description="required|string|min:6"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="token:",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="invalid_credentials",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    ),
     *   @OA\Response(
     *     response=401,
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
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'These credentials do not match our records.'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    /**
     * @OA\Post(
     *   path="/api/check-email",
     *   summary="User Check Email",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"email"},
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="success",
     *         type="string",
     *         description="The email"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=401,
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
    public function check_if_email_exists(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        else
            return response()->json(['email' => 'you can use this email'], 200);
    }

    /**
     * @OA\Post(
     *   path="/api/register",
     *   summary="User Registration",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"name","phone","email", "password","password_confirmation"},
     *     @OA\Property(
     *         property="name",
     *         type="string",
     *         example="user",
     *         description="required|string|max:255"
     *       ),
     *     @OA\Property(
     *         property="last_name",
     *         type="string",
     *         example="Last",
     *         description="string|max:255"
     *       ),
     *      @OA\Property(
     *         property="phone",
     *         type="integer",
     *         example="1234567",
     *         description="['required','regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']"
     *       ),
     *       @OA\Property(
     *         property="address",
     *         type="string",
     *         example="Andalusia Group, 9 Mohamed Baidar St. from ElNasr St., New Maadi, Cairo, Egypt.",
     *         description="string|max:255"
     *       ),
     *     @OA\Property(
     *         property="gender",
     *         type="string",
     *         example="Male,Female",
     *         description="string|max:20"
     *       ),
     *     @OA\Property(
     *         property="avatar",
     *         type="file",
     *         example="File Image",
     *         description="image|mimes:jpeg,png,jpg,gif,svg|max:1024"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255|unique:users"
     *       ),
     *       @OA\Property(
     *         property="password",
     *         type="string",
     *         example="123123",
     *         description="required|string|min:6|confirmed"
     *       ),
     *     @OA\Property(
     *         property="password_confirmation",
     *         type="string",
     *         example="123123",
     *         description="Same As Password"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{name,email,updated_at,created_at,id},token}",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'phone' => ['required', 'unique:users', 'regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            'address' => 'string|max:255',
            'gender' => 'string|max:20',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $filename = time() . ".jpg";
        $date = date('FY');
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->move(storage_path('app/public/users/' . $date), $filename);
            $photoUrl = '/users/' . $date . '/' . $filename;

        } else {
            $photoUrl = "/users/default.jpg";
        }


        $user = User::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'gender' => $request->get('gender'),
            'avatar' => $photoUrl,
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }
    /**
     * @OA\Post(
     *   path="/api/doctor/login",
     *   summary="Doctor Login",
     *   tags={"Doctor Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"email", "password"},
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255"
     *       ),
     *       @OA\Property(
     *         property="password",
     *         type="string",
     *         example="123123",
     *         description="required|string|min:6"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="token:",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="invalid_credentials",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    ),
     *   @OA\Response(
     *     response=401,
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
    public function Doctor_authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'These credentials do not match our records.'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    /**
     * @OA\Post(
     *   path="/api/doctor/register",
     *   summary="doctor Registration",
     *   tags={"Doctor Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"phone","email", "password","password_confirmation"},
     *      @OA\Property(
     *         property="phone",
     *         type="integer",
     *         example="5123456",
     *         description="['required','regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="doctor@doctor.com",
     *         description="required|string|email|max:255|unique:users"
     *       ),
     *       @OA\Property(
     *         property="password",
     *         type="string",
     *         example="123123",
     *         description="required|string|min:6|confirmed"
     *       ),
     *     @OA\Property(
     *         property="password_confirmation",
     *         type="string",
     *         example="123123",
     *         description="Same As Password"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{name,email,updated_at,created_at,id},token}",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function Doctor_register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => ['unique:users', 'regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $doctor_email=Doctor::where('email',$request->get('email'))->where('phone',$request->get('phone'))->first();
        if($doctor_email==null){
            return response()->json('Sorry your Email and Phone not equal any record on our system',401);
        }

        $user = User::create([
            'name' => $doctor_email->title_en,
            'last_name' => $request->get('last_name'),
            'phone' => $doctor_email->phone,
            'avatar' => $doctor_email->photo,
            'gender'=>'',
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'doctor_id'=>$doctor_email->id
        ]);
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }
    /**
     * @OA\Get(
     *   path="/api/doctor/me",
     *   summary="User Data",
     *   tags={"Doctor Authorization"},
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{name,email,updated_at,created_at,id},token}",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function getAuthenticatedDoctor()
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
        $doctor=Doctor::find($user->doctor_id);
        if($doctor==null){
            return response()->json('this doctor data is wrong');

        }
//        dd($doctor);
        $doctor = [
            'id' => $doctor->id,
            'title_ar' => $doctor->title_ar,
            'title_en' => $doctor->title_en,
            'phone' => $doctor->phone,
            'email' => $doctor->email,
            'duration' => $doctor->duration,
            'price' => $doctor->price,
            'photo' => env('APP_URL') .'/'. $doctor->photo,
            'role'=>'doctor'
        ];
        return response()->json(compact('doctor'));
    }
    /**
     * @OA\Put(
     *   path="/api/update-profile-password",
     *   summary="User Update Profile Password",
     *   tags={"Authorization"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"name","phone","email"},
     *     @OA\Property(
     *         property="current_password",
     *         type="string",
     *         example="123123",
     *         description="required|string|max:255"
     *       ),
     *        @OA\Property(
     *         property="new_password",
     *         type="string",
     *         example="12341234",
     *         description="required|string|max:255"
     *       ),
     *     @OA\Property(
     *         property="new_password_confirmation",
     *         type="string",
     *         example="12341234",
     *         description="Same As Password"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{data}",
     *         type="string",
     *         description="User"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */

    public function updateProfilePassword(Request $request)
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
            'current_password' => 'required|string|max:255',
            'new_password' => 'required|string|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if (!(Hash::check($request->get('current_password'), $user->password))) {
            return response()->json(['error' => 'password not Valid'], 400);
        }
        $user->update([
            'password' => bcrypt($request->get('new_password')),
        ]);
        $user->save();
        if($user->doctor_id==0){
            $role='user';
        }
        else{
            $role='doctor';
        }

        $user = [
            'id' => $user->id,
            'first_name' => $user->name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'address' => $user->address,
            'email' => $user->email,
            'avatar' => env('APP_URL') . '/storage/' . $user->avatar,
            'role' => $role,
        ];
        return response()->json(compact('user'), 201);
    }

    /**
     * @OA\Put(
     *   path="/api/update-profile",
     *   summary="User Update Profile Data",
     *   tags={"Authorization"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"name","phone","email"},
     *     @OA\Property(
     *         property="name",
     *         type="string",
     *         example="user",
     *         description="required|string|max:255"
     *       ),
     *     @OA\Property(
     *         property="last_name",
     *         type="string",
     *         example="Last",
     *         description="string|max:255"
     *       ),
     *      @OA\Property(
     *         property="phone",
     *         type="integer",
     *         example="1234567",
     *         description="['required','regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']"
     *       ),
     *       @OA\Property(
     *         property="address",
     *         type="string",
     *         example="Andalusia Group, 9 Mohamed Baidar St. from ElNasr St., New Maadi, Cairo, Egypt.",
     *         description="string|max:255"
     *       ),
     *     @OA\Property(
     *         property="gender",
     *         type="string",
     *         example="Male",
     *         description="string|max:20"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255|unique:users"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{data}",
     *         type="string",
     *         description="User"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function updateProfile(Request $request)
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
            'name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'phone' => ['required', 'regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/', 'unique:users,phone,' . $user->id],
            'address' => 'string|max:255',
            'gender' => 'string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user->update([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'gender' => $request->get('gender'),
            'email' => $request->get('email')
        ]);
        $user->save();
        $user = [
            'id' => $user->id,
            'first_name' => $user->name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'address' => $user->address,
            'email' => $user->email,
            'avatar' => env('APP_URL') . '/storage/' . $user->avatar,
        ];
        return response()->json(compact('user'), 201);
    }

    /**
     * @OA\Post(
     *   path="/api/update-profile-image",
     *   summary="User Update Profile Image",
     *   tags={"Authorization"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"Image"},
     *     @OA\Property(
     *         property="avatar",
     *         type="file",
     *         example="File Image",
     *         description="required|image|mimes:jpeg,png,jpg,gif,svg|max:1024"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{data}",
     *         type="string",
     *         description="User"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function updateProfileImage(Request $request)
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
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $filename = time() . ".jpg";
        $date = date('FY');
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->move(storage_path('app/public/users/' . $date), $filename);
            $photoUrl = '/users/' . $date . '/' . $filename;

        } else {
            $photoUrl = "/users/default.jpg";
        }

        $user->update([
            'avatar' => $photoUrl,
        ]);
        $user->save();
        $user = [
            'id' => $user->id,
            'first_name' => $user->name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'address' => $user->address,
            'email' => $user->email,
            'avatar' => env('APP_URL') . '/storage/' . $user->avatar,
        ];
        return response()->json(compact('user'), 201);
    }

    /**
     * @OA\Post(
     *   path="/api/social-login",
     *   summary="User social Login",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"token"},
     *       @OA\Property(
     *         property="token",
     *         type="numeric",
     *         example="ya29.a0Adw1xeVd7V6JnoNL4EFAczpu6lZzfxdvAUhYYgaHperVnREcDEJGf8hxZ2e1nGbMNZPLOd5MStXfxbhp0WHkuoeXo7Y5fLu2XXtfn3E14MjYKOby6T5zcg3jJ-d_6vz17gRswGXj91lFmc6xvJI8tfnaUh2ZERIdr5GH",
     *         description="required|string"
     *       ),
     *     @OA\Property(
     *         property="provider",
     *         type="string",
     *         example="google",
     *         description="required|string|max:255"
     *       ),
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="token:",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=523,
     *     description="invalid_credentials",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:",
     *         type="string",
     *         description="Provider is Not Found"
     *       )
     *     )
     *    ),
     *    @OA\Response(
     *     response=524,
     *     description="invalid_credentials",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:",
     *         type="string",
     *         description="Provider is Not Found And Email Not Found Too "
     *       )
     *     )
     *    ),
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
    public function handleProviderCallbackMobileLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'provider' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = Socialite::driver($request->provider)->userFromToken($request->token);
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            return response()->json('Invalid Credentials Token', 400);
        }
        $provider_id = $data->id;
        $provider = $request->provider;
        $email = $data->email;
        $checkProvider = SocialAccount::where('provider_user_id', $provider_id)->count();
        $checkUser = "";
        if ($email != null) {
            $checkUser = User::where('email', $email)->count();
        }
        $code=0;
        if ($checkProvider == 0) {
            $code = 523;
            if ($checkUser == 0) {
                $code = 524;
            }
        }
        if ($code == 523) {
            $user = User::firstOrNew([
                'email' => $email
            ]);
            $social = SocialAccount::firstOrNew([
                'provider_user_id' => $provider_id,
                'provider' => $provider
            ]);
            $social->user()->associate($user);
            $social->save();
            Auth::guard('web')->login($user, true);
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('token'), 201);
        } elseif ($code == 524) {
            return response()->json('Not Registered', 523);
        } else {
            $user = SocialAccount::where('provider_user_id', $provider_id)->first()->user;
            Auth::guard('web')->login($user, true);
            $token = JWTAuth::fromUser($user);

            return response()->json(compact('token'), 201);
        }


    }

    /**
     * @OA\Post(
     *   path="/api/social-registration",
     *   summary="User social Registration",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"token","provider","name","phone","email", "password","password_confirmation"},
     *     @OA\Property(
     *         property="token",
     *         type="numeric",
     *         example="ya29.a0Adw1xeVd7V6JnoNL4EFAczpu6lZzfxdvAUhYYgaHperVnREcDEJGf8hxZ2e1nGbMNZPLOd5MStXfxbhp0WHkuoeXo7Y5fLu2XXtfn3E14MjYKOby6T5zcg3jJ-d_6vz17gRswGXj91lFmc6xvJI8tfnaUh2ZERIdr5GH",
     *         description="required|numeric"
     *       ),
     *     @OA\Property(
     *         property="provider",
     *         type="string",
     *         example="google",
     *         description="required|string|max:255"
     *       ),
     *     @OA\Property(
     *         property="name",
     *         type="string",
     *         example="user",
     *         description="required|string|max:255"
     *       ),
     *     @OA\Property(
     *         property="last_name",
     *         type="string",
     *         example="Last",
     *         description="string|max:255"
     *       ),
     *      @OA\Property(
     *         property="phone",
     *         type="integer",
     *         example="1234567",
     *         description="['required','regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']"
     *       ),
     *       @OA\Property(
     *         property="address",
     *         type="string",
     *         example="Andalusia Group, 9 Mohamed Baidar St. from ElNasr St., New Maadi, Cairo, Egypt.",
     *         description="string|max:255"
     *       ),
     *     @OA\Property(
     *         property="gender",
     *         type="string",
     *         example="Male,Female",
     *         description="string|max:20"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="user@user.com",
     *         description="required|string|email|max:255"
     *       ),
     *       @OA\Property(
     *         property="password",
     *         type="string",
     *         example="123123",
     *         description="required|string|min:6|confirmed"
     *       ),
     *     @OA\Property(
     *         property="password_confirmation",
     *         type="string",
     *         example="123123",
     *         description="Same As Password"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{name,email,updated_at,created_at,id},token}",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="Validation.",
     *         type="string",
     *         description="Validator."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function handleProviderCallbackMobileRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'provider' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'phone' => ['required', 'regex:/^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/','unique:users'],
            'address' => 'string|max:255',
            'gender' => 'string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $data = Socialite::driver($request->provider)->userFromToken($request->token);
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            return response()->json('Invalid Credentials Token', 400);
        }
        if(!$request->gender){
            $gender = "";
        }
        else{
            $gender = $request->gender;
        }
        $provider_id = $data->id;
        $provider = $request->provider;
        $name = $request->name;
        $last_name = $request->last_name;
        $phone = $request->phone;
        $address = $request->address;
        $avatar = $data->avatar;
        $email = $request->email;
        $password = $request->password;

        $user = $this->findOrCreateUserMobile($provider, $provider_id, $name, $last_name, $phone, $address, $gender, $avatar, $email, $password);
        Auth::guard('web')->login($user, true);
        // This session variable can help to determine if user is logged-in via socialite
        session()->put([
            'auth.social_id' => $provider_id
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'), 201);


    }

    protected function findOrCreateUserMobile($provider, $provider_id, $name, $last_name, $phone, $address, $gender, $avatar, $email, $password)
    {
        $social = SocialAccount::firstOrNew([
            'provider_user_id' => $provider_id,
            'provider' => $provider
        ]);

        if ($social->exists) {
            return $social->user;
        }

        $user = User::firstOrNew([
            'email' => $email
        ]);

        if (!$user->exists) {
            $user->name = $name;
            $user->last_name = $last_name;
            $user->phone = $phone;
            $user->address = $address;
            $user->gender = $gender;
            $user->avatar = $avatar;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            event(new RegisteredEvent($user));
        }
        $social->user()->associate($user);
        $social->save();

        return $user;
    }

    /**
     * @OA\Get(
     *   path="/api/user",
     *   summary="User Data",
     *   tags={"Authorization"},
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{name,email,updated_at,created_at,id},token}",
     *         type="string",
     *         description="The Token"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function getAuthenticatedUser()
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

        $user = [
            'id' => $user->id,
            'first_name' => $user->name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'gender' => $user->gender,
            'address' => $user->address,
            'email' => $user->email,
            'avatar' => env('APP_URL') . $user->avatar,
        ];
        return response()->json(compact('user'));
    }

    /**
     * @OA\Get(
     *   path="/api/user-favorite-posts",
     *   summary="User Data",
     *   tags={"Authorization"},
     *   security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         required=true,
     *         description="Lang",
     *         @OA\Schema(
     *              type="string",
     *              example="ar",
     *         )
     *      ),
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="posts",
     *         type="string",
     *         description="posts Data"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function getAuthenticatedPosts(Request $request)
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


        if ($request->input('lang') == 'en') {
            $posts = PostResource::collection(User::findOrFail($user->id)->favorite_posts);
            return response()->json(compact(['posts']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $posts = PostArResource::collection(User::findOrFail($user->id)->favorite_posts);
            return response()->json(compact(['posts']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *   path="/api/user-favorite-events",
     *   summary="User Data",
     *   tags={"Authorization"},
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="events",
     *         type="string",
     *         description="events Data"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function getAuthenticatedEvents()
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

        $Events = User::findOrFail($user->id)->favorite_events;
        return response()->json(compact('Events'), 200);
    }

    /**
     * @OA\Post(
     *   path="/api/password/link",
     *   summary="User Send link to the email",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"email"},
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="test@example.com",
     *         description="user email"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{data}",
     *         type="string",
     *         description="User"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function reset_password_link(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = \Illuminate\Support\Str::random(20);
            $link  = env('APP_BASE_URL') . "/auth/reset/{$token}";
            $email = new \App\Mail\ResetPassword($link);
            \Mail::to($user->email)->send($email);

            $user->update([
               'reset_token' => $token
            ]);

            return response()->json(['email' => 'the email has been sent, please check your email'], 200);
        }

        return response()->json(['email' => 'email doesn\'t exist'], 400);
    }

    /**
     * @OA\Post(
     *   path="/api/password/reset",
     *   summary="User reset the password",
     *   tags={"Authorization"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"reset_token", "password"},
     *       @OA\Property(
     *          property="reset_token",
     *          type="string",
     *          example="546aa5ackandm535d5d5a5",
     *          description="the token that has been sent to the email"
     *       ),
     *       @OA\Property(
     *          property="password",
     *          type="string",
     *          example="123456",
     *          description="the new password"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Success",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="{user{data}",
     *         type="string",
     *         description="User"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Unauthorized",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="error:These credentials do not match our records.",
     *         type="string",
     *         description="These credentials do not match our records."
     *       )
     *     )
     *    )
     *   )
     * )
     */
    public function reset_password(Request $request)
    {
        if(auth('api')->user())
        {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6'
            ]);

            if ($validator->fails())
                return response()->json($validator->errors(), 422);

            auth('api')->user()->update([
                'password'    => bcrypt($request->password),
                'reset_token' => ''
            ]);
            return response()->json(['password' => 'the password has been updated!'], 200);
        }
        $user = User::where('reset_token', $request->reset_token)->first();
        if ($user)
            return response()->json(['token' => JWTAuth::fromUser($user)]);
        return response()->json(['reset_password' => 'invalid details']);
    }
}
