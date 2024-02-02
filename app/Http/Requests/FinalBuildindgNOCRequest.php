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
                'father_name' => 'nullable',
                'society_name' => 'required',
                'designation' => 'nullable',

                // ===== Address Details
                'house_name' => 'nullable',
                'flat_no' => 'nullable',
                'wing_name' => 'nullable',
                'road_name' => 'nullable',
                'area_name' => 'nullable',
                'taluka_name' => 'nullable',
                'pincode' => 'nullable',
                'ward_no' => 'nullable',
                'electrol_panel_no' => 'nullable',
                'contact_persion' => 'required',
                // 'tel_no' => 'nullable|numeric',
                // 'email' => 'nullable|email',

                // ===== Information of Property
                'types_of_property' => 'nullable',
                'property_no' => 'nullable',

                // ====== Information of Land
                'peermission_no' => 'nullable',
                'permission_date' => 'nullable',

                // ===== Other Document
                'fire_equipments_install_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',

                // ===== Declaration
                'declare_by' => 'nullable',
                'declare_date' => 'nullable',
                'nominated_persion' => 'nullable',
                'nominated_persion_name' => 'nullable',
                'deliver_by' => 'nullable',
                'd_last_name' => 'nullable',
                'd_first_name' => 'nullable',
                'd_father_name' => 'nullable',
                'd_house_name' => 'nullable',
                'd_flat_no' => 'nullable',
                'd_wing_no' => 'nullable',
                'd_road_name' => 'nullable',
                'd_area_name' => 'nullable',
                'd_taluka_name' => 'nullable',
                'd_pincode' => 'nullable'
            ];
        }else{
            $rule = [
                // === Basic Details
                'l_name' => 'required',
                'f_name' => 'required',
                'father_name' => 'nullable',
                'society_name' => 'required',
                'designation' => 'nullable',

                // ===== Address Details
                'house_name' => 'nullable',
                'flat_no' => 'nullablel',
                'wing_name' => 'nullablel',
                'road_name' => 'nullablel',
                'area_name' => 'nullablel',
                'taluka_name' => 'nullablel',
                'pincode' => 'nullablel',
                'ward_no' => 'nullablel',
                'electrol_panel_no' => 'nullablel',
                'contact_persion' => 'required',
                // 'tel_no' => 'nullable|numeric',
                // 'email' => 'nullable|email',

                // ===== Information of Property
                'types_of_property' => 'nullable',
                'property_no' => 'nullable',

                // ====== Information of Land
                'peermission_no' => 'nullable',
                'permission_date' => 'nullable',

                // ===== Other Document
                'fire_equipments_install_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',

                // ===== Declaration
                'declare_by' => 'nullable',
                'declare_date' => 'nullable',
                'nominated_persion' => 'nullable',
                'nominated_persion_name' => 'nullable',
                'deliver_by' => 'nullable',
                'd_last_name' => 'nullable',
                'd_first_name' => 'nullable',
                'd_father_name' => 'nullable',
                'd_house_name' => 'nullable',
                'd_flat_no' => 'nullable',
                'd_wing_no' => 'nullable',
                'd_road_name' => 'nullable',
                'd_area_name' => 'nullable',
                'd_taluka_name' => 'nullable',
                'd_pincode' => 'nullable'
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
            'fire_equipments_install_doc.max' => 'The file size should be less than 2MB.',
            'fire_equipments_install_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

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
