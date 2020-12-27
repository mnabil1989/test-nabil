<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','title')->count()>0){
            $title_en = $this->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $this->title;
        }

        if($this->translations->where('column_name','slug')->count()>0){
            $slug_en = $this->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slug_en = $this->slug;
        }

        if($this->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $this->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $this->small_description;
        }
        if($this->translations->where('column_name','description')->count()>0){
            $description_en = $this->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $this->description;
        }

        if($this->translations->where('column_name','meta_keywords')->count()>0){
            $meta_keywords_en = $this->translations->where('column_name','meta_keywords')->first()->value;
        }
        else{
            $meta_keywords_en = $this->meta_keywords;
        }
        if($this->translations->where('column_name','meta_description')->count()>0){
            $meta_description_en = $this->translations->where('column_name','meta_description')->first()->value;
        }
        else{
            $meta_description_en = $this->meta_description;
        }
        
        return [
            "id" => $this->id,
            "name" => $title_en,
            "slug" => $slug_en,
            "small_description" => $small_description_en,
            "description" => $description_en,
            "meta_keywords" => $meta_keywords_en,
            "meta_description" => $meta_description_en,
            "photo" => url('/storage/'.$this->photo),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "is_new"=>$this->is_new

        ];
    }
}
