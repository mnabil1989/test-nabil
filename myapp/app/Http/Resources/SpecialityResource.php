<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SpecialityResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','name')->count()>0){
            $name= $this->name_en;
        }
        else{
            $name= $this->name;
        }
        return [
            'id'      => $this->id,
            'name' => $name,
            'image'   => $this->image,
            $this->mergeWhen($request->route()->getName() == 'specialities.show', [
                'doctors' => DoctorResource::collection($this->doctors)
            ])
        ];
    }
}
