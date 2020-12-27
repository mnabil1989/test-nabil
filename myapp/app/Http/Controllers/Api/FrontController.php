<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use http\Url;
use App\AndlGroup;
use App\Clinic;
use App\Doctor;
use App\Event;
use App\Post;
use App\Slider;
use App\MenuItem;
use App\Service;
use App\Tag;
use App\SiteSetting;

use TCG\Voyager\Models\Category;
use App\Http\Resources\SliderResource as SliderResource;
use App\Http\Resources\MenuResource as MenuResource;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DoctorSearchArResource;
use App\Http\Resources\DoctorSearchResource;
use App\Http\Resources\PostDataSearchArResource;
use App\Http\Resources\PostDataSearchResource;
use App\Http\Resources\EventSearchArResource;
use App\Http\Resources\EventSearchResource;
use App\Http\Resources\ServiceSearchResource;
use App\Http\Resources\ServiceSearchArResource;

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
    function about_us(Request $request)
    {

        if(empty($request->input('lang'))){
            return response()->json("please enter language you want", 200);
        }

        $Setting = Setting::where(['group'=>'Site'])->whereIn('key', ['site.about_us_en','site.about_us_ar','site.about_us_small_en','site.about_us_small_ar','site.about_us_image','site.about_us_image_title','site.about_us_image_alt'])
        ->orderBy('order')->get();
               if(count($Setting)==0){
                return response()->json('empty', 200);

            }

        foreach ($Setting as $SiteSettings) {
            if($SiteSettings->type=='image'){
             $data[str_replace("site.", "", $SiteSettings->key)] = url('/storage/'.$SiteSettings->value);
         }
         else{
             $data[str_replace("site.", "", $SiteSettings->key)] = $SiteSettings->value;
         }

      }


      $data['image']=$data['about_us_image'];
      $data['image']=$data['about_us_image'];
      $data['image_title']=$data['about_us_image_title'];
      $data['image_alt']=$data['about_us_image_alt'];
      if($request->input('lang')=='ar'){
        $data['small_description']=$data['about_us_small_ar'];

        $data['description']=$data['about_us_ar'];
        unset($data['about_us_ar']);
        unset($data['about_us_en']);
        unset($data['about_us_small_en']);
        unset($data['about_us_small_ar']);
      }else{
        $data['small_description']=$data['about_us_small_en'];
        $data['description']=$data['about_us_en'];
        unset($data['about_us_ar']);
        unset($data['about_us_en']);
        unset($data['about_us_small_en']);
        unset($data['about_us_small_ar']);


      }
      unset($data['about_us_image']);
      unset($data['about_us_image_title']);
      unset($data['about_us_image_alt']);
      return response()->json(compact(['data']), 200);


    }
    function contacts(Request $request)
    {
        if(empty($request->input('lang'))){
            return response()->json("please enter language you want", 200);
        }
        $Setting = Setting::where(['group'=>'Site'])->whereIn('key', [
            'site.phone','site.email','site.appointments','site.address_ar','site.address_en'])
        ->orderBy('order')->get();

        foreach ($Setting as $SiteSettings) {
            if($SiteSettings->type=='image'){
             $data[str_replace("site.", "", $SiteSettings->key)] = url('/storage/'.$SiteSettings->value);
         }
         else{
             $data[str_replace("site.", "", $SiteSettings->key)] = $SiteSettings->value;
         }
      }

      if($request->input('lang')=='ar'){
        $data['address']=$data['address_ar'];
        unset($data['address_ar']);
        unset($data['address_en']);
      }else{
        $data['address']=$data['address_en'];
        unset($data['address_ar']);
        unset($data['address_en']);
      }

      return response()->json(compact(['data']), 200);



    }
    function sub_titles(Request $request){
        if(empty($request->input('lang'))){
            return response()->json("please enter language you want", 200);
        }
        $Setting = Setting::where(['group'=>'Site'])->whereIn('key', [
        'site.journey_subtitle_ar','site.journey_subtitle_en'
        ,'site.services_subtitle_ar','site.services_subtitle_en'
        ,'site.doctors_subtitle_ar','site.doctors_subtitle_en'
        ,'site.services_subtitle_ar','site.services_subtitle_en'
        ,'site.testimonials_subtitle_ar','site.testimonials_subtitle_en'
        ,'site.events_subtitle_ar','site.events_subtitle_en'        
        ,'site.selling_points_subtitle_ar','site.selling_points_subtitle_en'
        ,'site.selling_points_subtitle_ar','site.selling_points_subtitle_en'
        ])
        ->orderBy('order')->get();
        // print_r($Setting);die;
        foreach ($Setting as $SiteSettings) {
            

             $data[str_replace("site.", "", $SiteSettings->key)] = $SiteSettings->value;
     
        }
        // print_r($data);die;

      if($request->input('lang')=='ar'){
        $data['journey_subtitle']=  $data['journey_subtitle_ar'];
        $data['services_subtitle']=$data['services_subtitle_ar'];
        $data['doctors_subtitle']=$data['doctors_subtitle_ar'];
        $data['services_subtitle']=$data['services_subtitle_ar'];
        $data['events_subtitle']=$data['events_subtitle_ar'];
        $data['selling_points_subtitle']=$data['selling_points_subtitle_ar'];
        $data['testimonials_subtitle']=$data['testimonials_subtitle_ar'];

        unset($data['journey_subtitle_ar']);
        unset($data['journey_subtitle_en']);
        unset($data['doctors_subtitle_ar']);
        unset($data['doctors_subtitle_en']);
        unset($data['services_subtitle_ar']);
        unset($data['services_subtitle_en']);
        unset($data['events_subtitle_ar']);
        unset($data['events_subtitle_en']);
        unset($data['selling_points_subtitle_ar']);
        unset($data['selling_points_subtitle_en']);
        unset($data['testimonials_subtitle_ar']);
        unset($data['testimonials_subtitle_en']);

      }else{
          $data['journey_subtitle']=$data['journey_subtitle_en'];
          $data['services_subtitle']=$data['services_subtitle_en'];
          $data['doctors_subtitle']=$data['doctors_subtitle_en'];
          $data['services_subtitle']=$data['services_subtitle_en'];
          $data['events_subtitle']=$data['events_subtitle_en'];
          $data['selling_points_subtitle']=$data['selling_points_subtitle_en'];
          $data['testimonials_subtitle']=$data['testimonials_subtitle_en'];

          unset($data['journey_subtitle_ar']);
          unset($data['journey_subtitle_en']);
          unset($data['doctors_subtitle_ar']);
          unset($data['doctors_subtitle_en']);
          unset($data['services_subtitle_ar']);
          unset($data['services_subtitle_en']);
          unset($data['events_subtitle_ar']);
          unset($data['events_subtitle_en']);
          unset($data['selling_points_subtitle_ar']);
          unset($data['selling_points_subtitle_en']);
          unset($data['testimonials_subtitle_ar']);
          unset($data['testimonials_subtitle_en']);
      }
    
      return response()->json(compact(['data']), 200);

    }

    function socialmedia(Request $request)
    {
        $Setting = Setting::where(['group'=>'Site'])->whereIn('key', ['site.facebook','site.twitter','site.
        instagram','site.youtube','site.whatsapp','site.phone','site.instagram'])
        ->orderBy('order')->get();
     
        foreach ($Setting as $SiteSettings) { 
            if($SiteSettings->type=='image'){
             $data[str_replace("site.", "", $SiteSettings->key)] = url('/storage/'.$SiteSettings->value);
         }
         else{
             $data[str_replace("site.", "", $SiteSettings->key)] = $SiteSettings->value;
         }
      }
      return response()->json(compact(['data']), 200);



    }
    public function contactus(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message'=>'required|string',
        ]);
            $data=$request->all();
            //print_r($data);die;
            $name=$data['name'];
            $email=$data['email'];
            $message=$data['message'];
            $setting = Setting::where(['group'=>'Site'])->whereIn('key', ['site.contact_us_email'])->first();
      
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if(!empty($setting)){            
            $to      = $setting->value;
            $subject = 'Contact us';          
            $message ='
                Name:'.$name.'</br>
                Email: '.$email.'</br>
                Message:'.$message.'</br>';
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'To: ALW <'.$to.'>';
            $headers[] = 'From: '.$name.' <'.$email.'>';
            mail($to, $subject, $message, implode("\r\n", $headers));
            return response()->json('success',200);
       }else{
        return response()->json('fail',200);

       }
       
    }
    public function newsletter(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return response()->json('success',200);
    }
    public function search(Request $request){
        $data=[];
        $validator = Validator::make($request->all(), [
            'query_search' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

                if(isset($request->query_search) && !empty($request->query_search)){
                if ($request->query_search) {
                    $q = $request->query_search;
                    $doctors = Doctor::with('translations')->where('status', 1)->where(function ($query) use ($q) {
                        $query->whereTranslation('title','like', '%' . $q . '%');
                        $query->orwhere('title','like', '%' . $q . '%');
                    })->get();
               
                        $arr=array();
                    foreach($doctors as $key=>$value){ //print_r($value->translations->);die;
                        if ($request->input('lang') == 'ar') {
                            $arr[$key]['title']=$value->title;
                            $arr[$key]['slug']=$value->slug;
                        }else{                                                
                            if($value->translations->where('column_name', 'title')->count() > 0) {
                                $title_en = $value->translations->where('column_name', 'title')->first()->value;
                            }else {
                                $title_en = $value->title;
                            }
                            if($value->translations->where('column_name', 'slug')->count() > 0) {
                                $slug_en = $value->translations->where('column_name', 'slug')->first()->value;
                            }else {
                                $slug_en = $value->slug;
                            }
                            $arr[$key]['title' ]=$title_en;
                            $arr[$key]['slug']=$slug_en;
                        }                        
                        $arr[$key]["description"]=$value->description;
                        $arr[$key]["small_description"]=$value->small_description;
                        $arr[$key]['image']=$value->photo;                       
                        $arr[$key]["image_alt"]=$value->image_alt;
                        $arr[$key]["image_title"]=$value->image_title;
                        $arr[$key]["slug_type"]="doctor";

                    }                   
                        $posts = Post::where(function ($query) use ($q) {                          
                               $query->whereTranslation('title','like', '%' . $q . '%');  
                               $query->orwhere('title','like', '%' . $q . '%');   

                            //    $query->whereTranslation('slug','like', '%' . $q . '%');  
                            //    $query->orwhere('slug','like', '%' . $q . '%');   

                            //    $query->whereTranslation('body','like', '%' . $q . '%');    
                            //    $query->orwhere('body','like', '%' . $q . '%');                   

                            //    $query->whereTranslation('excerpt','like', '%' . $q . '%');                                                      
    
                            //    $query->orwhere('excerpt','like', '%' . $q . '%');                   

                
                        })->get();
                      //  print_r($posts);die;
                            $arr2=array();
                            foreach ($posts as $key=>$value) {
                                if ($request->input('lang') == 'ar') {
                                    $arr2[$key]['title']=$value->title;
                                    $arr2[$key]['slug']=$value->slug;
                                    $arr2[$key]["description"]=$value->body;
                                    $arr2[$key]["small_description"]=$value->excerpt;
                                }else{
                                    if($value->translations->where('column_name', 'title')->count() > 0) {
                                        $title_en = $value->translations->where('column_name', 'title')->first()->value;
                                    }else {
                                        $title_en = $value->title;
                                    }
                                    if($value->translations->where('column_name', 'slug')->count() > 0) {
                                        $slug_en = $value->translations->where('column_name', 'slug')->first()->value;
                                    }else {
                                        $slug_en = $value->slug;
                                    }
                                    if($value->translations->where('column_name', 'body')->count() > 0) {
                                        $description_en = $value->translations->where('column_name', 'body')->first()->value;
                                    }else {
                                        $description_en = $value->body;
                                    }
                                    if($value->translations->where('column_name', 'excerpt')->count() > 0) {
                                        $small_description_en = $value->translations->where('column_name', 'excerpt')->first()->value;
                                    }else {
                                        $small_description_en = $value->excerpt;
                                    }
                                        $arr2[$key]['title' ]=$title_en;
                                        $arr2[$key]['slug']=$slug_en;   
                                        $arr2[$key]["description"]=$description_en;
                                        $arr2[$key]["small_description"]=$small_description_en;



                                }
                                $arr2[$key]['image']=$value->image;
                                $arr2[$key]["image_alt"]=$value->image_alt;
                                $arr2[$key]["image_title"]=$value->image_title;                               
                                $arr2[$key]["slug_type"]="blog";
                            }
                        // print_r($arr2);die;
                             $now=Carbon::now()->toDateString();
                                $events = Event::where('status', 1)->where('end','>=',$now)->with('translations')->where(function ($query) use ($q) {
                                    $query->whereTranslation('title','like', '%' . $q . '%');
                                    $query->orwhere('title','like', '%' . $q . '%');   

                            })->get();

                                $arr3=array();
                                foreach ($events as $key=>$value) {
                                    if ($request->input('lang') == 'ar') {
                                        $arr3[$key]['title']=$value->title;
                                        $arr3[$key]['slug']=$value->slug;
                                        $arr3[$key]["description"]=$value->description;
                                        $arr3[$key]["small_description"]=$value->small_description;
                                    }else{

                                        if($value->translations->where('column_name', 'title')->count() > 0) {
                                            $title_en = $value->translations->where('column_name', 'title')->first()->value;
                                        }else {
                                            $title_en = $value->title;
                                        }
                                        if($value->translations->where('column_name', 'slug')->count() > 0) {
                                            $slug_en = $value->translations->where('column_name', 'slug')->first()->value;
                                        }else {
                                            $slug_en = $value->slug;
                                        }
                                        if($value->translations->where('column_name', 'description')->count() > 0) {
                                            $description_en = $value->translations->where('column_name', 'description')->first()->value;
                                        }else {
                                            $description_en = $value->description;
                                        }
                                        if($value->translations->where('column_name', 'small_description')->count() > 0) {
                                            $small_description_en = $value->translations->where('column_name', 'small_description')->first()->value;
                                        }else {
                                            $small_description_en = $value->small_description;
                                        }
                                        

                                        $arr3[$key]['title']=$title_en;
                                        $arr3[$key]['slug']=$slug_en;
                                        $arr3[$key]["description"]=$description_en;
                                        $arr3[$key]["small_description"]=$small_description_en;

                                    }
                                     
                                 
                                    $arr3[$key]['image']=url('/storage/'.$value->img);
                                    $arr3[$key]["image_alt"]=$value->image_alt;
                                    $arr3[$key]["image_title"]=$value->image_title;
                                    // $arr3[$key]["description"]=$value->description;
                                    // $arr3[$key]["small_description"]=$value->small_description;
                                    $arr3[$key]["slug_type"]="event";
                                }
                                //print_r($arr3);die;
                                $services = Service::where('status', 1)->with('translations')->where(function ($query) use ($q) {
                                    $query->whereTranslation('title','like', '%' . $q . '%');
                                    $query->orwhere('title','like', '%' . $q . '%');
                                })->get();
                                $arr4=array();
                                foreach ($services as $key=>$value) {
                                    if ($request->input('lang') == 'ar') {
                                        $arr4[$key]['title']=$value->title;
                                        $arr4[$key]['slug']=$value->slug;
                                        $arr4[$key]["description"]=$value->description;
                                        $arr4[$key]["small_description"]=$value->small_description;
                                    }else{
                                        if($value->translations->where('column_name', 'title')->count() > 0) {
                                            $title_en = $value->translations->where('column_name', 'title')->first()->value;
                                        }else {
                                            $title_en = $value->title;
                                        }
                                        if($value->translations->where('column_name', 'slug')->count() > 0) {
                                            $slug_en = $value->translations->where('column_name', 'slug')->first()->value;
                                        }else {
                                            $slug_en = $value->slug;
                                        }
                                        if($value->translations->where('column_name', 'description')->count() > 0) {
                                            $description_en = $value->translations->where('column_name', 'description')->first()->value;
                                        }else {
                                            $description_en = $value->description;
                                        }
                                        if($value->translations->where('column_name', 'small_description')->count() > 0) {
                                            $small_description_en = $value->translations->where('column_name', 'small_description')->first()->value;
                                        }else {
                                            $small_description_en = $value->small_description;
                                        }                                        

                                        $arr4[$key]['title']=$title_en;
                                        $arr4[$key]['slug']=$slug_en;
                                        $arr4[$key]["description"]=$description_en;
                                        $arr4[$key]["small_description"]=$small_description_en;

                                    }
                                    $arr4[$key]['image']=url('storage/'.$value->photo);
                                    $arr4[$key]["image_alt"]=$value->image_alt;
                                    $arr4[$key]["image_title"]=$value->image_title;
                               
                                    $arr4[$key]["slug_type"]="service";
                                }
                                  //  print_r($arr4);die;
                        if ($request->input('lang') == 'en') {
                            // $doctors=DoctorSearchResource::collection($doctors);
                            // $posts=PostDataSearchResource::collection($posts);
                            // $events=EventSearchResource::collection($events);
                            // $services=ServiceSearchResource::collection($services);


                        }elseif($request->input('lang') == 'ar'){
                            // $doctors=DoctorSearchArResource::collection($doctors);
                            // $posts=PostDataSearchArResource::collection($posts);
                            // $events=EventSearchArResource::collection($events);
                            // $services=ServiceSearchArResource::collection($services);

                        }else{
                            return response()->json("please enter language you want", 200);

                        }                             

                    }

            }
            // $data=array_merge(compact(['doctors']),compact(['posts']),compact(['events']),compact('services') );
                // print_r($arr);die;
            $data=array_merge($arr,$arr2,$arr3,$arr4);
            return response()->json(compact(['data']), 200);

    }

}
