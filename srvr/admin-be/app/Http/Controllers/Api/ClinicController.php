<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Http\Resources\ClinicArResource;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\DoctorArResource;
use App\Http\Resources\DoctorResource;
use App\Post;
use App\Slider;
use App\MenuItem;
use App\Service;
use App\Tag;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use App\Http\Resources\SliderResource as SliderResource;
use App\Http\Resources\MenuResource as MenuResource;
use App\Http\Controllers\Controller;
use App\SiteSetting;

class ClinicController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="clinics",
     *     path="/api/clinics",
     *     tags={"Clinic Pages"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         required=true,
     *         description="Lang",
     *         @OA\Schema(
     *              type="string",
     *              example="ar",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['clinics']")
     * )
     */
    function clinics(Request $request)
    {
        $clinics = Clinic::where('status', 1)->with('translations')->get();

        if ($request->input('lang') == 'en') {
            $clinics = ClinicResource::collection($clinics);
            return response()->json(compact(['clinics']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $clinics = ClinicArResource::collection($clinics);
            return response()->json(compact(['clinics']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="clinic",
     *     path="/api/clinic/{slug}",
     *     tags={"Clinic Pages"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         required=true,
     *         description="Lang",
     *         @OA\Schema(
     *              type="string",
     *              example="ar",
     *         )
     *      ),
     *    @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         required=true,
     *         description="Slug",
     *         @OA\Schema(
     *              type="string",
     *              example="cardiac-diseases-clinic",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['clinic']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function clinic($slug,Request $request)
    {
        $clinicWithSlug = Clinic::where('status', 1)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->with('translations')->first();
        if (!$clinicWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $clinic_ar = [
            "name" => $clinicWithSlug->name_ar,
            "slug" => $clinicWithSlug->slug_ar,
            "small_description" => $clinicWithSlug->small_description,
            "description" => $clinicWithSlug->description,
            "address" =>$clinicWithSlug->address,
            "phone" => $clinicWithSlug->phone,
            "email" => $clinicWithSlug->email,
            "map_x" => $clinicWithSlug->map_x,
            "map_y" => $clinicWithSlug->map_y,
            "meta_keywords" => $clinicWithSlug->meta_keywords,
            "meta_description" => $clinicWithSlug->meta_description,
            "photo" => url('/storage/'.$clinicWithSlug->photo),

        ];
//        -------------------------En clinics---------------------------------
        if($clinicWithSlug->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $clinicWithSlug->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $clinicWithSlug->small_description;
        }
        if($clinicWithSlug->translations->where('column_name','description')->count()>0){
            $description_en = $clinicWithSlug->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $clinicWithSlug->description;
        }
        if($clinicWithSlug->translations->where('column_name','address')->count()>0){
            $address_en = $clinicWithSlug->translations->where('column_name','address')->first()->value;
        }
        else{
            $address_en = $clinicWithSlug->description;
        }

        if($clinicWithSlug->translations->where('column_name','meta_keywords')->count()>0){
            $meta_keywords_en = $clinicWithSlug->translations->where('column_name','meta_keywords')->first()->value;
        }
        else{
            $meta_keywords_en = $clinicWithSlug->meta_keywords;
        }
        if($clinicWithSlug->translations->where('column_name','meta_description')->count()>0){
            $meta_description_en = $clinicWithSlug->translations->where('column_name','meta_description')->first()->value;
        }
        else{
            $meta_description_en = $clinicWithSlug->meta_description;
        }

        $clinic_en = [
            "name" => $clinicWithSlug->name_en,
            "slug" => $clinicWithSlug->slug_en,
            "small_description" => $small_description_en,
            "description" => $description_en,
            "address" => $address_en,
            "phone" => $clinicWithSlug->phone,
            "email" => $clinicWithSlug->email,
            "map_x" => $clinicWithSlug->map_x,
            "map_y" => $clinicWithSlug->map_y,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "photo" => url('/storage/'.$clinicWithSlug->photo),

        ];
//        -----------------------End--En clinics---------------------------------
        if ($request->input('lang') == 'en') {
            $clinic=$clinic_en;
            return response()->json(compact(['clinic']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $clinic=$clinic_ar;
            return response()->json(compact(['clinic']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }


}
