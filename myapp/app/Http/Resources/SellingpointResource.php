<?php

namespace App\Http\Resources;

use http\Url;
use Illuminate\Http\Resources\Json\JsonResource;

class SellingpointResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->translations->where('column_name','title')->count()>0){
            $title = $this->translations->where('column_name','title')->first()->value;
        }
        else{
            $title = $this->title;
        }

        if($this->translations->where('column_name','description')->count()>0){
            $description = $this->translations->where('column_name','description')->first()->value;
        }
        else{
            $description = $this->description;
        }
        return [
            "id" => $this->id,  
            "title" => $title,

            "logo"=>url('/storage/'.$this->logo),
            "description"=>$description,
        ];
    }
}
