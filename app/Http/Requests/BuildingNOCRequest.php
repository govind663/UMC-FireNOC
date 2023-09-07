<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingNOCRequest extends FormRequest
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
            // === Basic Details
            'l_name' => 'required',
            'f_name' => 'required',
            'father_name' => 'required',
            'society_name' => 'required',
            'designation' => 'required',

            // ===== Address Details
            'house_name' => 'required',
            'flat_no' => 'required',
            'wing_name' => 'required',
            'road_name' => 'required',
            'area_name' => 'required',
            'taluka_name' => 'required',
            'pincode' => 'required',
            'ward_no' => 'required',
            'electrol_panel_no' => 'required',
            'contact_persion' => 'required',

            // 'tel_no' => 'nullable|numeric',
            // 'email' => 'nullable|email',

            // ===== Information of Property
            'types_of_property' => 'required',
            'property_no' => 'required',

            // ====== Information of Land
            'peermission_no' => 'required',
            'permission_date' => 'required',

            // ===== Other Document
            'maps_of_proposed_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'city_survey_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'sanad_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'competent_authority_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'dues_certificate_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

            // ===== Declaration
            'declare_by' => 'required',
            'declare_date' => 'required',
            'nominated_persion' => 'required',
            'nominated_persion_name' => 'required',
            'deliver_by' => 'required',
            'd_last_name' => 'required',
            'd_first_name' => 'required',
            'd_father_name' => 'required',
            'd_house_name' => 'required',
            'd_flat_no' => 'required',
            'd_wing_no' => 'required',
            'd_road_name' => 'required',
            'd_area_name' => 'required',
            'd_taluka_name' => 'required',
            'd_pincode' => 'required'
        ];
    }

    public function messages()
    {
        return [
            // === Basic Details
            'l_name.required' => 'Last Name / Surname is required',
            'f_name.required' => 'First Name is required',
            'father_name.required' => "Father / Husband's Name is required",
            'society_name.required' => 'Name of Society is required',
            'designation.required' => 'Designation is required',

            // ===== Address Details
            'house_name.required' => 'House / Building / Society Name is required',
            'flat_no.required' => 'Flat / Block / Barrack No. is required',
            'wing_name.required' => 'Wing / Floor is required',
            'road_name.required' => 'Road / Street / Lane is required',
            'area_name.required' => 'Area / Locality / Town / City is required',
            'taluka_name.required' => 'Taluka is required',
            'pincode.required' => 'Pincode is required',
            'ward_no.required' => 'Ward Committee No is required',
            'electrol_panel_no.required' => 'Electrol Panel No is required',

            // ===== Information of Property
            'types_of_property.required' => 'Type of Property is required',
            'property_no.required' => 'Property Number is required',

            // ====== Information of Land
            'peermission_no.required' => 'Construction Permission Number is required',
            'permission_date.required' => 'Date of Permission is required',


             // ===== Other Document
            'maps_of_proposed_doc.required' => 'Document Of Property is required',
            'maps_of_proposed_doc.max' => 'The file size should be less than 2MB.',
            'maps_of_proposed_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'city_survey_doc.required' => 'Location of Place is required',
            'city_survey_doc.max' => 'The file size should be less than 2MB.',
            'city_survey_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'sanad_doc.required' => 'Letter from License Holder regarding proper electric connection is required',
            'sanad_doc.max' => 'The file size should be less than 2MB.',
            'sanad_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'competent_authority_doc.required' => 'Shop License is required',
            'competent_authority_doc.max' => 'The file size should be less than 2MB.',
            'competent_authority_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'dues_certificate_doc.required' => 'Up-to-date receipt of Tax bill paid is required',
            'dues_certificate_doc.max' => 'The file size should be less than 2MB.',
            'dues_certificate_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

             // ===== Declaration
             'declare_by.required' => 'Applicant Name is required',
             'declare_date.required' => 'Date is required',
             'nominated_persion.required' => 'Self / Nominated Person is required',
             'nominated_persion_name.required' => 'Name of Nominated Person is required',
             'deliver_by.required' => 'Deliver by is required',
             'd_last_name.required' => 'Last Name / Surname is required',
             'd_first_name.required' => 'First Name is required',
             'd_father_name.required' => "Father / Husband's Name is required",
             'd_house_name.required' => 'House / Building / Society Name is required',
             'd_flat_no.required' => 'Flat / Block / Barrack No. is required',
             'd_wing_no.required' => 'Wing / Floor is required',
             'd_road_name.required' => 'Road / Street / Lane is required',
             'd_area_name.required' => 'Area / Locality / Town / City is required',
             'd_taluka_name.required' => 'Taluka is required',
             'd_pincode.required' => 'Pincode is required'

        ];
    }
}
