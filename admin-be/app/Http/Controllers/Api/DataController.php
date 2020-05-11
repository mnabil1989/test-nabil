<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostDataArResource;
use App\Http\Resources\PostDataResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
class DataController extends Controller
{


    function index(Request $request){
$query=$request->input('search');
        if ($request->input('lang') == 'en') {
            $posts = PostDataResource::collection(Post::search($query)->with('category')->with('tag')->with('translations')->get());
            return response()->json(compact(['posts']), 200);
        } elseif ($request->input('lang') == 'ar') {
            $posts = PostDataArResource::collection(Post::search($query)->with('category')->with('tag')->with('translations')->get());
            return response()->json(compact(['posts']), 200);
        } else {
            return response()->json("please enter language you want", 200);
        }
        $post=Post::search('عملية')->with('tag')->get();
        return response()->json($post, 200);
    }
}
