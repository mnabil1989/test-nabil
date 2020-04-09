<?php

namespace App\Http\Controllers\Api;

use App\AndalusiaGroup;
use App\Clinic;
use App\Dish;
use App\Doctor;
use App\Event;
use App\Http\Resources\AndalusiaGroupArResource;
use App\Http\Resources\AndalusiaGroupResource;
use App\Http\Resources\CategoryArResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ClinicArResource;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\Dishes as DishesResource;
use App\Http\Resources\DishesAr;
use App\Http\Resources\DoctorArResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\EventArResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\MenuItemsArResource;
use App\Http\Resources\MenuItemsResource;
use App\Http\Resources\PostArResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\ServiceArResource;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SliderArResource;
use App\Post;
use App\SiteSetting;
use App\Slider;
use App\MenuItem;
use App\Service;
use App\Http\Resources\SliderResource as SliderResource;
use App\Http\Resources\MenuResource as MenuResource;
use App\Http\Controllers\Controller;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class HomeController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="getRepositoriesByOwner",
     *     path="/api/home",
     *     tags={"Home Page"},
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
     *      description="For Home Data as ['settings', 'menus', 'sliders', 'clinics', 'services', 'doctors', 'posts','events','andlusia_group']")
     * )
     */

    function home(Request $request)
    {
     $SEO = [
            'title-meta' => [
                'Title Template' => $this->setting('title-meta.Title_template'),
                'Title Separator' => $this->setting('title-meta.Title_Separator'),
                'Meta Description Template' => $this->setting('title-meta.meta_description_template')
            ],
            'Social' => [
                'Facebook Page URL' => $this->setting('social.Facebook_page_uRL'),
                'Twitter Username' => $this->setting('social.Twitter_username'),
                'Instagram URL' => $this->setting('social.Instagram_uRL'),
                'LinkedIn URL' => $this->setting('social.LinkedIn_uRL'),
                'YouTube URL' => $this->setting('social.YouTube_uRL')
            ],
            'open-graph' => [
                'title' => $this->setting('open-graph.title'),
                'description' => $this->setting('open-graph.description'),
                'url' => $this->setting('open-graph.url'),
                'image' => $this->setting('open-graph.image'),
                'image:secure_url' => $this->setting('open-graph.image:secure_url')

            ],

            'twitter' => [
                'cart' => $this->setting('twitter.cart'),
                'title' => $this->setting('twitter.title'),
                'description' => $this->setting('twitter.description'),
                'site' => $this->setting('twitter.site'),
                'image' => $this->setting('twitter.image'),

            ]
        ];
        $now = Carbon::now()->toDateTimeString();
        if ($request->input('lang') == 'en') {
            $home = [
                "seo" => $SEO,
                "categories" => CategoryResource::collection(Category::with('translations')->get()),
                "menu" => MenuItemsResource::collection(MenuItem::where('menu_id', 2)->where('parent_id', null)->with('translations')->orderBy('order')->get()),
                "sliders" => SliderResource::collection(Slider::where('status', 1)->with('translations')->get()),
                "events" => EventResource::collection(Event::where('status', 1)->where('start', '<', $now)->where('end', '>', $now)->with('translations')->get()),
                "doctors" => DoctorResource::collection(Doctor::where('status', 1)->with('translations')->get()),
                "services" => ServiceResource::collection(Service::where('status', 1)->with('translations')->get()),
                "clinics" => ClinicResource::collection(Clinic::where('status', 1)->with('translations')->get()),
                "categories" => CategoryResource::collection(\App\Category::with('translations')->get()),
                "posts" => PostResource::collection(Post::where('status', 1)->published()->withCount('user')->with('translations')->get()),
                "andalusiagroups" => AndalusiaGroupResource::collection(AndalusiaGroup::where('status', 1)->with('translations')->get()),


            ];
            return response()->json(compact(['home']), 200);
        } elseif ($request->input('lang') == 'ar') {

            $home = array(
                "seo" => $SEO,
                "categories" => CategoryArResource::collection(Category::with('translations')->get()),
                "menu" => MenuItemsArResource::collection(MenuItem::where('menu_id', 2)->where('parent_id', null)->with('translations')->orderBy('order')->get()),
                "sliders" => SliderArResource::collection(Slider::where('status', 1)->with('translations')->get()),
                "events" => EventArResource::collection(Event::where('status', 1)->where('start', '<', $now)->where('end', '>', $now)->with('translations')->get()),
                "doctors" => DoctorArResource::collection(Doctor::where('status', 1)->with('translations')->get()),
                "services" => ServiceArResource::collection(Service::where('status', 1)->with('translations')->get()),
                "clinics" => ClinicArResource::collection(Clinic::where('status', 1)->with('translations')->get()),
                "categories" => CategoryResource::collection(\App\Category::with('translations')->get()),
                "posts" => PostArResource::collection(Post::where('status', 1)->published()->withCount('user')->with('translations')->get()),
                "andalusiagroups" => AndalusiaGroupArResource::collection(AndalusiaGroup::where('status', 1)->with('translations')->get()),

            );
            return response()->json(compact(['home']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    function setting($key)
    {
        $Setting = SiteSetting::where('key', $key)->first();
        return $Setting->value;
    }


}
