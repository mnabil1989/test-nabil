<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class JourneyResource extends JsonResource
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
        if ($this->translations->where('column_name', 'small_description')->count() > 0) {
            $small_description_en = $this->translations->where('column_name', 'small_description')->first()->value;
        } else {
            $small_description_en = $this->small_description;
        }             
        if ($this->translations->where('column_name', 'description')->count() > 0) {
            $description_en = $this->translations->where('column_name', 'description')->first()->value;
        } else {
            $description_en = $this->description;
        }
        if ($this->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $this->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $this->slug;
        }


        return [
            "id" => $this->id,
            "title" => $title_en,
            "slug"=>$slug_en,
            "image"=>url('/storage/'.$this->image),
            "description" => $description_en,
            "small_description" => $small_description_en,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
                 
        ];
    }
}
