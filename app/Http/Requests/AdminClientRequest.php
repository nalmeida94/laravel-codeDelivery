<?php

namespace codeDelivery\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AdminClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
        ];
    }

    
}
