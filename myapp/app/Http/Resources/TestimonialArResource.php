<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialArResource extends JsonResource
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
            "username" => $this->username,
            "image"=>url('/storage/'.$this->image),
            "description"=>$this->description,
            "image_title"=>$this->image_title,
            "image_alt"=>$this->image_alt,
        ];
    }
}
