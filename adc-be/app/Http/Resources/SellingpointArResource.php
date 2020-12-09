<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class SellingpointArResource extends JsonResource
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
            "title" => $this->title,
            "logo"=>url('/storage/'.$this->logo),
            "description"=>$this->description,
        ];
    }
}
