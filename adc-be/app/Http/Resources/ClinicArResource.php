<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicArResource extends JsonResource
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
            "name" => $this->name,
            "slug" => $this->slug,
            "small_description" => $this->small_description,
//            "description" => $this->description,
//            "address" =>$this->address,
//            "phone" => $this->phone,
//            "email" => $this->email,
//            "map_x" => $this->map_x,
//            "map_y" => $this->map_y,
//            "meta_keywords" => $this->meta_keywords,
//            "meta_description" => $this->meta_description,
            "photo" => url('/storage/'.str_replace("\\", '/', $this->photo)),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,

        ];
    }
}
