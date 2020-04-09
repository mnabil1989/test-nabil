<?php

namespace Andalusia\Survey\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
                    'survey_id' => 'required|integer',
                    'email'     => 'required|email',
                    'phone'     => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                ];
            }
            case 'PUT': {
                return [
                    'survey_id'        => 'nullable|integer',
                    'email'            => 'required|email',
                    'phone'            => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'is_survey_closed' => 'nullable|boolean'
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
