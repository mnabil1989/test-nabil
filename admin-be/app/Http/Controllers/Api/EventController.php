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
        $now=Carbon::now()->toDateTimeString();
        $Events = Event::where('status', 1)->where('start','<',$now)->where('end','>',$now)->with('translations')->get();
        if ($request->input('lang') == 'en') {
            $events = EventResource::collection($Events);
            return response()->json(compact(['events']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $events = EventArResource::collection($Events);
            return response()->json(compact(['events']), 200);
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
            ->where('start','<',$now)->where('end','>',$now)
            ->where(function ($query) use ($slug) {
                $query->where('slug_ar', $slug);
                $query->orwhere('slug_en', $slug);
            })
            ->with('translations')->first();
        if (!$eventWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $event_ar = [

            "id" => $eventWithSlug->id,
            "title" => $eventWithSlug->title_ar,
            "slug" => $eventWithSlug->slug_ar,
            "description" => $eventWithSlug->description,
            "image"=>url('/storage/'.$eventWithSlug->img),
            "images"=>$eventWithSlug->images,
            "stock"=>$eventWithSlug->stock,
            "start"=>$eventWithSlug->start,
            "end"=>$eventWithSlug->end,
            "map_x" => $eventWithSlug->map_x,
            "map_y" => $eventWithSlug->map_y,
            "meta_keywords" => $eventWithSlug->meta_keywords,
            "meta_description" => $eventWithSlug->meta_description,

        ];
//        -------------------------En Event---------------------------------
        if($eventWithSlug->translations->where('column_name','description')->count()>0){
            $description_en = $eventWithSlug->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $eventWithSlug->description;
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
            "title" => $eventWithSlug->title_en,
            "slug" => $eventWithSlug->slug_en,
            "description" => $description_en,
            "image"=>url('/storage/'.$eventWithSlug->img),
            "images"=>$eventWithSlug->images,
            "stock"=>$eventWithSlug->stock,
            "start"=>$eventWithSlug->start,
            "end"=>$eventWithSlug->end,
            "map_x" => $eventWithSlug->map_x,
            "map_y" => $eventWithSlug->map_y,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en

        ];
//        -----------------------End--En Event---------------------------------
        if ($request->input('lang') == 'en') {
            $event=$event_en;
            return response()->json(compact(['event']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $event=$event_ar;
            return response()->json(compact(['event']), 200);
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
