<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     
    public function authorize()
    {
        return false;
    } **/

    /*Get the validation rules that apply to the request */
    public function rules()
    {
        return [
            'code' => [
                'required', 'string',
            ],
            'description' => [
                'required', 'string',
            ],
        ];
    }
}