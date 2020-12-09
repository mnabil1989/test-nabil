<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorSearchResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','description')->count()>0){
            $description_en = $this->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $this->description;
        }
        if($this->translations->where('column_name','small_description')->count()>0){
            $small_description_en = $this->translations->where('column_name','small_description')->first()->value;
        }
        else{
            $small_description_en = $this->small_description;
        }
        if($this->translations->where('column_name','position')->count()>0){
            $position_en = $this->translations->where('column_name','position')->first()->value;
        }
        else{
            $position_en = $this->position;
        }
        if($this->translations->where('column_name','speciality')->count()>0){
            $speciality_en = $this->translations->where('column_name','speciality')->first()->value;
        }
        else{
            $speciality_en = $this->speciality;
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
            "title" => $this->title_en,
            "slug" => $this->slug_en,
            "image" => $this->photo,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description_en),
            "small_description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $small_description_en),
            "slug_type"=>'doctor'
            // 'clinic' => [
            //     'name' => $this->speciality_rel->clinic->{"name_{$request->lang}"} ?? '',
            //     'slug' => $this->speciality_rel->clinic->{"slug_{$request->lang}"} ?? '',
            // ]

        ];
    }
}
