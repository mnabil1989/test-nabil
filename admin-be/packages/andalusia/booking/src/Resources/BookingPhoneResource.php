<?php

namespace Andalusia\Booking\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BookingPhoneResource extends Resource
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
            'id'    => $this->id,
            'phone' => $this->phone,
            $this->mergeWhen($request->route()->getName() == 'booking_phones.show', [
                'booking' => new BookinResource($this->booking)
            ])
        ];
    }
}
