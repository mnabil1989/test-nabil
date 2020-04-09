<?php

namespace Andalusia\Booking\Controllers\API;

use App\Http\Controllers\Controller;
use Andalusia\Booking\Requests\AppointmentRequest as MainRequest;
use Andalusia\Booking\Resources\AppointmentResource as MainResource;
use Andalusia\Booking\Repositories\AppointmentRepositoryInterface as RepositoryInterface;

class AppointmentController extends Controller
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
     *   path="/api/appointments",
     *   summary="Appointment service",
     *   tags={"Appointment"},
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
     *      name="doctors",
     *      description="to show the doctor details in the appointment object",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="boolean"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="clinics",
     *      description="to show the clinic details in the appointment object",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="boolean"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="doctor_id",
     *      description="to get the appointments related to the doctor (through doctor id)",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="clinic_id",
     *      description="to get the appointments related to the clinic (through clinic id)",
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
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/appointments/{id}",
     *   summary="Appointment service",
     *   tags={"Appointment"},
     *   @OA\Parameter(
     *      name="id",
     *      description="appointment id",
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
}
