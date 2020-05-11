<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PageArResource extends JsonResource
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
            "excerpt" => $this->excerpt,
//            "body" => $this->body,
            "image" => url('/storage/'.$this->image),
//            "meta_description" => $this->meta_description,
//            "meta_keywords" => $this->meta_keywords
        ];
    }
}
