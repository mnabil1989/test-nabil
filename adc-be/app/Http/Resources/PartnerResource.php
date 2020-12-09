<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
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
            "logo"=>url('/storage/'.$this->logo),
            "link"=>$this->link,
            "image_title"=>$this->image_title,
            "image_alt"=>$this->image_alt,
            
        ];
    }
}
