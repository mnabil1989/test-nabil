<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PostArResource extends JsonResource
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
            "id"=>$this->id,
            "title" => $this->title,
            "image" => env('APP_URL').'/storage/'.$this->image,
            "excerpt" => $this->excerpt,
//            "body" => $this->body,
            "slug" => $this->slug,
//            "seo_title" =>$this->seo_title,
//            "meta_description" => $this->meta_description,
//            "meta_keywords" => $this->meta_keywords,
            "fav-count"=>$this->user_count
        ];
    }
}
