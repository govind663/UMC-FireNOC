<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeModeOperateRequest extends FormRequest
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
                'fee_construction_id' => 'required|string|max:250',
                'operation_mode' => 'required|string|max:250'
            ];
        }else{
            $rule = [
                'fee_construction_id' => 'required|string|max:250',
                'operation_mode' => 'required|string|max:250'
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'fee_construction_id.required' => 'Type Of Construction is required',
            'operation_mode.required' => 'Mode of Operation is required'
        ];
    }
}
