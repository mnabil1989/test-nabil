<?php

namespace Andalusia\Booking\Resources;

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
            'id'             => $this->id,
            'day'            => $this->day,
            'from'           => $this->from,
            'to'             => $this->to,
            'payment_method' => $this->payment_method,
            'payment_id'     => $this->payment_id,
            $this->mergeWhen($request->route()->getName() == 'appointments.index', [
                'bookings' => BookingResource::collection($this->bookings),
            ]),
            $this->mergeWhen($request->route()->getName() == 'appointments.show', [
                'doctor'   => new DoctorResource($this->doctor),
                'clinic'   => new ClinicResource($this->doctor->clinic),
                'bookings' => BookingResource::collection($this->bookings),
            ]),
            $this->mergeWhen($request->doctors, [
                'doctor' => new DoctorResource($this->doctor)
            ]),
            $this->mergeWhen($request->clinics, [
                'clinic' => new ClinicResource($this->doctor->clinic)
            ])
        ];
    }
}
