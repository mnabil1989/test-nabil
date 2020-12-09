<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorSearchArResource extends JsonResource
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
            "title" => $this->title,
            "slug" => $this->slug,
            "image" => $this->photo,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "small_description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $this->small_description),
            "description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $this->description),
            "slug_type"=>'doctor'
        ];
    }
}
