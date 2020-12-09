<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class EventArResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

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
            "title" => $this->title,
            "slug" => $this->slug,
           "description" => $this->description,
           "small_description" => $this->small_description,
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
//            "meta_keywords" => $this->meta_keywords,
        //    "meta_description" => $this->meta_description,

        ];
    }
}
