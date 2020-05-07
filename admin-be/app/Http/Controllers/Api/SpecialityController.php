<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Speciality as Model;
use App\Http\Resources\SpecialityResource as MainResource;
use Illuminate\Support\Facades\DB;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Model $speciality
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/specialities",
     *   summary="Speciality service",
     *   tags={"Speciality"},
     *   @OA\Parameter(
     *      name="query_search",
     *      description="search in the speciality",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="with_doctors",
     *      description="to search in the specialities and the doctors as well",
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
    public function index(Model $speciality)
    {
        if(request()->query_search && request()->with_doctors)
        {
//            return DB::table('specialities')
//                ->join('doctors', 'specialities.id', '=', 'doctors.speciality_id')
//                ->join('translations', 'specialities.id', '=', 'translations.foreign_key')
//                    ->where('table_name', 'specialities')
//                    ->where('column_name', 'name')
//                    ->limit(1)
//                ->select('specialities.*', 'translations.value AS name_en', 'doctors.title_ar', 'doctors.title_en', 'doctors.slug_ar', 'doctors.slug_en', 'doctors.speciality')
//                ->where('name', 'like', '%' . request()->query_search . '%')
//                ->orWhere('translations.value', 'like', '%' . request()->query_search . '%')
//                ->orWhere('title_ar', 'like', '%' . request()->query_search . '%')
//                ->orWhere('title_en', 'like', '%' . request()->query_search . '%')
//                ->orWhere('slug_ar', 'like', '%' . request()->query_search . '%')
//                ->orWhere('slug_en', 'like', '%' . request()->query_search . '%')
//                ->orWhere('speciality', 'like', '%' . request()->query_search . '%')
//                ->get();

            $data = DB::table('specialities')
                ->join('doctors', function ($join) {
                    $join->on('specialities.id', '=', 'doctors.speciality_id');
                })
                ->join('translations', function ($join) {
                    $join->on('specialities.id', '=', 'translations.foreign_key')
                        ->where('table_name', 'specialities');
                })
                ->select('specialities.*', 'translations.value AS name_en', 'doctors.*')
                ->where('name', 'like', '%' . request()->query_search . '%')
                ->orWhere('translations.value', 'like', '%' . request()->query_search . '%')
                ->orWhere('title_ar', 'like', '%' . request()->query_search . '%')
                ->orWhere('title_en', 'like', '%' . request()->query_search . '%')
                ->orWhere('slug_ar', 'like', '%' . request()->query_search . '%')
                ->orWhere('slug_en', 'like', '%' . request()->query_search . '%')
                ->orWhere('gender', 'like', '%' . request()->query_search . '%')
                ->orWhere('speciality', 'like', '%' . request()->query_search . '%')
                ->get();
            return response()->json([
                'data' => $data,
                'url'  => url('/storage') . '/'
            ]);
        }

        if(request()->query_search)
            return MainResource::collection($speciality->where('name', 'like', '%' . request()->query_search . '%')->get());

        return MainResource::collection($speciality->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Model $speciality
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *   path="/api/specialities/{id}",
     *   summary="Speciality service",
     *   tags={"Speciality"},
     *   @OA\Parameter(
     *      name="id",
     *      description="speciality id",
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
    public function show(Model $speciality)
    {
        return new MainResource($speciality);
    }
}
