<?php

namespace Andalusia\Survey\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Survey\Requests\QuestionRequest as MainRequest;
use Andalusia\Survey\Resources\QuestionResource as MainResource;
use Andalusia\Survey\Repositories\QuestionRepositoryInterface as RepositoryInterface;

class QuestionController extends Controller
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
     *   path="/api/surveys_questions",
     *   summary="Survey Question service",
     *   tags={"Survey Question"},
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
     *   path="/api/surveys_questions",
     *   summary="Survey Question service",
     *   tags={"Survey Question"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"survey_id", "question", "form_type"},
     *       @OA\Property(
     *         property="survey_id",
     *         type="integer",
     *         example="1",
     *         description="survey id"
     *       ),
     *       @OA\Property(
     *         property="order",
     *         type="integer",
     *         example="3",
     *         description="the order of the question"
     *       ),
     *       @OA\Property(
     *         property="question",
     *         type="string",
     *         example="What are your favorite sports?",
     *         description="the question"
     *       ),
     *       @OA\Property(
     *         property="form_type",
     *         type="string",
     *         enum={"text", "textarea", "menu", "checkbox", "radio"},
     *         example="checkbox",
     *         description="the type of the form that will be displayed to the user when answering the questions"
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
            'survey_id' => $request->survey_id,
            'order'     => $request->order,
            'question'  => $request->question,
            'form_type' => $request->form_type
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/surveys_questions/{id}",
     *   summary="Survey Question service",
     *   tags={"Survey Question"},
     *   @OA\Parameter(
     *      name="id",
     *      description="question id",
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
     *   path="/api/surveys_questions",
     *   summary="Survey Question service",
     *   tags={"Survey Question"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"question", "form_type"},
     *       @OA\Property(
     *         property="survey_id",
     *         type="integer",
     *         example="1",
     *         description="survey id"
     *       ),
     *       @OA\Property(
     *         property="order",
     *         type="integer",
     *         example="3",
     *         description="the order of the question"
     *       ),
     *       @OA\Property(
     *         property="question",
     *         type="string",
     *         example="What are your favorite sports?",
     *         description="the question"
     *       ),
     *       @OA\Property(
     *         property="form_type",
     *         type="string",
     *         enum={"text", "textarea", "menu", "checkbox", "radio"},
     *         example="checkbox",
     *         description="the type of the form that will be displayed to the user when answering the questions"
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
            'survey_id' => $request->survey_id,
            'order'     => $request->order,
            'question'  => $request->question,
            'form_type' => $request->form_type
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
     *   path="/api/surveys_questions/{id}",
     *   summary="Survey Question service",
     *   tags={"Survey Question"},
     *   @OA\Parameter(
     *      name="id",
     *      description="question id",
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