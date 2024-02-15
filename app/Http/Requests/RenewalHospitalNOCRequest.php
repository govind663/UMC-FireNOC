<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenewalHospitalNOCRequest extends FormRequest
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
                'hospital_name' => 'required',
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
                'city_name' => 'nullable',
                'survey_no' => 'nullable',
                'cts_no' => 'nullable',
                'part_no' => 'nullable',
                'plot_no' => 'nullable',
                'land_property_no' => 'nullable',

                // ===== Necessary Particulars about above service
                'area_pincode' => 'nullable',
                'types_of_hospital' => 'nullable',
                // 'from_date' => 'nullable',
                // 'to_date' => 'nullable',
                'shop_no' => 'nullable',
                'area_place_measurments' => 'nullable',
                'total_staff' => 'nullable',
                'total_sleeping_staff' => 'nullable',
                'hospital_fireequip' => 'nullable',
                'hospital_address' => 'nullable',

                // ===== Other Document
                'property_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'location_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'electric_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'shop_license_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'paid_tax_bill_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'commissioning_certificate' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'affidavit_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'corporation_certificate' => 'mimes:jpeg,png,jpg,pdf|max:8388608',
                'construction_plan_doc' => 'mimes:jpeg,png,jpg,pdf|max:8388608',

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
                'd_pincode' => 'nullable',
            ];
        }else{
            $rule = [
                // === Basic Details
                'l_name' => 'required',
                'f_name' => 'required',
                'father_name' => 'nullable',
                'hospital_name' => 'required',
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
                'city_name' => 'nullable',
                'survey_no' => 'nullable',
                'cts_no' => 'nullable',
                'part_no' => 'nullable',
                'plot_no' => 'nullable',
                'land_property_no' => 'nullable',

                // ===== Necessary Particulars about above service
                'area_pincode' => 'nullable',
                'types_of_hospital' => 'nullable',
                // 'from_date' => 'nullable',
                // 'to_date' => 'nullable',
                'shop_no' => 'nullable',
                'area_place_measurments' => 'nullable',
                'total_staff' => 'nullable',
                'total_sleeping_staff' => 'nullable',
                'hospital_fireequip' => 'nullable',
                'hospital_address' => 'nullable',

                // ===== Other Document
                'property_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'location_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'electric_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'shop_license_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'paid_tax_bill_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'commissioning_certificate' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'affidavit_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'corporation_certificate' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',
                'construction_plan_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:8388608',

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
                'd_pincode' => 'nullable',
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
            'hospital_name.required' => 'Name of Hospital is required',
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
            // 'city_name.required' => 'Town / City is required',
            // 'survey_no.required' => 'Survey / Block / Barrak No. is required',
            // 'cts_no.required' => 'C.T.S. No. is required',
            // 'part_no.required' => 'Part No. / Sheet No. is required',
            // 'plot_no.required' => 'Plot No. / Unit No. is required',
            // 'land_property_no.required' => 'Property Number is required',

            // ===== Necessary Particulars about above service
            // 'area_pincode.required' => 'Pincode is required',
            // 'types_of_hospital.required' => 'Type of Hospital is required',
            // 'from_date.required' => 'From Date is required',
            // 'to_date.required' => 'To Date is required',
            // 'shop_no.required' => 'Shop No. is required',
            // 'area_place_measurments.required' => 'Area of Place (Sq. Mt.) is required',
            // 'total_staff.required' => "Numbers of Staff is required",
            // 'total_sleeping_staff.required' => 'Number of Staff sleep at night at working place is required',
            // 'hospital_fireequip.required' => 'Fire extinguishers / preventive equipments are installed at working place is required',
            // 'hospital_address.required' => 'Address Of Hospital Place is required',

             // ===== Other Document
            // 'property_doc.required' => 'Document Of Property is required',
            'property_doc.max' => 'The file size should be less than 10MB.',
            'property_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'location_doc.required' => 'Copy of Previous NOC is required',
            'location_doc.max' => 'The file size should be less than 10MB.',
            'location_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'electric_doc.required' => 'Letter from License Holder regarding proper electric connection is required',
            'electric_doc.max' => 'The file size should be less than 10MB.',
            'electric_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'shop_license_doc.required' => 'Shop License is required',
            'shop_license_doc.max' => 'The file size should be less than 10MB.',
            'shop_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'paid_tax_bill_doc.required' => 'Up-to-date receipt of Tax bill paid is required',
            'paid_tax_bill_doc.max' => 'The file size should be less than 10MB.',
            'paid_tax_bill_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'commissioning_certificate.required' => 'Commissioning Certificate of Fire extinguishers / preventive equipments of I.S.I. Mark is required',
            'commissioning_certificate.max' => 'The file size should be less than 10MB.',
            'commissioning_certificate.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'affidavit_doc.required' => 'Copy of Affidavit is required',
            'affidavit_doc.max' => 'The file size should be less than 10MB.',
            'affidavit_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'corporation_certificate.required' => 'Corporation Registration certificate (FOR OLD HOSPITAL) is required',
            'corporation_certificate.max' => 'The file size should be less than 10MB.',
            'corporation_certificate.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'construction_plan_doc.required' => 'Maps of Proposed Construction is required',
            'construction_plan_doc.max' => 'The file size should be less than 10MB.',
            'construction_plan_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

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
            //  'd_pincode.required' => 'Pincode is required',

        ];
    }
}
