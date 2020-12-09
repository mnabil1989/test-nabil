<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        if($this->translations->where('column_name','description')->count()>0){
            $description = $this->translations->where('column_name','description')->first()->value;
        }
        else{
            $description = $this->description;
        }

        if($this->translations->where('column_name','disease')->count()>0){
            $disease = $this->translations->where('column_name','disease')->first()->value;
        }
        else{
            $disease = $this->disease;
        }

        return [
            "id" => $this->id,  
            "username" => $this->username,
            "disease"=>$disease,
            "image"=>url('/storage/'.$this->image),
            "description"=>$description,
            "image_title"=>$this->image_title,
            "image_alt"=>$this->image_alt,
        ];
    }
}
