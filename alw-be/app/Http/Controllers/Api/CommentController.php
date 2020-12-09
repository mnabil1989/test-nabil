<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Comment as Model;
use App\Http\Resources\CommentResource as MainResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Model $comment
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/comments",
     *   summary="Comment service",
     *   tags={"Comment"},
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
    public function index(Model $comment)
    {
        return MainResource::collection($comment->all());
    }
}
