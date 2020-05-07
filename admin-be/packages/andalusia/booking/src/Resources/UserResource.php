<?php

namespace Andalusia\Booking\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'id'       => $this->id,
            'name'     => $this->name,
            'email'    => $this->email,
            'avatar'   => $this->avatar,
            'settings' => $this->settings,
            'phone'    => $this->phone,
            'gender'   => $this->gender,
            'address'  => $this->address
        ];
    }
}
