<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class JourneyArResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
       

        return [
            "id" => $this->id, 
            "title"=>$this->title,  
            "slug"=>$this->slug,
            "image"=>url('/storage/'.$this->image),
            "description"=>$this->description,
            "small_description"=>$this->small_description,
            "image_title"=>$this->image_title,
            "image_alt"=>$this->image_alt,
            
        ];
    }
}
