<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\SiteSetting;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * @OA\Post(
     *   path="/api/favorite-user",
     *   summary="Favorite Button",
     *   tags={"Post Pages"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"post_id"},
     *       @OA\Property(
     *         property="post_id",
     *         type="string",
     *         example="6",
     *         description="required|numeric"
     *       )
     *     )
     *   ),
     *    @OA\Response(
     *     response=200,
     *     description="Post successfully removed form your favorite list :(",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="success:",
     *         type="string",
     *         description="Post successfully removed"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="Post successfully added to your favorite list :)",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="success:",
     *         type="string",
     *         description="Post successfully added "
     *       )
     *     )
     *   ),
     *     @OA\Response(
     *     response=404,
     *     description="user_not_found",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="user_not_found",
     *         type="string",
     *         description="user_not_found"
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
    function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
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
        $post_id=$request->get('post_id');
        $user = User::findOrFail($user->id);
        $post=Post::find($post_id);
        if($post==null){

            return response()->json('Post id is wrong -_-',404);
        }
        $isFavorite = $user->favorite_posts()->where('post_id',$post_id)->count();

        if ($isFavorite == 0)
        {
            $user->favorite_posts()->attach($post_id);
            return response()->json('Post successfully added to your favorite list :)',201);
        } else {
            $user->favorite_posts()->detach($post_id);
            return response()->json('Post successfully removed form your favorite list :(',200);


        }

    }
}
