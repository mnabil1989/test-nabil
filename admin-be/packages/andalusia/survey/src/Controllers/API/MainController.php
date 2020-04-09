<?php

namespace Andalusia\Survey\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Survey\Requests\MainRequest;
use Andalusia\Survey\Resources\MainResource;
use Andalusia\Survey\Repositories\RepositoryInterface;

class MainController extends Controller
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
     *   path="/api/surveys",
     *   summary="Survey service",
     *   tags={"Survey"},
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
     *   path="/api/surveys",
     *   summary="Survey service",
     *   tags={"Survey"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"same_page", "popup_type", "popup_timer", "number_of_questions_on_page", "slug", "note", "redirect_link"},
     *       @OA\Property(
     *         property="same_page",
     *         type="boolean",
     *         example="true",
     *         description="will the survey be on the same page or in another page? (if same_page=false you will have to send the slug property)"
     *       ),
     *       @OA\Property(
     *         property="popup_type",
     *         type="string",
     *         enum={"small", "big"},
     *         example="small",
     *         description="popup type"
     *       ),
     *       @OA\Property(
     *         property="popup_timer",
     *         type="integer",
     *         example="1",
     *         description="popup_timer will be in minutes ... popup will be closed automatically after the timer is out"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="test@example.com",
     *         description="user email"
     *       ),
     *       @OA\Property(
     *         property="phone",
     *         type="string",
     *         example="0123456789",
     *         description="user phone"
     *       ),
     *       @OA\Property(
     *         property="number_of_questions_on_page",
     *         type="integer",
     *         example="10",
     *         description="to specify the number of questions if the popup_type is small"
     *       ),
     *       @OA\Property(
     *         property="slug",
     *         type="string",
     *         example="user-satisfaction",
     *         description="slug"
     *       ),
     *       @OA\Property(
     *         property="note",
     *         type="string",
     *         example="thank you note",
     *         description="note"
     *       ),
     *       @OA\Property(
     *         property="redirect_link",
     *         type="string",
     *         example="example.com",
     *         description="redirect link"
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
            'same_page'                   => $request->same_page,
            'popup_type'                  => $request->popup_type,
            'popup_timer'                 => $request->popup_timer,
            'number_of_questions_on_page' => $request->number_of_questions_on_page,
            'slug'                        => $request->slug,
            'note'                        => $request->note,
            'redirect_link'               => $request->redirect_link,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/surveys/{id}",
     *   summary="Survey service",
     *   tags={"Survey"},
     *   @OA\Parameter(
     *      name="id",
     *      description="survey id",
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
     *   path="/api/surveys/{id}",
     *   summary="Survey service",
     *   tags={"Survey"},
     *   @OA\Parameter(
     *      name="id",
     *      description="survey id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"same_page", "popup_type", "popup_timer", "number_of_questions_on_page", "slug", "note", "redirect_link"},
     *       @OA\Property(
     *         property="same_page",
     *         type="boolean",
     *         example="true",
     *         description="will the survey be on the same page or in another page? (if same_page=false you will have to send the slug property)"
     *       ),
     *       @OA\Property(
     *         property="popup_type",
     *         type="string",
     *         enum={"small", "big"},
     *         example="small",
     *         description="popup type"
     *       ),
     *       @OA\Property(
     *         property="popup_timer",
     *         type="integer",
     *         example="1",
     *         description="popup_timer will be in minutes ... popup will be closed automatically after the timer is out"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="test@example.com",
     *         description="user email"
     *       ),
     *       @OA\Property(
     *         property="phone",
     *         type="string",
     *         example="0123456789",
     *         description="user phone"
     *       ),
     *       @OA\Property(
     *         property="number_of_questions_on_page",
     *         type="integer",
     *         example="10",
     *         description="to specify the number of questions if the popup_type is small"
     *       ),
     *       @OA\Property(
     *         property="slug",
     *         type="string",
     *         example="user-satisfaction",
     *         description="slug"
     *       ),
     *       @OA\Property(
     *         property="note",
     *         type="string",
     *         example="thank you note",
     *         description="note"
     *       ),
     *       @OA\Property(
     *         property="redirect_link",
     *         type="string",
     *         example="example.com",
     *         description="redirect link"
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
            'same_page'                   => $request->same_page,
            'popup_type'                  => $request->popup_type,
            'popup_timer'                 => $request->popup_timer,
            'number_of_questions_on_page' => $request->number_of_questions_on_page,
            'slug'                        => $request->slug,
            'note'                        => $request->note,
            'redirect_link'               => $request->redirect_link,
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
     *   path="/api/surveys/{id}",
     *   summary="Survey service",
     *   tags={"Survey"},
     *   @OA\Parameter(
     *      name="id",
     *      description="survey id",
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