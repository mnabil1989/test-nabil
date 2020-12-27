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
        $metaTags =SiteSetting::where('key',"like","%services.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){  
                $meta_tags['meta_'.explode("services.meta.",$metaTag->key)[1]]=$metaTag->value;
        }

        $openGraphFields =SiteSetting::where('key',"like","%services.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("services.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%services.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("services.twitter.",$cardField->key)[1]]= $value;
        }

        $data = Service::where('status', 1)->with('translations')->OrderBy('order','asc')->get();
        if ($request->input('lang') == 'en') {
            $data = ServiceResource::collection($data);
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = ServiceArResource::collection($data);
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
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
                $query->whereTranslation('slug', $slug);
                $query->orwhere('slug', $slug);
            })
            ->with('translations')->first();
        if (!$serviceWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $service_ar= [
            "id"=> $serviceWithSlug->id,
            "name" => $serviceWithSlug->title,
            "slug" => $serviceWithSlug->slug,
            "small_description" => $serviceWithSlug->small_description,
            "description" => $serviceWithSlug->description,
            "photo" => url('/storage/'.$serviceWithSlug->photo),
            "image_alt" => $serviceWithSlug->image_alt,
            "image_title" => $serviceWithSlug->image_title,
            "meta_keywords" => $serviceWithSlug->meta_keywords,
            "meta_description" => $serviceWithSlug->meta_description,
            "facebook_title"=> $serviceWithSlug->facebook_title,
            "facebook_description"=> $serviceWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$serviceWithSlug->facebook_image) ),
            "twitter_title"=> $serviceWithSlug->twitter_title,
            "twitter_description"=> $serviceWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$serviceWithSlug->twitter_image) )

        ];
        //        -------------------------En clinics---------------------------------
        if($serviceWithSlug->translations->where('column_name','title')->count()>0){
            $title_en = $serviceWithSlug->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $serviceWithSlug->title;
        }
        if($serviceWithSlug->translations->where('column_name','slug')->count()>0){
            $slug_en = $serviceWithSlug->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $serviceWithSlug->slug;
        }
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
            "id"=> $serviceWithSlug->id,
            "name" => $title_en,
            "slug" => $slug_en,
            "small_description" => $small_description_en,
            "description" => $description_en,
            "meta_keywords" => $meta_keywords_en,
            "photo" => url('/storage/'.$serviceWithSlug->photo),
            "image_alt" => $serviceWithSlug->image_alt,
            "image_title" => $serviceWithSlug->image_title,
            "meta_description" => $meta_description_en,
            "facebook_title"=> $serviceWithSlug->facebook_title,
            "facebook_description"=> $serviceWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$serviceWithSlug->facebook_image) ),
            "twitter_title"=> $serviceWithSlug->twitter_title,
            "twitter_description"=> $serviceWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$serviceWithSlug->twitter_image) )

        ];
//        -----------------------End--En clinics---------------------------------
     
        if ($request->input('lang') == 'en') {
            $data=$service_en;
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=$service_ar;
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }


}
