<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AndalusiaGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','title')->count()>0){
            $title_en = $this->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $this->title;
        }
        if($this->translations->where('column_name','url')->count()>0){
            $url_en = $this->translations->where('column_name','url')->first()->value;
        }
        else{
            $url_en = $this->url;
        }
        return [
            "title"    =>$title_en,
            "url" =>$url_en
        ];
    }
}

