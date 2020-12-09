<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Http\Resources\ClinicArResource;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\EventArResource;
use App\Http\Resources\EventResource;
use App\Post;
use App\Slider;
use App\MenuItem;
use App\Service;
use App\Tag;
use App\User;
use Carbon\Carbon;
use TCG\Voyager\Models\Category;
use App\Http\Resources\SliderResource as SliderResource;
use App\Http\Resources\MenuResource as MenuResource;
use App\Http\Controllers\Controller;
use App\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
class EventController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="events",
     *     path="/api/events",
     *     tags={"Event Pages"},
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
     *      description="For Home Data as ['event']")
     * )
     */
    function events(Request $request)
    {
        $now=Carbon::now()->toDateString();
        $Events = Event::where('status', 1)->where('start','>',$now)->where('end','>=',$now)->with('translations')->OrderBy('order','asc')->get();        

        $openGraphFields =SiteSetting::where('key',"like","%events.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("events.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%events.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("events.twitter.",$cardField->key)[1]]= $value;
        }

        $metaTags =SiteSetting::where('key',"like","%events.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){
                $meta_tags['meta_'.explode("events.meta.",$metaTag->key)[1]]=$metaTag->value;
        }

        if ($request->input('lang') == 'en') {
            $data = EventResource::collection($Events);
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = EventArResource::collection($Events);
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="event",
     *     path="/api/event/{slug}",
     *     tags={"Event Pages"},
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
     *     *   @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         required=true,
     *         description="Slug",
     *         @OA\Schema(
     *              type="string",
     *              example="cardiac-diseases-event",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['event']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function event($slug,Request $request)
    {
        $now=Carbon::now()->toDateTimeString();
        $eventWithSlug = Event::where('status', 1)
            ->where('start','>',$now)->where('end','>',$now)
            ->where(function ($query) use ($slug) {
                $query->whereTranslation('slug', $slug);
                $query->orwhere('slug', $slug);
            })
            ->with('translations')->first();
        if (!$eventWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $images=json_decode($eventWithSlug->images,true);                      
        $img_arr=array();
    if(!empty($images)){
        foreach($images as $img){              
         $img_arr[]=url('/storage/'.$img);                           
        }               
    }   

    $time = date('h:i A', strtotime($eventWithSlug->start));
$date=date('d/M/Y', strtotime($eventWithSlug->start));
$event_start_data=explode(' ',$eventWithSlug->start);
$event_format=$event_start_data[0].'T'.$event_start_data[1];

        $event_ar = [

            "id" => $eventWithSlug->id,
            "title" => $eventWithSlug->title,
            "slug" => $eventWithSlug->slug,
            "description" => $eventWithSlug->description,
            "small_description" => $eventWithSlug->small_description,

            "image"=>url('/storage/'.$eventWithSlug->img),
            "image_alt" => $eventWithSlug->image_alt,
            "image_title" => $eventWithSlug->image_title,
            "images"=>$img_arr,
            "stock"=>$eventWithSlug->stock,
            "start"=>$eventWithSlug->start,
            "end"=>$eventWithSlug->end,
        
            
            'date'=>$date,
            'time'=>$time,
            'event_format'=>$event_format,

            "map_x" => $eventWithSlug->map_x,
            "map_y" => $eventWithSlug->map_y,
            "meta_keywords" => $eventWithSlug->meta_keywords,
            "meta_description" => $eventWithSlug->meta_description,
            "facebook_title"=> $eventWithSlug->facebook_title,
            "facebook_description"=> $eventWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$eventWithSlug->facebook_image) ),
            "twitter_title"=> $eventWithSlug->twitter_title,
            "twitter_description"=> $eventWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$eventWithSlug->twitter_image) ),
            "facebook"=>$eventWithSlug->facebook,
            "twitter"=>$eventWithSlug->twitter,
            "youtube"=>$eventWithSlug->youtube,
            "whatsapp"=>$eventWithSlug->whatsapp,
            "instagram"=>$eventWithSlug->instagram, 

        ];
