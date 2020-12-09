<?php

namespace Andalusia\Survey\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MainResource extends Resource
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
            'id'                          => $this->id,
            'same_page'                   => $this->same_page,
            'popup_type'                  => $this->popup_type,
            'popup_timer'                 => $this->popup_timer,
            'number_of_questions_on_page' => $this->number_of_questions_on_page,
            'slug'                        => $this->slug,
            'note'                        => $this->note,
            'redirect_link'               => $this->redirect_link,
            'slug'                        => $this->slug,
            $this->mergeWhen($request->route()->getName() == 'surveys.show', [
                'questions'  => QuestionResource::collection($this->questions)
                // ,'users_info' => UserInfoResource::collection($this->users_info)
            ])
        ];
    }
}