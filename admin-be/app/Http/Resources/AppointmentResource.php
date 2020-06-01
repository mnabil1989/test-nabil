<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AppointmentResource extends Resource
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
            'id'                => $this->id,
            'start'             => $this->start,
            'duration'          => $this->duration,
            'comments'          => $this->comments,
            'confirmed'         => $this->confirmed,
            'payment_confirmed' => $this->payment_confirmed,
            'appointment_notes' =>$this->appointment_notes,
            'doctor'            => new DoctorResource($this->doctorId),
            'user'              => $this->userId
//            $this->mergeWhen($request->route()->getName() == 'appointments.show', [
//
//            ])
        ];
    }
}
