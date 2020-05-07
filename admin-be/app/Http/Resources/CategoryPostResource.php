<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPostResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','name')->count()>0){
            $name_en = $this->translations->where('column_name','name')->first()->value;
        }
        else{
            $name_en = $this->name;
        }
        if($this->translations->where('column_name','slug')->count()>0){
            $slug_en = $this->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $this->slug;
        }
        return [
            "name" => $name_en,
            "slug" => $slug_en,
            "posts_count"=>$this->posts->count(),
            "Posts"=>PostResource::collection($this->posts),
        ];
    }
}
