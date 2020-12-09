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
            "description" => $this->strip_word_html($serviceWithSlug->description),
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
            "description" => $this->strip_word_html($description_en),
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
