<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeConstructionRequest extends FormRequest
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
                'construction_type' => 'required|string|max:250'
            ];
        }else{
            $rule = [
                'construction_type' => 'required|string|max:250'
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'construction_type.required' => 'Type Of Construction is required'
        ];
    }
}
