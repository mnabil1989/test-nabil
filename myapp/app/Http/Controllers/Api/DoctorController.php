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
        $doctors = Doctor::where('status', 1)->with('translations')->OrderBy("order","asc")->paginate(8)->appends('lang',$request->input('lang'));
//        return $doctors;
        if ($request->query_search) {
            $q = $request->query_search;
            $doctors = Doctor::where('status', 1)->where(function ($query) use ($q) {
                $query->where('title', 'like', '%' . $q . '%')                    
                    ->orWhere('slug', 'like', '%' . $q . '%')
                    ->orWhere('description', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('phone', 'like', '%' . $q . '%');
            })
                ->get();
        }

        $metaTags =SiteSetting::where('key',"like","%doctors.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){  
                $meta_tags['meta_'.explode("doctors.meta.",$metaTag->key)[1]]=$metaTag->value;
        }

        $openGraphFields =SiteSetting::where('key',"like","%doctors.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("doctors.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%doctors.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("doctors.twitter.",$cardField->key)[1]]= $value;
        }

        if ($request->input('lang') == 'en') {
            $data=DoctorResource::collection($doctors);
            $links=[
            "last"=>$data->lastPage(),
            "prev"=>$data->previousPageUrl(),
            "next"=>$data->nextPageUrl()
            ];//pagination

            $meta=["current_page"=>$data->currentPage(),
            "from"=>1,
            "last_page"=>$data->lastPage(),
            "path"=> \URL::current(),
            "per_page"=>100,
            "to"=>$data->total(),
            "total"=>$data->perPage(),
            ];//pagination

            return response()->json(compact(['data','links','meta','meta_tags','open_graph','twitter_card']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=DoctorArResource::collection($doctors);
            $links=[
            "last"=>$data->lastPage(),
            "prev"=>$data->previousPageUrl(),
            "next"=>$data->nextPageUrl()
            ];//pagination

            $meta=["current_page"=>$data->currentPage(),
            "from"=>1,
            "last_page"=>$data->lastPage(),
            "path"=> \URL::current(),
            "per_page"=>$data->perPage(),
            "to"=>$data->total(),
            "total"=>$data->total(),
            ];//pagination

            return response()->json(compact(['data','links','meta','meta_tags','open_graph','twitter_card']), 200);

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
             $query->whereTranslation('slug', $slug);
            $query->orwhere('slug', $slug);

            })
            ->with('translations')->first();


        if (!$doctorWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $doctor_ar = [
            "id" => $doctorWithSlug->id,
            "title" => $doctorWithSlug->title,
            "slug" => $doctorWithSlug->slug,
            "small_description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $doctorWithSlug->small_description),
            "description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $doctorWithSlug->description),
            "position" => $doctorWithSlug->position,
            "speciality" => $doctorWithSlug->speciality,
            "photo" => $doctorWithSlug->photo,
            "image_alt" => $doctorWithSlug->image_alt,
            "image_title" => $doctorWithSlug->image_title,
            "price" => $doctorWithSlug->price,
            "duration" => $doctorWithSlug->duration,
            "meta_keywords" => $doctorWithSlug->meta_keywords,
            "meta_description" => $doctorWithSlug->meta_description,
            "facebook_title"=> $doctorWithSlug->facebook_title,
            "facebook_description"=> $doctorWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$doctorWithSlug->facebook_image) ),
            "twitter_title"=> $doctorWithSlug->twitter_title,
            "twitter_description"=> $doctorWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$doctorWithSlug->twitter_image) )
        ];
//        -------------------------En Doctors---------------------------------
        if ($doctorWithSlug->translations->where('column_name', 'title')->count() > 0) {
            $title_en = $doctorWithSlug->translations->where('column_name', 'title')->first()->value;
        } else {
            $title_en = $doctorWithSlug->title;
        }   
        if ($doctorWithSlug->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $doctorWithSlug->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $doctorWithSlug->slug;
        }    
        if ($doctorWithSlug->translations->where('column_name', 'description')->count() > 0) {
            $description_en = $doctorWithSlug->translations->where('column_name', 'description')->first()->value;
        } else {
            $description_en = $doctorWithSlug->description;
        }
        if ($doctorWithSlug->translations->where('column_name', 'small_description_en')->count() > 0) {
            $small_description_en = $doctorWithSlug->translations->where('column_name', 'small_description_en')->first()->value;
        } else {
            $small_description_en = $doctorWithSlug->small_description;
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
            "id" => $doctorWithSlug->id,
            "title" => $title_en,
            "slug" => $slug_en,
            "description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description_en),
            "small_description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $small_description_en),
            "position" => $position_en,
            "speciality" => $speciality_en,
            "photo" => $doctorWithSlug->photo,
            "image_alt" => $doctorWithSlug->image_alt,
            "image_title" => $doctorWithSlug->image_title,
            "price" => $doctorWithSlug->price,
            "duration" => $doctorWithSlug->duration,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "facebook_title"=> $doctorWithSlug->facebook_title,
            "facebook_description"=> $doctorWithSlug->facebook_description,
            "facebook_image"=> $doctorWithSlug->facebook_image,
            "twitter_title"=> $doctorWithSlug->twitter_title,
            "twitter_description"=> $doctorWithSlug->twitter_description,
            "twitter_image"=> $doctorWithSlug->twitter_image
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
