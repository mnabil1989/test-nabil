<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceArResource extends JsonResource
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
            "name" => $this->name_ar,
            "slug" => $this->slug_ar,
            "small_description" => $this->small_description,
            "photo" => url('/storage/'.$this->photo),

        ];
    }
}
