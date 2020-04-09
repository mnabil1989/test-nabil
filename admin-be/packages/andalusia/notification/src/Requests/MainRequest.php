<?php

namespace Andalusia\Notification\Requests;

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
                    'image'     => 'nullable',
                    'thumbnail' => 'nullable',
                    'link'      => 'required|regex:#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si',
                    'message'   => 'required',
                    'type'      => 'required|in:normal,offer'
                ];
            }
            case 'PUT': {
                return [
                    'image'     => 'nullable',
                    'thumbnail' => 'nullable',
                    'link'      => 'nullable|regex:#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si',
                    'message'   => 'nullable',
                    'type'      => 'nullable|in:normal,offer',
                    'is_read'   => 'nullable|boolean'
                ];
            }
            case 'PATCH': {
                return [];
            }
        }
    }
}
