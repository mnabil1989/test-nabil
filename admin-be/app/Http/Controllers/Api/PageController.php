<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Http\Resources\PageArResource;
use App\Http\Resources\PageResource;
use App\Http\Resources\DoctorArResource;
use App\Http\Resources\DoctorResource;
use App\Page;
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

class PageController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="clinics",
     *     path="/api/pages",
     *     tags={"Pages"},
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
     *      description="For Home Data as ['pages']")
     * )
     */
    function pages(Request $request)
    {
        $pages = Page::where('status', 'ACTIVE')->with('translations')->get();

        if ($request->input('lang') == 'en') {
            $pages = PageResource::collection($pages);
            return response()->json(compact(['pages']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $pages = PageArResource::collection($pages);
            return response()->json(compact(['pages']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="page",
     *     path="/api/Page/{slug}",
     *     tags={"Pages"},
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
     *    @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         required=true,
     *         description="Slug",
     *         @OA\Schema(
     *              type="string",
     *              example="hello-world",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For  Data as ['page']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function page($slug,Request $request)
    {
        $pageWithSlug = Page::where(function ($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
            $query->orwhere('slug', $slug);
            })
            ->with('translations')->first();
        if (!$pageWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $page_ar = [
            "title" => $pageWithSlug->title,
            "slug" => $pageWithSlug->slug,
            "excerpt" => $pageWithSlug->excerpt,
            "body" => $pageWithSlug->body,
            "image" => url('/storage/'.$pageWithSlug->image),
            "meta_description" => $pageWithSlug->meta_description,
            "meta_keywords" => $pageWithSlug->meta_keywords

        ];
//        -------------------------En pages---------------------------------
        if ($pageWithSlug->translations->where('column_name', 'title')->count() > 0) {
            $title_en = $pageWithSlug->translations->where('column_name', 'title')->first()->value;
        } else {
            $title_en = $pageWithSlug->title;
        }
        if ($pageWithSlug->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $pageWithSlug->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $pageWithSlug->slug;
        }
        if ($pageWithSlug->translations->where('column_name', 'body')->count() > 0) {
            $body_en = $pageWithSlug->translations->where('column_name', 'body')->first()->value;
        } else {
            $body_en = $pageWithSlug->body;
        }

        $page_en = [
            "title" => $title_en,
            "slug" => $slug_en,
            "excerpt" => $pageWithSlug->excerpt,
            "body" => $body_en,
            "image" => url('/storage/'.$pageWithSlug->image),
            "meta_description" => $pageWithSlug->meta_description,
            "meta_keywords" => $pageWithSlug->meta_keywords

        ];
//        -----------------------End--En clinics---------------------------------
        if ($request->input('lang') == 'en') {
            $page=$page_en;
            return response()->json(compact(['page']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $page=$page_ar;
            return response()->json(compact(['page']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }


}
