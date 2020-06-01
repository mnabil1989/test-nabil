<?php

namespace Andalusia\Booking\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BookingResource extends Resource
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
            'booking_confirmed' => $this->booking_confirmed,
            'payment_confirmed' => $this->payment_confirmed,
            $this->mergeWhen(!$request->calender, [
                'date' => $this->date,
            ]),
            $this->mergeWhen($request->calender, [
                'title' => $this->title,
                'start' => $this->start,
                'end'   => $this->end
            ]),
            $this->mergeWhen($request->route()->getName() != 'appointments.index' && !$request->calender, [
                'id'           => $this->id,
                'patient_name' => $this->patient_name
            ]),
            $this->mergeWhen($request->route()->getName() == 'bookings.show' && !$request->calender, [
                'notes'       => $this->notes,
                'appointment' => new AppointmentResource($this->appointment),
                'user'        => new UserResource($this->user)
            ]),
        ];
    }
}
