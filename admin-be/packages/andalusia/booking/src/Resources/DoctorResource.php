<?php

namespace Andalusia\Booking\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DoctorResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title_ar'    => $this->title_ar,
            'title_en'    => $this->title_en,
            'slug_ar'     => $this->slug_ar,
            'slug_en'     => $this->slug_en,
            'description' => $this->description,
            'position'    => $this->position,
            'speciality'  => $this->speciality,
            'photo'       => $this->photo,
            'status'      => $this->status
        ];
    }
}
