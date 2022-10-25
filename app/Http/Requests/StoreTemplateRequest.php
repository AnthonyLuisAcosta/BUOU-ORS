<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * public function authorize()
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
            'type' => ['required', 'string'],
            'units' => ['required', 'numeric'],
            'admission' => ['required', 'numeric'],
            'tuition' => ['required', 'numeric'],
            'matricula' => ['required', 'numeric'],
            'medical' => ['required', 'numeric'],
            'library' => ['required', 'numeric'],
            'athletic' => ['required', 'numeric'],
            'cultural' => ['required', 'numeric'],
            'guidance' => ['required', 'numeric'],
            'scuaa' => ['required', 'numeric'],
            'distLearn' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ];
    }
}
