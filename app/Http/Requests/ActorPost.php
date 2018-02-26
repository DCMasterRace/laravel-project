<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'name' => 'required|min:5|max:50',
			'sex' => 'required|min:4|max:6',
			'bio' => 'required|min:10',
			'dob' => 'required'
        ];
    }
}
