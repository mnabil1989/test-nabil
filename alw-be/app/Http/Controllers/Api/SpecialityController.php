<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Speciality;
use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Resources\DoctorArResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\SpecialityResource as MainResource;
use App\Http\Resources\SpecialityArResource;
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
    // public function index(Model $speciality)
    // {
    //     if(request()->query_search && request()->with_doctors)
    //     {
    //             $data = DB::table('specialities')
    //             ->join('doctors', function ($join) {
    //                 $join->on('specialities.id', '=', 'doctors.speciality_id');
    //             })
    //             ->join('translations', function ($join) {
    //                 $join->on('specialities.id', '=', 'translations.foreign_key')
    //                     ->where('table_name', 'specialities');
    //             })
    //             ->select('specialities.*', 'translations.value AS name_en', 'doctors.*')
    //             ->where('name', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('translations.value', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('title_ar', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('title_en', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('slug_ar', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('slug_en', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('gender', 'like', '%' . request()->query_search . '%')
    //             ->orWhere('speciality', 'like', '%' . request()->query_search . '%')
    //             ->get();
    //         return response()->json([
    //             'data' => $data,
    //             'url'  => url('/storage') . '/'
    //         ]);
    //     }

    //     if(request()->query_search)
    //         return MainResource::collection($speciality->where('name', 'like', '%' . request()->query_search . '%')->get());

    //     return MainResource::collection($speciality->all());
    // }
    public function index(Request $request)
    {
        if(empty($request->input('lang'))){
            return response()->json("please enter language you want", 200);
        }

        $doctors_arr=Speciality::all();
        if($request->input('lang')=='en'){
            $data=MainResource::collection($doctors_arr);
        }else{
            $data=SpecialityArResource::collection($doctors_arr);
        }
        return response()->json(compact(['data']), 200);

    }

    function doctors_by_speciality_id(Request $request,$id){
      
        if(empty($request->input('lang'))){
            return response()->json("please enter language you want", 200);
        }
        $data = DB::table('specialities')->select('specialities.id','specialities.name','image')->OrderBy("order","asc")->get();
        if(isset($id) && $id!='all'){    
            $data = DB::table('specialities')->where(['id'=>$id])->select('specialities.id','specialities.name','image')->OrderBy("order","asc")->get();
        }else{

        }
        foreach($data as $row){
                if($request->input('lang')=='en'){
                        $translations = DB::table('translations')->where(['table_name'=>'specialities','column_name'=>'name','foreign_key'=>$row->id])->first();
                        if(!empty($translations)) {
                            $row->name=$translations->value;
                        }
                        $doctors_arr=Doctor::where(['status'=>1,'speciality_id'=>$row->id])->with('translations')->OrderBy("order","asc")->paginate(1000)->appends('lang',$request->input('lang'));                                        
                        $row->doctors=DoctorResource::collection($doctors_arr);
                        $doctors_list=DoctorResource::collection($doctors_arr);
                        $links=[
                            "last"=>$doctors_list->lastPage(),
                            "prev"=>$doctors_list->previousPageUrl(),
                            "next"=>$doctors_list->nextPageUrl(),
                            "from"=>1,
                            "current_page"=> \URL::current(),
                            "per_page"=>9,
                            "total"=>$doctors_list->total(),
                            ];
                            $row->links=$links;
                }else{
                    $doctors_arr=Doctor::where(['status'=>1,'speciality_id'=>$row->id])->with('translations')->paginate(1000)->appends('lang',$request->input('lang'));
                    $row->doctors=DoctorArResource::collection($doctors_arr);
                    $doctors_list=DoctorResource::collection($doctors_arr);
                    $links=[
                        "last"=>$doctors_list->lastPage(),
                        "prev"=>$doctors_list->previousPageUrl(),
                        "next"=>$doctors_list->nextPageUrl(),
                        "from"=>1,
                        "current_page"=> \URL::current(),
                        "per_page"=>9,
                        "total"=>$doctors_list->total(),
                        ];//pagination

                        $row->links=$links;

                }                
                if($row->image!=''){
                    $row->image=url('storage/'.$row->image);
                }else{
                    $row->image='';
                }
                
            }
            return response()->json(compact(['data']), 200);

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
