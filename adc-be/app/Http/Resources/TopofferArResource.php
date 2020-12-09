<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class TopofferArResource extends JsonResource
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
            "price"=>$this->price,
            "offer_note"=>$this->offer_note,
            "discount_price"=>$this->discount_price,            
            "image"=>url('/storage/'.$this->photo),
            "small_description"=>$this->small_description,
            "image_title"=>$this->image_title,
            "image_alt"=>$this->image_alt,
            
        ];
    }
}
