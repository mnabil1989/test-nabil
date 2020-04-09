<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Http\Resources\CategoryArResource;
use App\Http\Resources\CategoryPostArResource;
use App\Http\Resources\CategoryPostResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MenuCategory as MenuCategoryResources;
use App\Http\Resources\MenuCategoryAr as MenuCategoryArResources;
use App\Http\Resources\PostArResource;
use App\Http\Resources\PostDataArResource;
use App\Http\Resources\PostDataResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagArResource;
use App\Http\Resources\TagPostArResource;
use App\Http\Resources\TagPostResource;
use App\Http\Resources\TagResource;
use App\MenuCategory;
use App\Post;
use App\Slider;
use App\MenuItem;
use App\Service;
use App\Tag;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\SliderResource as SliderResource;
use App\Http\Resources\MenuResource as MenuResource;
use App\Http\Controllers\Controller;
use App\SiteSetting;

class PostController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="posts",
     *     path="/api/posts",
     *     tags={"Post Pages"},
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
     *      description="For Home Data as ['posts']")
     * )
     */
    function posts(Request $request)
    {
        if ($request->input('lang') == 'en') {
            $posts = PostDataResource::collection(Post::with('category')->with('tag')->withcount('user')->with('translations')->get());
            return response()->json(compact(['posts']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $posts = PostDataArResource::collection(Post::with('category')->with('tag')->withcount('user')->with('translations')->get());
            return response()->json(compact(['posts']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="post",
     *     path="/api/post/{slug}",
     *     tags={"Post Pages"},
     * @OA\Parameter(
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
     *              example="cardiac-diseases-clinic",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['post']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function post($slug, Request $request)
    {
        $post = Post::where(function ($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
            $query->orwhere('slug', $slug);
        })->with('category')->with('tag')->withcount('user')->with('translations')->first();
        if (!$post) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $post_ar = [
            "id" => $post->id,
            "title" => $post->title,
            "image" => env('APP_URL') . '/storage/' . $post->image,
            "excerpt" => $post->excerpt,
            "body" => $post->body,
            "slug" => $post->slug,
            "seo_title" => $post->seo_title,
            "meta_description" => $post->meta_description,
            "meta_keywords" => $post->meta_keywords,
            "fav-count" => $post->user_count,
            "category" => [
                "name" => $post->category->name,
                "slug" => $post->category->slug,
            ],
            "tag" => TagArResource::collection($post->tag)];
//-------------------------------Post En--------------------------------------------
        if ($post->translations->where('column_name', 'title')->count() > 0) {
            $title_en = $post->translations->where('column_name', 'title')->first()->value;
        } else {
            $title_en = $post->title;
        }
        if ($post->translations->where('column_name', 'seo_title')->count() > 0) {
            $seo_title_en = $post->translations->where('column_name', 'seo_title')->first()->value;
        } else {
            $seo_title_en = $post->seo_title;
        }
        if ($post->translations->where('column_name', 'excerpt')->count() > 0) {
            $excerpt_en = $post->translations->where('column_name', 'excerpt')->first()->value;
        } else {
            $excerpt_en = $post->excerpt;
        }
        if ($post->translations->where('column_name', 'meta_keywords')->count() > 0) {
            $meta_keywords_en = $post->translations->where('column_name', 'meta_keywords')->first()->value;
        } else {
            $meta_keywords_en = $post->meta_keywords;
        }
        if ($post->translations->where('column_name', 'meta_description')->count() > 0) {
            $meta_description_en = $post->translations->where('column_name', 'meta_description')->first()->value;
        } else {
            $meta_description_en = $post->meta_description;
        }
        if ($post->translations->where('column_name', 'body')->count() > 0) {
            $body_en = $post->translations->where('column_name', 'body')->first()->value;
        } else {
            $body_en = $post->body;
        }
        if ($post->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $post->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $post->slug;
        }
//__________________________Translation Category__________________________________________
        if ($post->category->translations->where('column_name', 'name')->count() > 0) {
            $nameCategory_en = $post->category->translations->where('column_name', 'name')->first()->value;
        } else {
            $nameCategory_en = $post->category->name;
        }
        if ($post->category->translations->where('column_name', 'slug')->count() > 0) {
            $slugCategory_en = $post->category->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slugCategory_en = $post->category->slug;
        }
//______________________End____Translation Category__________________________________________
        $post_en= [
            "id" => $post->id,
            "title" => $title_en,
            "image" => env('APP_URL') . '/storage/' . $post->image,
            "excerpt" => $excerpt_en,
            "body" => $body_en,
            "slug" => $slug_en,
            "seo_title" => $seo_title_en,
            "meta_description" => $meta_description_en,
            "meta_keywords" => $meta_keywords_en,
            "fav-count" => $post->user_count,
            "category" => [
                "name" => $nameCategory_en,
                "slug" => $slugCategory_en,
            ],
            "tag" => TagResource::collection($post->tag),
        ];
//------------------------End-------Post En--------------------------------------------
        if ($request->input('lang') == 'en') {
            $post=$post_en;
            return response()->json(compact(['post']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $post=$post_ar;
            return response()->json(compact(['post']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="categories",
     *     path="/api/categories",
     *     tags={"Post Pages"},
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
     *      description="For Home Data as ['categories']")
     * )
     */
    function categories(Request $request)
    {
        if ($request->input('lang') == 'en') {
            $categories = CategoryResource::collection(Category::with('posts')->with('translations')->get());
            return response()->json(compact(['categories']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $categories = CategoryArResource::collection(Category::with('posts')->with('translations')->get());
            return response()->json(compact(['categories']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }

    }

    /**
     * @OA\Get(
     *     operationId="category",
     *     path="/api/category/{slug}",
     *     tags={"Post Pages"},
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
     *              example="category-1",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['Category']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function category($slug, Request $request)
    {
        $categoryWithSlug = Category::where(function ($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
            $query->orwhere('slug', $slug);
        })->with('posts')->with('translations')->first();
        if (!$categoryWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
        $category_ar = [
            "name" => $categoryWithSlug->name,
            "slug" => $categoryWithSlug->slug,
            "posts_count" => $categoryWithSlug->posts->count(),
            "Posts" => PostDataArResource::collection($categoryWithSlug->posts)
        ];
        if ($categoryWithSlug->translations->where('column_name', 'name')->count() > 0) {
            $name_en = $categoryWithSlug->translations->where('column_name', 'name')->first()->value;
        } else {
            $name_en = $categoryWithSlug->name;
        }
        if ($categoryWithSlug->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $categoryWithSlug->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $categoryWithSlug->slug;
        }
        $category_en = [
            "name" => $name_en,
            "slug" => $slug_en,
            "posts_count" => $categoryWithSlug->posts->count(),
            "Posts" => PostDataResource::collection($categoryWithSlug->posts),
        ];
        if ($request->input('lang') == 'en') {
            $category=$category_en;
            return response()->json(compact(['category']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $category=$category_ar;
            return response()->json(compact(['category']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }


    }

    /**
     * @OA\Get(
     *     operationId="tags",
     *     path="/api/tags",
     *     tags={"Post Pages"},
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
     *      description="For Home Data as ['tags']")
     * )
     */
    function tags(Request $request)
    {
        if ($request->input('lang') == 'en') {
            $tags = TagResource::collection(Tag::with('post')->with('translations')->get());
            return response()->json(compact(['tags']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $tags = TagArResource::collection(Tag::with('post')->with('translations')->get());
            return response()->json(compact(['tags']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }

    /**
     * @OA\Get(
     *     operationId="tag",
     *     path="/api/tag/{slug}",
     *     tags={"Post Pages"},
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
     *              example="أسباب-التشوهات-الخلقية-عند-الجنين",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['Slug']"),
     * @OA\Response(
     *     response="404",
     *      description="Slug Not Found")
     * )
     *
     */
    function tag($slug, Request $request)
    {
        $tagWithSlug = Tag::where(function ($query) use ($slug) {
            $query->whereTranslation('slug', $slug);
            $query->orwhere('slug', $slug);
        })->with('post')->with('translations')->first();
        if (!$tagWithSlug) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }

        $tag_ar = [
            "name" => $tagWithSlug->name,
            "description" => $tagWithSlug->description,
            "slug" => $tagWithSlug->slug,
            "posts_count" => $tagWithSlug->post->count(),
            "Posts" => PostDataArResource::collection($tagWithSlug->post)
        ];
        if ($tagWithSlug->translations->where('column_name', 'name')->count() > 0) {
            $name_en = $tagWithSlug->translations->where('column_name', 'name')->first()->value;
        } else {
            $name_en = $tagWithSlug->name;
        }

        if ($tagWithSlug->translations->where('column_name', 'description')->count() > 0) {
            $description_en = $tagWithSlug->translations->where('column_name', 'description')->first()->value;
        } else {
            $description_en = $tagWithSlug->description;
        }
        if ($tagWithSlug->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $tagWithSlug->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $tagWithSlug->slug;
        }
        $tag_en = [
            "name" => $name_en,
            "description" => $description_en,
            "slug" => $slug_en,
            "posts_count" => $tagWithSlug->post->count(),
            "Posts" => PostDataResource::collection($tagWithSlug->post)
        ];
        if ($request->input('lang') == 'en') {
            $tag=$tag_en;
            return response()->json(compact(['tag']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $tag=$tag_ar;
            return response()->json(compact(['tag']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }

    }
}
