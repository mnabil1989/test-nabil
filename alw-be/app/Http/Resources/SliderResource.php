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
        if($this->translations->where('column_name','title')->count()>0){
            $title_en = $this->translations->where('column_name','title')->first()->value;
        }
        else{
            $title_en = $this->link;
        }
        if($this->translations->where('column_name','description')->count()>0){
            $description_en = $this->translations->where('column_name','description')->first()->value;
        }
        else{
            $description_en = $this->description;
        }
        return [
            "id" =>$this->id,
            "link" =>$this->id,
            "photo"    =>str_replace("\\", "/",url('storage/'.$this->photo_en) ),
            "link" =>$link_en,
            'title'=>$title_en,
            'description'=>$description_en,
            "image_alt" => $this->image_alt,
            "image_title" => $this->image_title,
        ];
    }
}
