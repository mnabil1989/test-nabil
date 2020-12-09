<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Appointment;
use App\Conversation;
use App\Doctor;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Nahid\Talk\Facades\Talk;
use Auth;
use View;

class MassageController extends Controller
{
    public function __construct()
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

        Talk::setAuthUserId($user->id);
    }

    /**
     * @OA\Post(
     *   path="/api/create_conversation",
     *   summary="User Update Profile Password",
     *   tags={"Chat"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"appointment_id"},
     *     @OA\Property(
     *         property="appointment_id",
     *         type="string",
     *         example="2",
     *         description="required"
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
    public function GetOrCreateConversation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'appointment_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        $appointment = Appointment::where('id', $request->get('appointment_id'))->first();
        if ($appointment == null) {
            return response()->json('wrong appointment Id', 400);
        }


        $doctor_id = $appointment->doctor_id;
        $user_two = $appointment->user_id;
        $user_one = User::where('doctor_id', $doctor_id)->first();
        if ($user_one == null) {
            return response()->json('doctor id is invalid', 400);
        }
        $conversation = Conversation::where('user_one', $user_one->id)->where('user_two', $user_two)->first();
        if ($conversation == null) {
            $conversation = Conversation::create([
                'user_one' => $user_one->id,
                'user_two' => $user_two,
                'status' => 1
            ]);
        }
        $conversation_id = $conversation->id;
        return response()->json(compact('conversation_id'), 200);
    }

    /**
     * @OA\Post(
     *   path="/api/send_message",
     *   summary="User Update Profile Password",
     *   tags={"Chat"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"message","conversation_id"},
     *     @OA\Property(
     *         property="message",
     *         type="string",
     *         example="Ahmed Tawfek",
     *         description="required"
     *       ),
     *     @OA\Property(
     *         property="conversation_id",
     *         type="string",
     *         example=1,
     *         description="required"
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
    public function send_message(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'conversation_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        $body = $request->get('message');
        $conversation = $request->get('conversation_id');
        if ($message = Talk::sendMessage($conversation, $body)) {
            return response()->json('success', 200);
        }
    }

    /**
     * @OA\Post(
     *   path="/api/delete_message",
     *   summary="Delete Message",
     *   tags={"Chat"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"message_id"},
     *     @OA\Property(
     *         property="message_id",
     *         type="string",
     *         example=1,
     *         description="required"
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
    public function delete_message(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        if (Talk::deleteMessage($request->get('message_id'))) {
            return response()->json(['status' => 'success'], 200);
        }
    }

    /**
     * @OA\Post(
     *   path="/api/get_conversation",
     *   summary="Conversation",
     *   tags={"Chat"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"conversation_id"},
     *     @OA\Property(
     *         property="conversation_id",
     *         type="string",
     *         example=1,
     *         description="required"
     *
     *     ),
     *     @OA\Property(
     *         property="offset",
     *         type="string",
     *         example=0,
     *         description="required"
     *     ),
     *     @OA\Property(
     *         property="take",
     *         type="string",
     *         example=20,
     *         description="required"
     *
     *     )
     *    )
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
    public function get_conversation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'conversation_id' => 'required',
            'offset' => 'required',
            'take' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        $offset= $request->get('offset');
        $take=$request->get('take');
        return Conversation::with([
            'messages' => function ($q) use ($offset, $take) {
                return $q->offset($offset)
                    ->take($take);
            }, 'userone', 'usertwo'
        ])->find($request->get('conversation_id'));

    }

    /**
     * @OA\Post(
     *   path="/api/makeseen",
     *   summary="makeseen",
     *   tags={"Chat"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"message_id"},
     *     @OA\Property(
     *         property="message_id",
     *         type="string",
     *         example=1,
     *         description="required"
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
    public function makeSeen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        if (Talk::makeSeen($request->get('message_id'))) {
            return response()->json(['status' => 'success'], 200);
        }
    }

    /**
     * @OA\Post(
     *   path="/api/checknewmessage",
     *   summary="makeseen",
     *   tags={"Chat"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"message_id"},
     *     @OA\Property(
     *         property="message_id",
     *         type="string",
     *         example=1,
     *         description="required"
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
    public function checknewmessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 401);
        }
        $message = Message::where('id', $request->get('message_id'))->first();
        if ($message == null) {
            return 'id is wrong';
        }
        $LastMessage = Message::where('conversation_id', $message->conversation_id)->order_by('id', 'desc')->first();

        if ($LastMessage->id == $message->id) {
            return response()->json('this last message', 201);
        }
        else{
            return response()->json('this not last message update Please', 400);
        }
    }
}
