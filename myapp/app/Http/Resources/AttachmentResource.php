<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AttachmentResource extends Resource
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
            'id'         => $this->id,
            'attachment' => $this->attachment,
            $this->mergeWhen($request->route()->getName() == 'attachments.show', [
                'appointment' => new AppointmentResource($this->appointment)
            ])
        ];
    }
}
