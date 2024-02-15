<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinalBuildindgNOCRequest extends FormRequest
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
                // === Basic Details
                'l_name' => 'required',
                'f_name' => 'required',
                'father_name' => 'sometimes|nullable|string',
                'society_name' => 'required',
                'designation' => 'sometimes|nullable|string',

                // ===== Address Details
                'house_name' => 'sometimes|nullable|string',
                'flat_no' => 'sometimes|nullable|string',
                'wing_name' => 'sometimes|nullable|string',
                'road_name' => 'sometimes|nullable|string',
                'area_name' => 'sometimes|nullable|string',
                'taluka_name' => 'sometimes|nullable|string',
                'pincode' => 'sometimes|nullable|string',
                'ward_no' => 'sometimes|nullable|string',
                'electrol_panel_no' => 'sometimes|nullable|string',
                'contact_persion' => 'required',
                // 'tel_no' => 'sometimes|nullable|string|numeric',
                // 'email' => 'sometimes|nullable|string|email',

                // ===== Information of Property
                'types_of_property' => 'sometimes|nullable|string',
                'property_no' => 'sometimes|nullable|string',

                // ====== Information of Land
                'peermission_no' => 'sometimes|nullable|string',
                'permission_date' => 'sometimes|nullable|string',

                // ===== Other Document
                'fire_equipments_install_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',

                // ===== Declaration
                'declare_by' => 'sometimes|nullable|string',
                'declare_date' => 'sometimes|nullable|string',
                'nominated_persion' => 'sometimes|nullable|string',
                'nominated_persion_name' => 'sometimes|nullable|string',
                'deliver_by' => 'sometimes|nullable|string',
                'd_last_name' => 'sometimes|nullable|string',
                'd_first_name' => 'sometimes|nullable|string',
                'd_father_name' => 'sometimes|nullable|string',
                'd_house_name' => 'sometimes|nullable|string',
                'd_flat_no' => 'sometimes|nullable|string',
                'd_wing_no' => 'sometimes|nullable|string',
                'd_road_name' => 'sometimes|nullable|string',
                'd_area_name' => 'sometimes|nullable|string',
                'd_taluka_name' => 'sometimes|nullable|string',
                'd_pincode' => 'sometimes|nullable|string'
            ];
        }else{
            $rule = [
                // === Basic Details
                'l_name' => 'required',
                'f_name' => 'required',
                'father_name' => 'sometimes|nullable|string',
                'society_name' => 'required',
                'designation' => 'sometimes|nullable|string',

                // ===== Address Details
                'house_name' => 'sometimes|nullable|string',
                'flat_no' => 'sometimes|nullable|string',
                'wing_name' => 'sometimes|nullable|string',
                'road_name' => 'sometimes|nullable|string',
                'area_name' => 'sometimes|nullable|string',
                'taluka_name' => 'sometimes|nullable|string',
                'pincode' => 'sometimes|nullable|string',
                'ward_no' => 'sometimes|nullable|string',
                'electrol_panel_no' => 'sometimes|nullable|string',
                'contact_persion' => 'required',
                // 'tel_no' => 'sometimes|nullable|string|numeric',
                // 'email' => 'sometimes|nullable|string|email',

                // ===== Information of Property
                'types_of_property' => 'sometimes|nullable|string',
                'property_no' => 'sometimes|nullable|string',

                // ====== Information of Land
                'peermission_no' => 'sometimes|nullable|string',
                'permission_date' => 'sometimes|nullable|string',

                // ===== Other Document
                'fire_equipments_install_doc' => 'sometimes|nullable|mimes:jpeg,png,jpg,pdf|max:8388608',

                // ===== Declaration
                'declare_by' => 'sometimes|nullable|string',
                'declare_date' => 'sometimes|nullable|string',
                'nominated_persion' => 'sometimes|nullable|string',
                'nominated_persion_name' => 'sometimes|nullable|string',
                'deliver_by' => 'sometimes|nullable|string',
                'd_last_name' => 'sometimes|nullable|string',
                'd_first_name' => 'sometimes|nullable|string',
                'd_father_name' => 'sometimes|nullable|string',
                'd_house_name' => 'sometimes|nullable|string',
                'd_flat_no' => 'sometimes|nullable|string',
                'd_wing_no' => 'sometimes|nullable|string',
                'd_road_name' => 'sometimes|nullable|string',
                'd_area_name' => 'sometimes|nullable|string',
                'd_taluka_name' => 'sometimes|nullable|string',
                'd_pincode' => 'sometimes|nullable|string'
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            // === Basic Details
            'l_name.required' => 'Last Name / Surname is required',
            'f_name.required' => 'First Name is required',
            // 'father_name.required' => "Father / Husband's Name is required",
            'society_name.required' => 'Name of Society is required',
            // 'designation.required' => 'Designation is required',

            // ===== Address Details
            // 'house_name.required' => 'House / Building / Society Name is required',
            // 'flat_no.required' => 'Flat / Block / Barrack No. is required',
            // 'wing_name.required' => 'Wing / Floor is required',
            // 'road_name.required' => 'Road / Street / Lane is required',
            // 'area_name.required' => 'Area / Locality / Town / City is required',
            // 'taluka_name.required' => 'Taluka is required',
            // 'pincode.required' => 'Pincode is required',
            // 'ward_no.required' => 'Ward Committee No is required',
            // 'electrol_panel_no.required' => 'Electrol Panel No is required',
            'contact_persion.required' => 'Contact Person is required',

            // ===== Information of Property
            // 'types_of_property.required' => 'Type of Property is required',
            // 'property_no.required' => 'Property Number is required',

            // ====== Information of Land
            // 'peermission_no.required' => 'Construction Permission Number is required',
            // 'permission_date.required' => 'Date of Permission is required',


             // ===== Other Document
            // 'fire_equipments_install_doc.required' => 'Commissioning Certificate of Fire extinguishers / preventive equipments of I.S.I. Mark is required',
            'fire_equipments_install_doc.max' => 'The file size should be less than 10MB.',
            'fire_equipments_install_doc.mimes' => 'Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

             // ===== Declaration
            //  'declare_by.required' => 'Applicant Name is required',
            //  'declare_date.required' => 'Date is required',
            //  'nominated_persion.required' => 'Self / Nominated Person is required',
            //  'nominated_persion_name.required' => 'Name of Nominated Person is required',
            //  'deliver_by.required' => 'Deliver by is required',
            //  'd_last_name.required' => 'Last Name / Surname is required',
            //  'd_first_name.required' => 'First Name is required',
            //  'd_father_name.required' => "Father / Husband's Name is required",
            //  'd_house_name.required' => 'House / Building / Society Name is required',
            //  'd_flat_no.required' => 'Flat / Block / Barrack No. is required',
            //  'd_wing_no.required' => 'Wing / Floor is required',
            //  'd_road_name.required' => 'Road / Street / Lane is required',
            //  'd_area_name.required' => 'Area / Locality / Town / City is required',
            //  'd_taluka_name.required' => 'Taluka is required',
            //  'd_pincode.required' => 'Pincode is required'

        ];
    }
}
