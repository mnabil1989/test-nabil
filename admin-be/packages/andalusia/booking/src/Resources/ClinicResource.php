<?php

namespace Andalusia\Booking\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClinicResource extends Resource
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
            'id'                => $this->id,
            'name_ar'           => $this->name_ar,
            'name_en'           => $this->name_en,
            'slug_ar'           => $this->slug_ar,
            'slug_en'           => $this->slug_en,
            'small_description' => $this->small_description,
            'address'           => $this->address,
            'phone'             => $this->phone,
            'email'             => $this->email,
            'photo'             => $this->photo,
            'status'            => $this->status
        ];
    }
}
