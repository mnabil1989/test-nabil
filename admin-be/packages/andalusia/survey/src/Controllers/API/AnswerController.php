<?php

namespace Andalusia\Survey\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Survey\Requests\AnswerRequest as MainRequest;
use Andalusia\Survey\Resources\AnswerResource as MainResource;
use Andalusia\Survey\Repositories\AnswerRepositoryInterface as RepositoryInterface;

class AnswerController extends Controller
{
    /**
     * the repository
     *
     * @var RepositoryInterface
     */
    protected $repo;

    /**
     * init
     *
     * @return void
     */
    public function __construct(RepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/surveys_answers",
     *   summary="Survey Question Answers service",
     *   tags={"Survey Answer"},
     *   @OA\Parameter(
     *      name="paginate",
     *      description="pagination ... minimum is 1 & maximum is 1000",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
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
    public function index(MainRequest $request)
    {
        return MainResource::collection($this->repo->all($request->paginate ?? 3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/api/surveys_answers",
     *   summary="Survey Question Answers service",
     *   tags={"Survey Answer"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"question_id", "answer"},
     *       @OA\Property(
     *         property="question_id",
     *         type="integer",
     *         example="1",
     *         description="question id"
     *       ),
     *       @OA\Property(
     *         property="order",
     *         type="integer",
     *         example="3",
     *         description="the order of the answer"
     *       ),
     *       @OA\Property(
     *         property="answer",
     *         type="string",
     *         example="football",
     *         description="the answer of the question"
     *       ),
     *       @OA\Property(
     *         property="points",
     *         type="integer",
     *         example="20",
     *         description="to add points to the answer"
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
    public function store(MainRequest $request)
    {
        return $this->repo->create([
            'question_id' => $request->question_id,
            'order'       => $request->order,
            'answer'      => $request->answer,
            'points'      => $request->points
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/surveys_answers/{id}",
     *   summary="Survey Question Answers service",
     *   tags={"Survey Answer"},
     *   @OA\Parameter(
     *      name="id",
     *      description="answer id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
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
    public function show($id)
    {
        return new MainResource($this->repo->find($id));
    }

    /**
     * update a resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *   path="/api/surveys_answers",
     *   summary="Survey Question Answers service",
     *   tags={"Survey Answer"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"question_id", "answer"},
     *       @OA\Property(
     *         property="question_id",
     *         type="integer",
     *         example="1",
     *         description="question id"
     *       ),
     *       @OA\Property(
     *         property="order",
     *         type="integer",
     *         example="3",
     *         description="the order of the answer"
     *       ),
     *       @OA\Property(
     *         property="answer",
     *         type="string",
     *         example="football",
     *         description="the answer of the question"
     *       ),
     *       @OA\Property(
     *         property="points",
     *         type="integer",
     *         example="20",
     *         description="to add points to the answer"
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
    public function update(MainRequest $request, $id)
    {
        $this->repo->update([
            'question_id' => $request->question_id,
            'order'       => $request->order,
            'answer'      => $request->answer,
            'points'      => $request->points
        ], $id);

        return response()->json('successful action.', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *   path="/api/surveys_answers/{id}",
     *   summary="Survey Question Answers service",
     *   tags={"Survey Answer"},
     *   @OA\Parameter(
     *      name="id",
     *      description="answer id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
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
    public function destroy($id)
    {
        $this->repo->delete($id);
        return response()->json('successful action.', 204);
    }
}