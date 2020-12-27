<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceArResource extends JsonResource
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
            "name" => $this->title,
            "slug" => $this->slug,
            "small_description" =>$this->small_description,
            "description" => $this->description,
            "meta_keywords" => $this->meta_keywords,
            "meta_description" => $this->meta_description,
            "photo" => url('/storage/'.$this->photo),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "is_new"=>$this->is_new
        ];
    }
}
