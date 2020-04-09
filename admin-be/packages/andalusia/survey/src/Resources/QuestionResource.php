<?php

namespace Andalusia\Survey\Resources;

use Illuminate\Http\Resources\Json\Resource;

class QuestionResource extends Resource
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
            'id'        => $this->id,
            'order'     => $this->order,
            'question'  => $this->question,
            'form_type' => $this->form_type,
            $this->mergeWhen($request->route()->getName() == 'surveys_questions.show', [
                'survey'  => new MainResource($this->survey),
                'answers' => AnswerResource::collection($this->answers)
            ])
        ];
    }
}