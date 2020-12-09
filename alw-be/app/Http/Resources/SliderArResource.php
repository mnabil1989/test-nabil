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
            "id" =>$this->id,
            "photo"    =>str_replace("\\", "/",url('storage/'.$this->photo_ar) ),
            "link" =>$this->link,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            'title'=>$this->title,
            'description'=>$this->description
        ];
    }
}
