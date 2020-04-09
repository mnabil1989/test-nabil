<?php

namespace Andalusia\Survey\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserAnswerResource extends Resource
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
            'id'          => $this->id,
            'answer_text' => $this->answer_text,
            $this->mergeWhen($request->route()->getName() == 'surveys_users_answers.show', [
                'answer'      => new AnswerResource($this->answer),
                'user_info'   => new UserInfoResource($this->user_info)
            ])
        ];
    }
}