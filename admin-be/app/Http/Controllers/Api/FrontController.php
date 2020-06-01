<?php

namespace App\Http\Controllers\Api;

use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Post;
use App\Slider;
use App\MenuItem;
use App\Service;
use App\Tag;
use TCG\Voyager\Models\Category;
use App\Http\Resources\SliderResource as SliderResource;
use App\Http\Resources\MenuResource as MenuResource;
use App\Http\Controllers\Controller;
use App\Setting;

class FrontController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="getRepositoriesByOwner",
     *     path="/api/settings",
     *     tags={"Home Page"},
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['events', 'menus', 'posts']")
     * )
     */
    function index()
    {
        $Setting = Setting::where('group', 'Site')->orderBy('order')->get();
        if($Setting->count()>0){


       
        foreach ($Setting as $SiteSettings) {         
              if($SiteSettings->type=='image'){
               $settings[str_replace("site.", "", $SiteSettings->key)] = url('/storage/'.$SiteSettings->value);
           }
           else{
               $settings[str_replace("site.", "", $SiteSettings->key)] = $SiteSettings->value;
           }
        } 
        return response()->json(compact(['settings']), 200); 
    }
    else{
        return response()->json(['error'=>'there are no data on database'], 200);
        
    }
       
    }
}
