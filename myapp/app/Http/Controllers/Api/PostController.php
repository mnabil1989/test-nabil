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
use App\PostTag;
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
        $metaTags =SiteSetting::where('key',"like","%posts.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){
                $meta_tags['meta_'.explode("posts.meta.",$metaTag->key)[1]]=$metaTag->value;
        }
        
        $openGraphFields =SiteSetting::where('key',"like","%posts.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("posts.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%posts.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("posts.twitter.",$cardField->key)[1]]= $value;
        }


        if ($request->input('lang') == 'en') {
            $data = PostDataResource::collection(Post::where(['category_id'=>1])->with('category')->with('tag')->withcount('user')->with('translations')->OrderBy('order','asc')->get());
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = PostDataArResource::collection(Post::where(['category_id'=>1])->with('category')->with('tag')->withcount('user')->with('translations')->OrderBy('order','asc')->get());
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }   
    function posts_footer(Request $request)
    {
        $metaTags =SiteSetting::where('key',"like","%posts.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){
                $meta_tags['meta_'.explode("posts.meta.",$metaTag->key)[1]]=$metaTag->value;
        }
        
        $openGraphFields =SiteSetting::where('key',"like","%posts.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("posts.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%posts.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("posts.twitter.",$cardField->key)[1]]= $value;
        }


        if ($request->input('lang') == 'en') {
            $data = PostDataResource::collection(Post::where(['category_id'=>2])->with('category')->with('tag')->withcount('user')->with('translations')->OrderBy('order','asc')->get());
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = PostDataArResource::collection(Post::where(['category_id'=>2])->with('category')->with('tag')->withcount('user')->with('translations')->OrderBy('order','asc')->get());
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
    }
    function posts_mostread(Request $request)
    {
        $metaTags =SiteSetting::where('key',"like","%posts.meta.%")->get();
        $meta_tags=[];
        foreach($metaTags as $metaTag){
                $meta_tags['meta_'.explode("posts.meta.",$metaTag->key)[1]]=$metaTag->value;
        }
        
        $openGraphFields =SiteSetting::where('key',"like","%posts.facebook.%")->get();
        $open_graph=[];
        foreach($openGraphFields as $oGField){
            if(strstr($oGField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$oGField->value) ) ;
                
            }else{
                $value = $oGField->value;
            }
                $open_graph['open_graph_'.explode("posts.facebook.",$oGField->key)[1]]=$value;
        }

        $twitterCardFields =SiteSetting::where('key',"like","%posts.twitter.%")->get();
        $twitter_card=[];
        foreach($twitterCardFields as $cardField){
            if(strstr($cardField,"image") ){
                $value =str_replace("\\", "/",url('storage/'.$cardField->value) ) ;
                
            }else{
                $value = $cardField->value;
            }

                $twitter_card['twitter_card_'.explode("posts.twitter.",$cardField->key)[1]]= $value;
        }


        if ($request->input('lang') == 'en') {
            $data = PostDataResource::collection(Post::where(['category_id'=>3])->with('category')->with('tag')->withcount('user')->with('translations')->OrderBy('order','asc')->get());
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = PostDataArResource::collection(Post::where(['category_id'=>3])->with('category')->with('tag')->withcount('user')->with('translations')->OrderBy('order','asc')->get());            
            return response()->json(compact(['data','meta_tags','twitter_card','open_graph']), 200);
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
            "image" => $post->image,
            "image_alt" => $post->image_alt,
            "image_title" => $post->image_title,
            "excerpt" => $post->excerpt,
            "body" => $post->body,
            "slug" => $post->slug,
            "fav-count" => $post->user_count,
            "category" => [
                "name" => $post->category->name,
                "slug" => $post->category->slug,
            ],
            "tag" => TagArResource::collection($post->tag),
            "seo_title" => $post->seo_title,
            "meta_description" => $post->meta_description,
            "meta_keywords" => $post->meta_keywords,
            "facebook_title"=> $post->facebook_title,
            "facebook_description"=> $post->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$post->facebook_image) ),
            "twitter_title"=> $post->twitter_title,
            "twitter_description"=> $post->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$post->twitter_image) )
        ];
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
            "image" => $post->image,
            "image_alt" => $post->image_alt,
            "image_title" => $post->image_title,
            "excerpt" => $excerpt_en,
            "body" => $body_en,
            "slug" => $slug_en,
            "seo_title" => $seo_title_en,
            "fav-count" => $post->user_count,
            "category" => [
                "name" => $nameCategory_en,
                "slug" => $slugCategory_en,
            ],
            "tag" => TagResource::collection($post->tag),
            "meta_description" => $meta_description_en,
            "meta_keywords" => $meta_keywords_en,
            "facebook_title"=> $post->facebook_title,
            "facebook_description"=> $post->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$post->facebook_image) ),
            "twitter_title"=> $post->twitter_title,
            "twitter_description"=> $post->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$post->twitter_image) )
        ];
