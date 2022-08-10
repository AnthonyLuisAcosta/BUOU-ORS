<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
        return false;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subj_code' => [
                'required', 'string', 'unique:subjects',
            ],
            'title' => [
                'required', 'string',
            ],
            'programs_id' => ['required', 'string',],
            'cat_id' => ['required', 'string'],
            'programs_id' => ['required', 'string'],
            'prof' => ['required', 'string'],
            /*'units' => ['required', 'numeric'],
            'term' => ['required', 'enum'],
            'is_enabled' => ['required', 'boolean'],*/
        ];
    }
}
