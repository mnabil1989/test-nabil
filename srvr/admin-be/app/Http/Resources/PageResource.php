<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->translations->where('column_name', 'title')->count() > 0) {
            $title_en = $this->translations->where('column_name', 'title')->first()->value;
        } else {
            $title_en = $this->title;
        }
        if ($this->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $this->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $this->slug;
        }
        if ($this->translations->where('column_name', 'body')->count() > 0) {
            $body_en = $this->translations->where('column_name', 'body')->first()->value;
        } else {
            $body_en = $this->body;
        }
        return [
            "title" => $title_en,
            "slug" => $slug_en,
            "excerpt" => $this->excerpt,
//            "body" => $body_en,
            "image" => url('/storage/'.$this->image),
//            "meta_description" => $this->meta_description,
//            "meta_keywords" => $this->meta_keywords
        ];
    }
}
