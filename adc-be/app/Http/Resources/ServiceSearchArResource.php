<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceSearchArResource extends JsonResource
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
            "title" => $this->name_ar,
            "slug" => $this->slug_ar,
            "image" => url('/storage/'.$this->photo),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "small_description" => $this->small_description,
            "description" => $this->small_description,  
            "slug_type"=>'service'
                    
        ];
    }
}
