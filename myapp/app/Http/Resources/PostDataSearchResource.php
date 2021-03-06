<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class PostDataSearchResource extends JsonResource
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
        if ($this->translations->where('column_name', 'seo_title')->count() > 0) {
            $seo_title_en = $this->translations->where('column_name', 'seo_title')->first()->value;
        } else {
            $seo_title_en = $this->seo_title;
        }
        if ($this->translations->where('column_name', 'excerpt')->count() > 0) {
            $excerpt_en = $this->translations->where('column_name', 'excerpt')->first()->value;
        } else {
            $excerpt_en = $this->excerpt;
        }
        if ($this->translations->where('column_name', 'meta_keywords')->count() > 0) {
            $meta_keywords_en = $this->translations->where('column_name', 'meta_keywords')->first()->value;
        } else {
            $meta_keywords_en = $this->meta_keywords;
        }
        if ($this->translations->where('column_name', 'meta_description')->count() > 0) {
            $meta_description_en = $this->translations->where('column_name', 'meta_description')->first()->value;
        } else {
            $meta_description_en = $this->meta_description;
        }
        if ($this->translations->where('column_name', 'body')->count() > 0) {
            $body_en = $this->translations->where('column_name', 'body')->first()->value;
        } else {
            $body_en = $this->body;
        }
        if ($this->translations->where('column_name', 'slug')->count() > 0) {
            $slug_en = $this->translations->where('column_name', 'slug')->first()->value;
        } else {
            $slug_en = $this->slug;
        }
//__________________________Translation Category__________________________________________
        if($this->category->translations->where('column_name','name')->count()>0){
            $nameCategory_en = $this->category->translations->where('column_name','name')->first()->value;
        }
        else{
            $nameCategory_en = $this->category->name;
        }
        if($this->category->translations->where('column_name','slug')->count()>0){
            $slugCategory_en = $this->category->translations->where('column_name','slug')->first()->value;
        }
        else{
            $slugCategory_en = $this->category->slug;
        }
//______________________End____Translation Category__________________________________________

$date=date('d F, Y', strtotime($this->created_at));
        return [
            "title" => $title_en,
            "slug" => $slug_en,
            "image" =>url('/storage/'.$this->image),
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "small_description" => $excerpt_en,
            "description" => $body_en,
            "slug_type"=>'blog'

        ];
    }
}
