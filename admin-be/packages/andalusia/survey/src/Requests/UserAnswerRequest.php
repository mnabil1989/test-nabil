<?php

namespace Andalusia\Survey\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAnswerRequest extends FormRequest
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
                    'user_info_id' => 'required|integer',
                    'answer_id'    => 'required_if:answer_text,|integer',
                    'answer_text'  => 'required_if:answer_id,'
                ];
            }
            case 'PUT': {
                return [
                    'user_info_id' => 'required|integer',
                    'answer_id'    => 'required_if:answer_text,|integer',
                    'answer_text'  => 'required_if:answer_id,'
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
