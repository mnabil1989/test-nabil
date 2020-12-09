<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryArResource extends JsonResource
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
//            "id" => $this->id,
            "name" => $this->name,
            "slug" => $this->slug,
            "posts_count"=>$this->posts->count()
        ];
    }
}
