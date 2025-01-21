<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
            'name' => ['required','max:50',Rule::unique('branches','name')->ignore($this->branch)],
            'country' => 'required|max:50',
            'city' => 'required|max:50',
            'address' => 'required|max:300',
            'code' => 'max:30',
            'phones' => 'required|max:50',
            'status' => 'required|numeric|min:0|max:1'
        ];
    }
}
