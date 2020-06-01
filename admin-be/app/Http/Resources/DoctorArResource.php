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
            "title" => $this->title_ar,
            "slug" => $this->slug_ar,
            "position" => $this->position,
//            "speciality" => $this->speciality,
            "speciality" => $this->speciality_rel ? $this->speciality_rel->name : '',
            "photo" => $this->photo,
            "price" => $this->price,
            "duration" => $this->duration,
            'gender' => $this->gender == 'male' ? 'ذكر' : 'أنثى',
            'clinic' => [
                'name' => $this->speciality_rel->clinic->{"name_{$request->lang}"} ?? '',
                'slug' => $this->speciality_rel->clinic->{"slug_{$request->lang}"} ?? '',
            ]
        ];
    }
}
