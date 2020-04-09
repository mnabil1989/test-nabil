<?php

namespace Andalusia\Booking\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Booking\Requests\BookingRequest as MainRequest;
use Andalusia\Booking\Resources\BookingResource as MainResource;
use Andalusia\Booking\Repositories\BookingRepositoryInterface as RepositoryInterface;

class BookingController extends Controller
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
     *   path="/api/bookings",
     *   summary="Booking service",
     *   tags={"Booking"},
     *   @OA\Parameter(
     *      name="paginate",
     *      description="pagination ... minimum is 1 & maximum is 1000",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="calender",
     *      description="to get the data as in the fullcalendar.io",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="boolean"
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
        $allow_pagination = $request->calender ? false : true;
        return MainResource::collection($this->repo->all($request->paginate ?? 3, $allow_pagination));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/api/bookings",
     *   summary="Booking service",
     *   tags={"Booking"},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"appointment_id", "date"},
     *       @OA\Property(
     *         property="appointment_id",
     *         type="integer",
     *         example="1",
     *         description="the appointment id"
     *       ),
     *       @OA\Property(
     *         property="patient_name",
     *         type="string",
     *         example="Khaled",
     *         description="patient name ... required if the use is not authenticated"
     *       ),
     *       @OA\Property(
     *         property="date",
     *         type="string",
     *         example="2020-04-09",
     *         description="the booking date ... date format is: Y-m-d"
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
            'appointment_id' => $request->appointment_id,
            'user_id'        => null,
            'patient_name'   => $request->patient_name,
            'date'           => $request->date,
            'notes'          => null,
            'phones'         => $request->phones
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/bookings/{id}",
     *   summary="Booking service",
     *   tags={"Booking"},
     *   @OA\Parameter(
     *      name="id",
     *      description="booking id",
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *   path="/api/bookings/{id}",
     *   summary="Booking service",
     *   tags={"Booking"},
     *   @OA\Parameter(
     *      name="id",
     *      description="booking id",
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
