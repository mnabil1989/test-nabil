<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','link')->count()>0){
            $link_en = $this->translations->where('column_name','link')->first()->value;
        }
        else{
            $link_en = $this->link;
        }
        return [
            "photo"    =>str_replace("\\", "/",url('storage/'.$this->photo_en) ),
            "link" =>$link_en
        ];
    }
}
