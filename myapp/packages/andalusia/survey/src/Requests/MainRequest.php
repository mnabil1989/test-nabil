<?php

namespace Andalusia\Survey\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
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
                    'same_page'                   => 'required|boolean',
                    'popup_type'                  => 'required|in:small,big',
                    'popup_timer'                 => 'required|integer',
                    'number_of_questions_on_page' => 'required_if:popup_type,small',
                    'slug'                        => 'required_if:same_page,0|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                    'note'                        => 'required',
                    'redirect_link'               => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'same_page'                   => 'required|boolean',
                    'popup_type'                  => 'required|in:small,big',
                    'popup_timer'                 => 'required|integer',
                    'number_of_questions_on_page' => 'required_if:popup_type,small',
                    'slug'                        => 'required_if:same_page,1|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                    'note'                        => 'required',
                    'redirect_link'               => 'required'
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
