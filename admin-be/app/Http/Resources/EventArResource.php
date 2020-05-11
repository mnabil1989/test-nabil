<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class EventArResource extends JsonResource
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
            "title" => $this->title_ar,
            "slug" => $this->slug_ar,
//            "description" => $this->description,
            "image"=>url('/storage/'.$this->img),
//            "images"=>$this->images,
//            "stock"=>$this->stock,
            "start"=>$this->start,
            "end"=>$this->end,
//            "map_x" => $this->map_x,
//            "map_y" => $this->map_y,
//            "meta_keywords" => $this->meta_keywords,
//            "meta_description" => $this->meta_description,

        ];
    }
}
