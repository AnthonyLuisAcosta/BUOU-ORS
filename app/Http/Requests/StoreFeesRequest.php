<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'appRef_id' => ['required', 'numeric'],
            'fees' => ['required', 'numeric'],
            'addFees1' => ['required', 'numeric'],
            'addFees2' => ['required', 'numeric'],
            'addFees3' => ['required', 'numeric'],
            'addFees4' => ['required', 'numeric'],
            'addFees5' => ['required', 'numeric'],
            'addFees6' => ['required', 'numeric'],
            'addFees7' => ['required', 'numeric'],
            'addFees8' => ['required', 'numeric'],
            'addFees9' => ['required', 'numeric'],
            'addFees10' => ['required', 'numeric'],
            'addCost1' => ['required', 'numeric'],
            'addCost2' => ['required', 'numeric'],
            'addCost3' => ['required', 'numeric'],
            'addCost4' => ['required', 'numeric'],
            'addCost5' => ['required', 'numeric'],
            'addCost6' => ['required', 'numeric'],
            'addCost7' => ['required', 'numeric'],
            'addCost8' => ['required', 'numeric'],
            'addCost9' => ['required', 'numeric'],
            'addCost10' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ];
    }
}
