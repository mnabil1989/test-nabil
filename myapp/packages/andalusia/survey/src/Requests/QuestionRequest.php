<?php

namespace Andalusia\Survey\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
                    'order'     => 'nullable|integer',
                    'question'  => 'required',
                    'form_type' => 'required|in:text,textarea,menu,checkbox,radio',
                ];
            }
            case 'PUT': {
                return [
                    'survey_id' => 'nullable|integer',
                    'order'     => 'nullable|integer',
                    'question'  => 'required',
                    'form_type' => 'required|in:text,textarea,menu,checkbox,radio',
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
