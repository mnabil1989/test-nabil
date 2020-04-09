<?php

namespace Andalusia\Survey\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
                    "question_id" => "required|integer",
                    "order"       => "nullable|integer",
                    "answer"      => "required",
                    "points"      => "nullable|integer"
                ];
            }
            case 'PUT': {
                return [
                    "question_id" => "nullable|integer",
                    "order"       => "nullable|integer",
                    "answer"      => "required",
                    "points"      => "nullable|integer"
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