//        -------------------------En Event---------------------------------
       
        if($eventWithSlug->translations->where('column_name','title')->count()>0){
            $title_en = $eventWithSlug->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $eventWithSlug->title;
        }
        if($eventWithSlug->translations->where('column_name','slug')->count()>0){
            $slug_en = $eventWithSlug->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $eventWithSlug->slug;
        }

        if($eventWithSlug->translations->where('column_name','description')->count()>0){
            $description_en = $eventWithSlug->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $eventWithSlug->description;
        }
        if($eventWithSlug->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $eventWithSlug->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $eventWithSlug->small_description;
        }

        if($eventWithSlug->translations->where('column_name','meta_keywords')->count()>0){
            $meta_keywords_en = $eventWithSlug->translations->where('column_name','meta_keywords')->first()->value;
        }
        else{
            $meta_keywords_en = $eventWithSlug->meta_keywords;
        }
        if($eventWithSlug->translations->where('column_name','meta_description')->count()>0){
            $meta_description_en = $eventWithSlug->translations->where('column_name','meta_description')->first()->value;
        }
        else{
            $meta_description_en = $eventWithSlug->meta_description;
        }

        $event_en = [
            "id" => $eventWithSlug->id,
            "title" => $title_en,
            "slug" => $slug_en,
            "description" => $description_en,
            "small_description" => $small_description_en,
            "image"=>url('/storage/'.$eventWithSlug->img),
            "image_alt" => $eventWithSlug->image_alt,
            "image_title" => $eventWithSlug->image_title,
            "images"=>$img_arr,
            "stock"=>$eventWithSlug->stock,
            "start"=>$eventWithSlug->start,
            "end"=>$eventWithSlug->end,
            'date'=>$date,
            'time'=>$time,
            'event_format'=>$event_format,
            "map_x" => $eventWithSlug->map_x,
            "map_y" => $eventWithSlug->map_y,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "facebook_title"=> $eventWithSlug->facebook_title,
            "facebook_description"=> $eventWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$eventWithSlug->facebook_image) ),
            "twitter_title"=> $eventWithSlug->twitter_title,
            "twitter_description"=> $eventWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$eventWithSlug->twitter_image) ),
            "facebook"=>$eventWithSlug->facebook,
            "twitter"=>$eventWithSlug->twitter,
            "youtube"=>$eventWithSlug->youtube,
            "whatsapp"=>$eventWithSlug->whatsapp,
            "instagram"=>$eventWithSlug->instagram, 

        ];
//        -----------------------End--En Event---------------------------------
        if ($request->input('lang') == 'en') {
            $data=$event_en;
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=$event_ar;
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }
    function topevent(Request $request)
    {
        $now=Carbon::now()->toDateString();
        $Events = Event::where('status', 1)->where('start','>',$now)->where('end','>=',$now)->where('topevent','=',1)->with('translations')->first();

        if (!$Events) {
            $slug = ['error' => 'no result data'];
            return response()->json($slug, 404);
        }
        $openGraphFields =SiteSetting::where('key',"like","%events.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("events.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%events.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("events.twitter.",$cardField->key)[1]]= $value;
        }

        $metaTags =SiteSetting::where('key',"like","%events.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){
                $meta_tags['meta_'.explode("events.meta.",$metaTag->key)[1]]=$metaTag->value;
        }

        $images=json_decode($Events->images,true);                      
        $img_arr=array();
    if(!empty($images)){
        foreach($images as $img){              
         $img_arr[]=url('/storage/'.$img);                           
        }               
    }   
        $time = date('h:i A', strtotime($Events->start));
$date=date('d/M/Y', strtotime($Events->start));
$event_start_data=explode(' ',$Events->start);
$event_format=$event_start_data[0].'T'.$event_start_data[1];

        $event_ar = [

            "id" => $Events->id,
            "title" => $Events->title,
            "slug" => $Events->slug,
            "description" => $Events->description,
            "small_description" => $Events->small_description,

            "image"=>url('/storage/'.$Events->img),
            "image_alt" => $Events->image_alt,
            "image_title" => $Events->image_title,
            "images"=>$img_arr,
            "stock"=>$Events->stock,
            "start"=>$Events->start,
            "end"=>$Events->end,
        
            
            'date'=>$date,
            'time'=>$time,
            'event_format'=>$event_format,

            "map_x" => $Events->map_x,
            "map_y" => $Events->map_y,
            "meta_keywords" => $Events->meta_keywords,
            "meta_description" => $Events->meta_description,
            "facebook_title"=> $Events->facebook_title,
            "facebook_description"=> $Events->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$Events->facebook_image) ),
            "twitter_title"=> $Events->twitter_title,
            "twitter_description"=> $Events->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$Events->twitter_image) ),
            "facebook"=>$Events->facebook,
            "twitter"=>$Events->twitter,
            "youtube"=>$Events->youtube,
            "whatsapp"=>$Events->whatsapp,
            "instagram"=>$Events->instagram, 
            

        ];
