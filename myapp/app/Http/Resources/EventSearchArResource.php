<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class EventSearchArResource extends JsonResource
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
            "title" => $this->title,
            "slug" => $this->slug,
            "image"=>url('/storage/'.$this->img),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "description" => $this->description,
            "small_description" => $this->small_description,
            "slug_type"=>"event"
        ];
    }
}
