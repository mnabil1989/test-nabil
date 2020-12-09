<?php

namespace Andalusia\Survey\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Survey\Requests\UserInfoRequest as MainRequest;
use Andalusia\Survey\Resources\UserInfoResource as MainResource;
use Andalusia\Survey\Repositories\UserInfoRepositoryInterface as RepositoryInterface;

class UserInfoController extends Controller
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
     *   path="/api/surveys_users_info",
     *   summary="Survey User Info service",
     *   tags={"Survey User Info"},
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
     *   path="/api/surveys_users_info",
     *   summary="Survey User Info service",
     *   tags={"Survey User Info"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"survey_id", "email", "phone"},
     *       @OA\Property(
     *         property="survey_id",
     *         type="integer",
     *         example="1",
     *         description="survey id"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="test@example.com",
     *         description="the email of the user"
     *       ),
     *       @OA\Property(
     *         property="phone",
     *         type="integer",
     *         example="0123456789",
     *         description="the phone number of the user"
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
            'email'     => $request->email,
            'phone'     => $request->phone
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/surveys_users_info/{id}",
     *   summary="Survey User Info service",
     *   tags={"Survey User Info"},
     *   @OA\Parameter(
     *      name="id",
     *      description="user info id",
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
     *   path="/api/surveys_users_info",
     *   summary="Survey User Info service",
     *   tags={"Survey User Info"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"survey_id", "email", "phone", "is_survey_closed"},
     *       @OA\Property(
     *         property="survey_id",
     *         type="integer",
     *         example="1",
     *         description="survey id"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="string",
     *         example="test@example.com",
     *         description="the email of the user"
     *       ),
     *       @OA\Property(
     *         property="phone",
     *         type="integer",
     *         example="0123456789",
     *         description="the phone number of the user"
     *       ),
     *       @OA\Property(
     *         property="is_survey_closed",
     *         type="boolean",
     *         example="true",
     *         description="to specify if the user closed the survey without answers or not"
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
            'survey_id'        => $request->survey_id,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'is_survey_closed' => $request->is_survey_closed ?? false
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
     *   path="/api/surveys_users_info/{id}",
     *   summary="Survey User Info service",
     *   tags={"Survey User Info"},
     *   @OA\Parameter(
     *      name="id",
     *      description="user info id",
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
