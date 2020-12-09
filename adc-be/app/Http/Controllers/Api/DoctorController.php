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
    function all_doctors(Request $request)
    {
        $doctors = Doctor::where('status', 1)->with('translations')->OrderBy("order","asc")->paginate(9)->appends('lang',$request->input('lang'));
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
            "small_description" =>$doctorWithSlug->small_description,
            "description" => $this->strip_word_html($doctorWithSlug->description),
            "position" => $doctorWithSlug->position,
            "speciality" => $doctorWithSlug->speciality,
            "address" => isset($doctorWithSlug->address)?$doctorWithSlug->address:'',
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
        if ($doctorWithSlug->translations->where('column_name', 'address')->count() > 0) {
            $address_en = $doctorWithSlug->translations->where('column_name', 'address')->first()->value;
        } else {
            $address_en = $doctorWithSlug->address;
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
            "small_description" =>$small_description_en,
            "description" => $this->strip_word_html($description_en),
            "position" => $position_en,
            "speciality" => $speciality_en,
            "address"=>$address_en,
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
    public function strip_word_html($text, $allowed_tags = '<a><ul><li><b><i><sup><sub><em><strong><u><br><br/><br /><p><h2><h3><h4><h5><h6><img>')
    {
        mb_regex_encoding('UTF-8');
        //replace MS special characters first
       $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
        $replace = array('\'', '\'', '"', '"', '-');
       $text = preg_replace($search, $replace, $text);
        //make sure _all_ html entities are converted to the plain ascii equivalents - it appears
        //in some MS headers, some html entities are encoded and some aren't
        //$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        //try to strip out any C style comments first, since these, embedded in html comments, seem to
        //prevent strip_tags from removing html comments (MS Word introduced combination)
       if(mb_stripos($text, '/*') !== FALSE){
            $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
        }
        //introduce a space into any arithmetic expressions that could be caught by strip_tags so that they won't be
        //'<1' becomes '< 1'(note: somewhat application specific)
        $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
        $text = strip_tags($text, $allowed_tags);
        //eliminate extraneous whitespace from start and end of line, or anywhere there are two or more spaces, convert it to one
        $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
        //strip out inline css and simplify style tags
        $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
        $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>');
        $text = preg_replace($search, $replace, $text);
        //on some of the ?newer MS Word exports, where you get conditionals of the form 'if gte mso 9', etc., it appears
        //that whatever is in one of the html comments prevents strip_tags from eradicating the html comment that contains
        //some MS Style Definitions - this last bit gets rid of any leftover comments */
        $num_matches = preg_match_all("/\<!--/u", $text, $matches);
        if($num_matches){
            $text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
    }
        $text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $text);
    return $text;
    }

}
