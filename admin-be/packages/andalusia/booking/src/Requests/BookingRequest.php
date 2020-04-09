<?php

namespace Andalusia\Booking\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
                    'paginate' => 'nullable|int|min:1|max:1000'
                ];
            }
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'appointment_id'  => 'required|integer',
                    'patient_name'    => 'nullable',
                    'date'            => 'required|date_format:Y-m-d',
                    'phones'          => 'array',
                    'phones.*.number' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']
                ];
            }
            case 'PUT': {
                return [
                    'appointment_id'  => 'required|integer',
                    'patient_name'    => 'nullable',
                    'date'            => 'required|date_format:Y-m-d',
                    'phones'          => 'array',
                    'phones.*.number' => ['required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/']
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