//        -------------------------En Event---------------------------------
        if($Events->translations->where('column_name','title')->count()>0){
            $title_en = $Events->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $Events->title;
        } 
        if($Events->translations->where('column_name','slug')->count()>0){
            $slug_en = $Events->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $Events->slug;
        }     
        if($Events->translations->where('column_name','description')->count()>0){
            $description_en = $Events->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $Events->description;
        }
        if($Events->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $Events->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $Events->small_description;
        }

        if($Events->translations->where('column_name','meta_keywords')->count()>0){
            $meta_keywords_en = $Events->translations->where('column_name','meta_keywords')->first()->value;
        }
        else{
            $meta_keywords_en = $Events->meta_keywords;
        }
        if($Events->translations->where('column_name','meta_description')->count()>0){
            $meta_description_en = $Events->translations->where('column_name','meta_description')->first()->value;
        }
        else{
            $meta_description_en = $Events->meta_description;
        }

        $event_en = [
            "id" => $Events->id,
            "title" => $title_en,
            "slug" => $slug_en,
            "description" => $description_en,
            "small_description" => $small_description_en,
            "image"=>url('/storage/'.$Events->img),
            "image_alt" => $Events->image_alt,
            "image_title" => $Events->image_title,
            "images"=>$img_arr,
            "stock"=>$Events->stock,
            "start"=>$Events->start,
            "end"=>$Events->end,
            'date'=>$date,
            'time'=>$time,
            'event_format'=>$event_format,
            "map_x" => $Events->map_x,
            "map_y" => $Events->map_y,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "facebook_title"=> $Events->facebook_title,
            "facebook_description"=> $Events->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$Events->facebook_image) ),
            "twitter_title"=> $Events->twitter_title,
            "twitter_description"=> $Events->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$Events->twitter_image) ),
            "facebook"=>$Events->facebook,
            "twitter"=>$Events->twitter,
            "youtube"=>$Events->youtube,
            "whatsapp"=>$Events->whatsapp,
            "instagram"=>$Events->instagram,

        ];
//        -----------------------End--En Event---------------------------------
        if ($request->input('lang') == 'en') {
            $data=$event_en;
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=$event_ar;
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    

    }
    /**
     * @OA\Post(
     *   path="/api/event-user",
     *   summary="User Events",
     *   tags={"Event Pages"},
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       required={"event_id"},
     *       @OA\Property(
     *         property="event_id",
     *         type="string",
     *         example="1",
     *         description="required|numeric"
     *       )
     *     )
     *   ),
     *    @OA\Response(
     *     response=200,
     *     description="event successfully removed form your favorite list :(",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="success:",
     *         type="string",
     *         description="event successfully removed"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="event successfully added to your favorite list :)",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="success:",
     *         type="string",
     *         description="event successfully added "
     *       )
     *     )
     *   ),
     *     @OA\Response(
     *     response=404,
     *     description="user_not_found",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="user_not_found",
     *         type="string",
     *         description="user_not_found"
     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Validator",
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(
     *         property="Validator.",
     *         type="string",
     *         description="Validator"
     *       )
     *     )
     *    )
     *   )
     * )
     */
   function eventUserAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        $event_id=$request->get('event_id');
        $user = User::findOrFail($user->id);
        $event=Event::find($event_id);
        if($event==null){

            return response()->json('Event id is wrong -_-',404);
        }
        $isFavorite = $user->favorite_events()->where('event_id',$event_id)->count();

        if ($isFavorite == 0)
        {
            $user->favorite_events()->attach($event_id);
            return response()->json('Event successfully added to your favorite list :)',201);
        } else {
            $user->favorite_events()->detach($event_id);
            return response()->json('Event successfully removed form your favorite list :(',200);


        }

    }

}
