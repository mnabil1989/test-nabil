<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Http\Resources\ClinicArResource;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\ServiceArResource;
use App\Http\Resources\ServiceResource;
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

class ServiceController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="services",
     *     path="/api/services",
     *     tags={"Service Pages"},
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
     *      description="For Home Data as ['services']")
     * )
     */
    function services(Request $request)
    {

        $services = Service::where('status', 1)->with('translations')->get();
        if ($request->input('lang') == 'en') {
            $services = ServiceResource::collection($services);
            return response()->json(compact(['services']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $services = ServiceArResource::collection($services);
            return response()->json(compact(['services']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="service",
     *     path="/api/service/{slug}",
     *     tags={"Service Pages"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         required=true,
     *         description="Lang",
     *      @OA\Schema(
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
     *              example="وحدة-قسطرة-القلب",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['service']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function service($slug,Request $request)
    {
        $serviceWithSlug = Service::where('status', 1)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->with('translations')->first();
        if (!$serviceWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $service_ar= [
            "name" => $serviceWithSlug->name_ar,
            "slug" => $serviceWithSlug->slug_ar,
            "small_description" => $serviceWithSlug->small_description,
            "description" => $serviceWithSlug->description,
            "meta_keywords" => $serviceWithSlug->meta_keywords,
            "meta_description" => $serviceWithSlug->meta_description,
            "photo" => url('/storage/'.$serviceWithSlug->photo),

        ];
        //        -------------------------En clinics---------------------------------
        if($serviceWithSlug->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $serviceWithSlug->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $serviceWithSlug->small_description;
        }
        if($serviceWithSlug->translations->where('column_name','description')->count()>0){
            $description_en = $serviceWithSlug->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $serviceWithSlug->description;
        }

        if($serviceWithSlug->translations->where('column_name','meta_keywords')->count()>0){
            $meta_keywords_en = $serviceWithSlug->translations->where('column_name','meta_keywords')->first()->value;
        }
        else{
            $meta_keywords_en = $serviceWithSlug->meta_keywords;
        }
        if($serviceWithSlug->translations->where('column_name','meta_description')->count()>0){
            $meta_description_en = $serviceWithSlug->translations->where('column_name','meta_description')->first()->value;
        }
        else{
            $meta_description_en = $serviceWithSlug->meta_description;
        }

        $service_en=  [
            "name" => $serviceWithSlug->name_en,
            "slug" => $serviceWithSlug->slug_en,
            "small_description" => $small_description_en,
            "description" => $description_en,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "photo" => url('/storage/'.$serviceWithSlug->photo),

        ];
//        -----------------------End--En clinics---------------------------------
        if ($request->input('lang') == 'en') {
            $service=$service_en;
            return response()->json(compact(['service']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $service=$service_ar;
            return response()->json(compact(['service']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }


}
