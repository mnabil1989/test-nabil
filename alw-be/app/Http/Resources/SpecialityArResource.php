<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SpecialityArResource extends Resource
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
            'id'      => $this->id,
            'name'    => $this->name,
            'image'   => $this->image,
            $this->mergeWhen($request->route()->getName() == 'specialities.show', [
                'doctors' => DoctorResource::collection($this->doctors)
            ])
        ];
    }
}
