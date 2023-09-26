<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeBldgHtRequest extends FormRequest
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
                'fee_mode_operate_id' => 'required|string|max:250',
                'building_ht' => 'required|string|max:250'
            ];
        }else{
            $rule = [
                'fee_construction_id' => 'required|string|max:250',
                'fee_mode_operate_id' => 'required|string|max:250',
                'building_ht' => 'required|string|max:250'
            ];
        }

        return $rule;
    }


    public function messages()
    {
        return [
            'fee_construction_id.required' => 'Type Of Construction is required',
            'fee_mode_operate_id.required' => 'Mode of Operation is required',
            'building_ht.required' => 'Building Height / Type is required'
        ];
    }
}
