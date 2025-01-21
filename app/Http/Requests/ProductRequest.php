<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'code' => ['required','min:5','max:15',Rule::unique('products','code')->ignore($this->product)],
            'name' => ['required','max:50',Rule::unique('products','name')->ignore($this->product)],
            'tradename' => ['required','max:50',Rule::unique('products','tradename')->ignore($this->product)],
            'description' => 'max:400',
            'brand' => 'max:100',
            'quantity_min' => 'numeric|min:0',
            'quantity_max' => 'numeric|min:0',
            'barcode' => 'max:50',
            'category_id' => 'required', 
            'status' => 'required|numeric|min:0|max:2'
        ];
    }
}
