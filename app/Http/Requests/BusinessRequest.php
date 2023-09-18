<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
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
        if ($this->id){
            $rule = [
                'business_nature' => 'required|string|max:250'
            ];
        }else{
            $rule = [
                'business_nature' => 'required|string|max:250'
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'business_nature.required' => 'Nature / Particulars of Busines is required'
        ];
    }
}
