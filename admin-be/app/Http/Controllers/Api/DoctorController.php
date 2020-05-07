<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Http\Resources\DoctorArResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\PostDataArResource;
use App\Http\Resources\PostDataResource;
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

class DoctorController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="doctors",
     *     path="/api/doctors",
     *     tags={"Doctor Pages"},
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
     *   @OA\Parameter(
     *      name="query_search",
     *      description="search in the doctors",
     *      required=false,
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['doctors']")
     * )
     */
    function doctors(Request $request)
    {
        $doctors = Doctor::where('status', 1)->with('translations')->paginate('10')->appends('lang',$request->input('lang'));
//        return $doctors;
        if ($request->query_search) {
            $q = $request->query_search;
            $doctors = Doctor::where('status', 1)->where(function ($query) use ($q) {
                $query->where('title_ar', 'like', '%' . $q . '%')
                    ->orWhere('title_en', 'like', '%' . $q . '%')
                    ->orWhere('slug_ar', 'like', '%' . $q . '%')
                    ->orWhere('slug_en', 'like', '%' . $q . '%')
                    ->orWhere('position', 'like', '%' . $q . '%')
                    ->orWhere('description', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('phone', 'like', '%' . $q . '%');
            })
                ->get();
        }
        if ($request->input('lang') == 'en') {
            return DoctorResource::collection($doctors);
        } elseif ($request->input('lang') == 'ar') {
            return DoctorArResource::collection($doctors);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="doctor",
     *     path="/api/doctor/{slug}",
     *     tags={"Doctor Pages"},
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
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         required=true,
     *         description="Slug",
     *         @OA\Schema(
     *              type="string",
     *              example="dr-eman-abdel-aziz",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['doctor']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function doctor($slug, Request $request)
    {
        $doctorWithSlug = Doctor::where('status', 1)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->with('translations')->first();
        if (!$doctorWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $doctor_ar = [
            "title" => $doctorWithSlug->title_ar,
            "slug" => $doctorWithSlug->slug_ar,
            "description" => $doctorWithSlug->description,
            "position" => $doctorWithSlug->position,
            "speciality" => $doctorWithSlug->speciality,
            "photo" => $doctorWithSlug->photo,
            "meta_keywords" => $doctorWithSlug->meta_keywords,
            "meta_description" => $doctorWithSlug->meta_description,
            "price" => $doctorWithSlug->price,
            "duration" => $doctorWithSlug->duration,

        ];
//        -------------------------En Doctors---------------------------------
        if ($doctorWithSlug->translations->where('column_name', 'description')->count() > 0) {
            $description_en = $doctorWithSlug->translations->where('column_name', 'description')->first()->value;
        } else {
            $description_en = $doctorWithSlug->description;
        }
        if ($doctorWithSlug->translations->where('column_name', 'position')->count() > 0) {
            $position_en = $doctorWithSlug->translations->where('column_name', 'position')->first()->value;
        } else {
            $position_en = $doctorWithSlug->position;
        }
        if ($doctorWithSlug->translations->where('column_name', 'speciality')->count() > 0) {
            $speciality_en = $doctorWithSlug->translations->where('column_name', 'speciality')->first()->value;
        } else {
            $speciality_en = $doctorWithSlug->speciality;
        }
        if ($doctorWithSlug->translations->where('column_name', 'meta_keywords')->count() > 0) {
            $meta_keywords_en = $doctorWithSlug->translations->where('column_name', 'meta_keywords')->first()->value;
        } else {
            $meta_keywords_en = $doctorWithSlug->meta_keywords;
        }
        if ($doctorWithSlug->translations->where('column_name', 'meta_description')->count() > 0) {
            $meta_description_en = $doctorWithSlug->translations->where('column_name', 'meta_description')->first()->value;
        } else {
            $meta_description_en = $doctorWithSlug->meta_description;
        }

        $doctor_en = [
            "title" => $doctorWithSlug->title_en,
            "slug" => $doctorWithSlug->slug_en,
            "description" => $description_en,
            "position" => $position_en,
            "speciality" => $speciality_en,
            "photo" => $doctorWithSlug->photo,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "price" => $doctorWithSlug->price,
            "duration" => $doctorWithSlug->duration,
        ];
//        -----------------------End--En Doctors---------------------------------
        if ($request->input('lang') == 'en') {
            $doctor = $doctor_en;
            return response()->json(compact(['doctor']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $doctor = $doctor_ar;
            return response()->json(compact(['doctor']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }


}
