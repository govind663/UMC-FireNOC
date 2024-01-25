<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitizePaymentRequest extends FormRequest
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
                'fee_mode_operate_id' => 'string|max:250',
                'wing_option' => 'string|max:250',
                'fee_bldg_ht_id' => 'string|max:250',
                'total_charges_cost' => 'required|numeric|min:1|nullable',
            ];
        }else{
            $rule = [
                'fee_construction_id' => 'required|string|max:250',
                'fee_mode_operate_id' => 'string|max:250',
                'wing_option' => 'string|max:250',
                'total_charges_cost' => 'required|numeric|min:1|nullable',
            ];
        }

        return $rule;
    }

    public function messages()
    {
        return [
            'fee_construction_id.required' => 'Type Of NOC is required',
            'fee_mode_operate_id.required' => 'Mode of Operation is required',
            'wing_option.required' => 'Is this wing or not ? is required',
            'fee_bldg_ht_id.required' => 'Building Height / Type is required',
            'total_charges_cost.required' => 'Total NOC Charges is required'
        ];
    }
}
