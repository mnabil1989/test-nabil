<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PostDataArResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $date=date('d F, Y', strtotime($this->created_at));

        return [
            "id"=>$this->id,
            "title" => $this->title,
            "image" => $this->image,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "excerpt" => $this->excerpt,
            "body" => $this->body,
            "slug" => $this->slug,
            'date'=>$date,
//            "seo_title" =>$this->seo_title,
//            "meta_description" => $this->meta_description,
//            "meta_keywords" => $this->meta_keywords,
            "fav-count"=>$this->user_count,
            "category"=>[
                "name"=> $this->category->name,
                "slug"=> $this->category->slug,
            ],
            "tag"=>TagArResource::collection($this->tag),
        ];
    }
}
