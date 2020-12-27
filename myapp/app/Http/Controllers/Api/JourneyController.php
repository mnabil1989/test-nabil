<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Journey;

use App\Http\Resources\JourneyResource;
use App\Http\Resources\JourneyArResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class JourneyController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="partners",
     *     path="/api/partners"   
     */
    function journeys(Request $request)
    {
        $data = Journey::OrderBy('order','asc')->get();
        if ($request->input('lang') == 'en') {
            $data = JourneyResource::collection($data);
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = JourneyArResource::collection($data);
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }


    }
    function journey($slug,Request $request)
    {
 
            $journeyWithSlug = Journey::where(function ($query) use ($slug) {
             $query->whereTranslation('slug', $slug);
            $query->orwhere('slug', $slug);

            })
            ->with('translations')->first();


        if (!$journeyWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $journey_ar = [
            "id" => $journeyWithSlug->id,
            "title" => $journeyWithSlug->title,
            "slug" => $journeyWithSlug->slug,
            "description" => $journeyWithSlug->description,
            "small_description" => $journeyWithSlug->small_description,
            "image"=>url('/storage/'.$journeyWithSlug->image),
            "image_alt" => $journeyWithSlug->image_alt,
            "image_title" => $journeyWithSlug->image_title,
        ];
//        -------------------------En Event---------------------------------
        if($journeyWithSlug->translations->where('column_name','title')->count()>0){
            $title_en = $journeyWithSlug->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $journeyWithSlug->title;
        }
        if($journeyWithSlug->translations->where('column_name','slug')->count()>0){
            $slug_en = $journeyWithSlug->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $journeyWithSlug->slug;
        }
        if($journeyWithSlug->translations->where('column_name','description')->count()>0){
            $description_en = $journeyWithSlug->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $journeyWithSlug->description;
        }
        if($journeyWithSlug->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $journeyWithSlug->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $journeyWithSlug->small_description;
        }

        $journey_en = [
            "id" => $journeyWithSlug->id,
            "title" => $title_en,
            "slug" => $slug_en,
            "description" => $description_en,
            "small_description" => $small_description_en,
            "image"=>url('/storage/'.$journeyWithSlug->image),
            "image_alt" => $journeyWithSlug->image_alt,
            "image_title" => $journeyWithSlug->image_title,                
        ];
//        -----------------------End--En Event---------------------------------
        if ($request->input('lang') == 'en') {
            $data=$journey_en;
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=$journey_ar;
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }

    }

          
}