//------------------------End-------Post En--------------------------------------------
        if ($request->input('lang') == 'en') {
            $data=$post_en;
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=$post_ar;
            return response()->json(compact(['data']), 200);
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
            "Posts" => PostDataArResource::collection($tagWithSlug->post),
            "meta_description"=> $tagWithSlug->meta_description,
            "meta_keywords"=> $tagWithSlug->meta_keywords,
            "facebook_title"=> $tagWithSlug->facebook_title,
            "facebook_description"=> $tagWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$tagWithSlug->facebook_image) ),
            "twitter_title"=> $tagWithSlug->twitter_title,
            "twitter_description"=> $tagWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$tagWithSlug->twitter_image) )
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
            "Posts" => PostDataResource::collection($tagWithSlug->post),
            "meta_description"=> $tagWithSlug->meta_description,
            "meta_keywords"=> $tagWithSlug->meta_keywords,
            "facebook_title"=> $tagWithSlug->facebook_title,
            "facebook_description"=> $tagWithSlug->facebook_description,
            "facebook_image"=> str_replace("\\", "/",url('storage/'.$tagWithSlug->facebook_image) ),
            "twitter_title"=> $tagWithSlug->twitter_title,
            "twitter_description"=> $tagWithSlug->twitter_description,
            "twitter_image"=> str_replace("\\", "/",url('storage/'.$tagWithSlug->twitter_image) )
        ];
        if ($request->input('lang') == 'en') {
            $data=$tag_en;
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data=$tag_ar;
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }

    }   

    public function related_topics($slug,Request $request){
    $post=Post::where(function ($query) use ($slug) {
        $query->whereTranslation('slug', $slug);
        $query->orwhere('slug', $slug);
    })->with('category')->with('tag')->withcount('user')->with('translations')->first();
        if (!$post) {
            $slug = ['error' => 'slug isn`t on our data'];
            return response()->json($slug, 404);
        }
     
        $PostTags=PostTag::where(function ($query) use ($slug) {
        })->where(['post_id'=>$post->id])->get();

      if(count($PostTags)==0){
        $res = ['error' => 'no result data'];
        return response()->json($res, 404);
      }
        foreach($PostTags as $rows){

             $tags_ids[]=$rows->tag_id;
        }

        $related_posts_ids=PostTag::whereIn('tag_id', $tags_ids)->get();
        foreach ($related_posts_ids as $row_ids) {
            $posts_ids[]=$row_ids->post_id;
           
        }
       $posts_uniq_ids=array_unique($posts_ids);
        if ($request->input('lang') == 'en') {
            $data = PostDataResource::collection(Post::whereIn('id', $posts_uniq_ids)->with('translations')->get());
            return response()->json(compact(['data']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $data = PostDataArResource::collection(Post::whereIn('id', $posts_uniq_ids)->with('translations')->get());
            return response()->json(compact(['data']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }



    }
}
