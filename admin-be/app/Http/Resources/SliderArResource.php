<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderArResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            "photo"    =>str_replace("\\", "/",url('storage/'.$this->photo_ar) ),
            "link" =>$this->link
        ];
    }
}
