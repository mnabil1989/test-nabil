<?php

namespace Andalusia\Survey\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Survey\Requests\UserAnswerRequest as MainRequest;
use Andalusia\Survey\Resources\UserAnswerResource as MainResource;
use Andalusia\Survey\Repositories\UserAnswerRepositoryInterface as RepositoryInterface;

class UserAnswerController extends Controller
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
     *   path="/api/surveys_users_answers",
     *   summary="Survey User Answer service",
     *   tags={"Survey User Answer"},
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
     *   path="/api/surveys_users_answers",
     *   summary="Survey User Answer service",
     *   tags={"Survey User Answer"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"answers"},
     *       @OA\Property(
     *         property="survey_id",
     *         type="integer",
     *         example=5,
     *         description="survey id ... required when an auth user submits the survey"
     *       ),
     *       @OA\Property(
     *         property="user_info_id",
     *         type="integer",
     *         example=100,
     *         description="survey user info id ... required when a guest user submits the survey"
     *       ),
     *       @OA\Property(
     *         property="answers",
     *         type="array",
     *         description="the user/guest answers",
     *         @OA\Items(
     *              type="object",
     *              @OA\Property(
     *                  property="answer_id",
     *                  type="integer",
     *                  example=3,
     *                  description="the answer id ... required if the answer allowed neither text nor textarea"
     *              ),
     *              @OA\Property(
     *                  property="answer_text",
     *                  type="string",
     *                  example="my name is example!",
     *                  description="to let the user type his/her own answer ... required if the answer allowed is text or textarea"
     *              )
     *         )
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
        $answers      = [];
        $user_info_id = auth('api')->user() ? $this->repo->createUserInfo($request->survey_id) : $request->user_info_id;

        foreach ($request->answers as $answer)
        {
            $answers[] = $this->repo->create([
                'user_info_id' => $user_info_id,
                'answer_id'    => @$answer['answer_id'],
                'answer_text'  => @$answer['answer_text']
            ]);
        }
        return $answers;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/surveys_users_answers/{id}",
     *   summary="Survey User Answer service",
     *   tags={"Survey User Answer"},
     *   @OA\Parameter(
     *      name="id",
     *      description="user answer id",
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
     *   path="/api/surveys_users_answers",
     *   summary="Survey User Answer service",
     *   tags={"Survey User Answer"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"user_info_id"},
     *       @OA\Property(
     *         property="user_info_id",
     *         type="integer",
     *         example="1",
     *         description="survey user info id"
     *       ),
     *       @OA\Property(
     *         property="answer_id",
     *         type="integer",
     *         example="3",
     *         description="the answer id ... required if the answer allowed neither text nor textarea"
     *       ),
     *       @OA\Property(
     *         property="answer_text",
     *         type="string",
     *         example="my name is example!",
     *         description="to let the user type his/her own answer ... required if the answer allowed is text or textarea"
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
            'user_info_id' => $request->user_info_id,
            'answer_id'    => $request->answer_id,
            'answer_text'  => $request->answer_text
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
     *   path="/api/surveys_users_answers/{id}",
     *   summary="Survey User Answer service",
     *   tags={"Survey User Answer"},
     *   @OA\Parameter(
     *      name="id",
     *      description="user answer id",
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
