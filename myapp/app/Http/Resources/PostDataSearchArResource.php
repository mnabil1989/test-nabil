<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PostDataSearchArResource extends JsonResource
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
            "image" =>url('/storage/'.$this->image),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "small_description" => $this->excerpt,
            "description" => $this->body,
            "slug_type"=>'blog'
        ];
    }
}
