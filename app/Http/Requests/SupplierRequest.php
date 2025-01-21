<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
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
            /* 'name' => ['required','max:50',Rule::unique('categories','name')->ignore($this->category)], */
            'tin' => ['required','min:5','max:20',Rule::unique('suppliers','tin')->ignore($this->supplier)],
            'name' => 'required|max:80',
            'address' => 'required|max:300',
            'city' => 'required|max:50',
            'phones' => 'required|max:50',
            'email' => 'max:100',
            'account' => 'max:300',
            'contact' => 'required|max:300',
            'field1' => 'max:100',
            'status' => 'required|numeric|min:0|max:2'
        ];
    }
}
