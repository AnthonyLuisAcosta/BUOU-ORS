<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * public function authorize()
    *{
      *  return true;
    *}
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'string'],
            'middleName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'birthDate' => ['required', 'date'],
            'gender' => ['required', 'enum'],
            'status' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'company' => ['required', 'string'],
            'address' => ['required', 'string'],
            'applicantImage' => ['required', 'string'],
        ];
    }
}
