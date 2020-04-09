<?php

namespace Andalusia\Survey\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserInfoResource extends Resource
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
            'id'               => $this->id,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'is_survey_closed' => $this->is_survey_closed,
            $this->mergeWhen($request->route()->getName() == 'surveys_users_info.show', [
                'survey'        => new MainResource($this->survey),
                'users_answers' => UserAnswerResource::collection($this->users_answers)
            ])
        ];
    }
}