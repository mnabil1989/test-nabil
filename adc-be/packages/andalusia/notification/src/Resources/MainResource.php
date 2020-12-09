<?php

namespace Andalusia\Notification\Resources;

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
            'id'        => $this->id,
            'image'     => $this->image,
            'thumbnail' => $this->thumbnail,
            'link'      => $this->link,
            'message'   => $this->message,
            'type'      => $this->type,
            'is_read'   => $this->is_read,
            $this->mergeWhen($request->route()->getName() == 'notifications.show', [
                //'user' => new UserResource($this->user)
            ])
        ];
    }
}