<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorArResource extends JsonResource
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
            "title" => $this->title,
            "slug" => $this->slug,
            "position" => $this->position,
//            "speciality" => $this->speciality,
            "speciality" => $this->speciality_rel ? $this->speciality_rel->name : '',
            "photo" => $this->photo,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
            "price" => $this->price,
            "duration" => $this->duration,
            'gender' => $this->gender == 'male' ? 'ذكر' : 'أنثى',
            "small_description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $this->small_description),
            "description" => preg_replace('/(<[^>]+) style=".*?"/i', '$1', $this->description),
            // 'clinic' => [
            //     'name' => $this->speciality_rel->clinic->{"name_{$request->lang}"} ?? '',
            //     'slug' => $this->speciality_rel->clinic->{"slug_{$request->lang}"} ?? '',
            // ]
        ];
    }
}
