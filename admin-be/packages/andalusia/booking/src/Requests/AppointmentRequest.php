<?php

namespace Andalusia\Booking\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method())  {
            case 'GET': {
                return [
                    'paginate'  => 'nullable|int|min:1|max:1000',
                    'doctors'   => 'nullable|boolean',
                    'clinics'   => 'nullable|boolean',
                    'doctor_id' => 'nullable|integer',
                    'clinic_id' => 'nullable|integer'
                ];
            }
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'doctor_id'      => 'required|integer',
                    'day'            => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
                    'from'           => 'required',
                    'to'             => 'required',
                    'payment_method' => 'required|in:cash,card,insurance',
                    'payment_id'     => 'nullable|integer'
                ];
            }
            case 'PUT': {
                return [
                    'doctor_id'      => 'required|integer',
                    'day'            => 'required|in:Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday',
                    'from'           => 'required',
                    'to'             => 'required',
                    'payment_method' => 'required|in:cash,card,insurance',
                    'payment_id'     => 'nullable|integer'
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
