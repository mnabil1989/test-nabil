<?php

namespace Andalusia\Survey\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AnswerResource extends Resource
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
            'id'     => $this->id,
            'order'  => $this->order,
            'answer' => $this->answer,
            'points' => $this->points,
            $this->mergeWhen($request->route()->getName() == 'surveys_answers.show', [
                'question'      => new QuestionResource($this->question),
                'users_answers' => UserAnswerResource::collection($this->users_answers)
            ])
        ];
    }
}