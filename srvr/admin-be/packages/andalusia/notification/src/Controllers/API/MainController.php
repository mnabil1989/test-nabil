<?php

namespace Andalusia\Notification\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Notification\Requests\MainRequest;
use Andalusia\Notification\Resources\MainResource;
use Andalusia\Notification\Repositories\RepositoryInterface;

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
     *   path="/api/notifications",
     *   summary="Notification service",
     *   tags={"Notification"},
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
     *   path="/api/notifications",
     *   summary="Notification service",
     *   tags={"Notification"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"link", "message", "type"},
     *       @OA\Property(
     *         property="image",
     *         type="file",
     *         example="image.png",
     *         description="an image"
     *       ),
     *       @OA\Property(
     *         property="thumbnail",
     *         type="file",
     *         example="thumbnail.png",
     *         description="a thumbnail"
     *       ),
     *       @OA\Property(
     *         property="link",
     *         type="string",
     *         example="http://www.andalusiagroup.net/",
     *         description="the link to the notification"
     *       ),
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="special offer for you!",
     *         description="the message that will be displayed to the user"
     *       ),
     *       @OA\Property(
     *         property="type",
     *         type="string",
     *         enum={"normal", "offer"},
     *         example="offer",
     *         description="is this notification is just a normal notification or it's an offer notification?"
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
            'image'     => $request->image,
            'thumbnail' => $request->thumbnail,
            'link'      => $request->link,
            'message'   => $request->message,
            'type'      => $request->type
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/notifications/{id}",
     *   summary="Notification service",
     *   tags={"Notification"},
     *   @OA\Parameter(
     *      name="id",
     *      description="notification id",
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
     *   path="/api/notifications/{id}",
     *   summary="Notification service",
     *   tags={"Notification"},
     *   @OA\Parameter(
     *      name="id",
     *      description="notification id",
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
     *       required={},
     *       @OA\Property(
     *         property="image",
     *         type="file",
     *         example="image.png",
     *         description="an image"
     *       ),
     *       @OA\Property(
     *         property="thumbnail",
     *         type="file",
     *         example="thumbnail.png",
     *         description="a thumbnail"
     *       ),
     *       @OA\Property(
     *         property="link",
     *         type="string",
     *         example="http://www.andalusiagroup.net/",
     *         description="the link to the notification"
     *       ),
     *       @OA\Property(
     *         property="message",
     *         type="string",
     *         example="special offer for you!",
     *         description="the message that will be displayed to the user"
     *       ),
     *       @OA\Property(
     *         property="type",
     *         type="string",
     *         enum={"normal", "offer"},
     *         example="offer",
     *         description="is this notification is just a normal notification or it's an offer notification?"
     *       ),
     *       @OA\Property(
     *         property="is_read",
     *         type="boolean",
     *         enum={1, true},
     *         example="1",
     *         description="mark the notification as read ... note that: to mark the notification as read you have to send this property only and don't include other properties"
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
            'image'     => $request->image,
            'thumbnail' => $request->thumbnail,
            'link'      => $request->link,
            'message'   => $request->message,
            'type'      => $request->type,
            'is_read'   => $request->is_read
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
     *   path="/api/notifications/{id}",
     *   summary="Notification service",
     *   tags={"Notification"},
     *   @OA\Parameter(
     *      name="id",
     *      description="notification id",
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
