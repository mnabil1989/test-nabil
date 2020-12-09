<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    { 

        if($this->translations->where('column_name','title')->count()>0){
            $title_en = $this->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $this->title;
        }
        if($this->translations->where('column_name','slug')->count()>0){
            $slug_en = $this->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $this->slug;
        }
        if($this->translations->where('column_name','description')->count()>0){
            $description_en = $this->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $this->description;
        }
        if($this->translations->where('column_name','small_description')->count()>0){
      
            $small_description_en = $this->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $this->small_description;
        }

        if($this->translations->where('column_name','meta_keywords')->count()>0){
            $meta_keywords_en = $this->translations->where('column_name','meta_keywords')->first()->value;
        }
        else{
            $meta_keywords_en = $this->meta_keywords;
        }
        if($this->translations->where('column_name','meta_description')->count()>0){
            $meta_description_en = $this->translations->where('column_name','meta_description')->first()->value;
        }
        else{
            $meta_description_en = $this->meta_description;
        }
            $images=json_decode($this->images,true);                      
            $img_arr=array();
            if(!empty($images)){
                foreach($images as $img){              
                    $img_arr[]=url('/storage/'.$img);                           
                }   
            }                  
$time = date('h:i A', strtotime($this->start));
$date=date('d/M/Y', strtotime($this->start));
$event_start_data=explode(' ',$this->start);
$event_format=$event_start_data[0].'T'.$event_start_data[1];
        return [
            "id" => $this->id,
            "title" => $title_en,
            "slug" => $slug_en,
           "description" => $description_en,
           "small_description" => $small_description_en,
            "image"=>url('/storage/'.$this->img),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
//            "images"=>$this->images,
//            "stock"=>$this->stock,
            "start"=>$this->start,
            // "end"=>$this->end,
            'date'=>$date,
            'time'=>$time,
            'event_format'=>$event_format,
            'event_date'=>$event_start_data[0],
            "images"=>$img_arr
//            "map_x" => $this->map_x,
//            "map_y" => $this->map_y,
//            "meta_keywords" => $meta_keywords_en,
//            "meta_description" => $meta_description_en,

        ];
    }
}
