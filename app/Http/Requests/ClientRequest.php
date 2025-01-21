<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
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
            /* 'dni' => 'required|unique:clients,dni|min:5|max:15', */
            /* 'name' => ['required','max:50',Rule::unique('categories','name')->ignore($this->category)], */

            'dni' => ['required','min:5','max:15',Rule::unique('clients','dni')->ignore($this->client)],
            //'city' => 'required',
            'name' => 'required|max:50',            
            'last_name' => 'required|max:80',
            'sex' => 'required|max:30',
            'birth_date' => 'required|date_format:Y-m-d', 
            'home_address' => 'max:300',
            'business_address' => 'max:300',
            'phones' => 'required|max:50',
            'email' => 'max:100',
            //'type' => 'required|max:30',
            'job' => 'max:100',
            'status' => 'required|numeric|min:0|max:2'
        ];
    }
}
