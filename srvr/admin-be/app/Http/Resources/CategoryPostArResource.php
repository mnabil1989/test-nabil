<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPostArResource extends JsonResource
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
            "name" => $this->name,
            "slug" => $this->slug,
            "posts_count"=>$this->posts->count(),
            "Posts"=>PostArResource::collection($this->posts)
        ];
    }
}
