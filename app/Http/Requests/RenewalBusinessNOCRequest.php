<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenewalBusinessNOCRequest extends FormRequest
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

                // ===== Information of Property
                'types_of_property' => 'required',
                'property_no' => 'required',

                // ====== Information of Land
                'city_name' => 'required',
                'survey_no' => 'required',
                'cts_no' => 'required',
                'part_no' => 'required',
                'plot_no' => 'required',
                'land_property_no' => 'required',

                // ===== Necessary Particulars about above service
                'area_pincode' => 'required',
                'shop_no' => 'required',
                'building_height' => 'required',
                'rooms_in_buld' => 'required',
                'property_on_floor_buld' => 'required',
                'no_of_accomodation_people' => 'required',
                'area' => 'required',
                'no_of_workers' => 'required',
                'types_of_business' => 'required',
                'no_of_workers_sleep_night' => 'required',
                'fire_equips' => 'required',
                'business_address' => 'required',

                // ===== Other Document
                'location_map_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'electric_license_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'gas_license_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'shop_license_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'food_license' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'tax_bill_paid_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'trade_license' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'gas_certificate_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'commissioning_certificate' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'construction_plan_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',

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
        }else{
            $rule = [
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

                // ===== Information of Property
                'types_of_property' => 'required',
                'property_no' => 'required',

                // ====== Information of Land
                'city_name' => 'required',
                'survey_no' => 'required',
                'cts_no' => 'required',
                'part_no' => 'required',
                'plot_no' => 'required',
                'land_property_no' => 'required',

                // ===== Necessary Particulars about above service
                'area_pincode' => 'required',
                'shop_no' => 'required',
                'building_height' => 'required',
                'rooms_in_buld' => 'required',
                'property_on_floor_buld' => 'required',
                'no_of_accomodation_people' => 'required',
                'area' => 'required',
                'no_of_workers' => 'required',
                'types_of_business' => 'required',
                'no_of_workers_sleep_night' => 'required',
                'fire_equips' => 'required',
                'business_address' => 'required',

                // ===== Other Document
                'location_map_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'electric_license_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'gas_license_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'shop_license_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'food_license' => 'mimes:jpeg,png,jpg,pdf|max:2048',
                'tax_bill_paid_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'trade_license' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'gas_certificate_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'commissioning_certificate' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
                'construction_plan_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

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
        return $rule;
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
            'contact_persion.required' => 'Contact Person is required',

            // ===== Information of Property
            'types_of_property.required' => 'Type of Property is required',
            'property_no.required' => 'Property Number is required',

            // ====== Information of Land
            'city_name.required' => 'Town / City is required',
            'survey_no.required' => 'Survey / Block / Barrak No. is required',
            'cts_no.required' => 'C.T.S. No. is required',
            'part_no.required' => 'Part No. / Sheet No. is required',
            'plot_no.required' => 'Plot No. / Unit No. is required',
            'land_property_no.required' => 'Property Number is required',

            // ===== Necessary Particulars about above service
            'area_pincode.required' => 'Pincode is required',
            'shop_no.required' => 'Shop No. is required',
            'building_height.required' => 'Height of Building is required',
            'rooms_in_buld.required' => 'Rooms in Building is required',
            'property_on_floor_buld.required' => 'Property on Floor Building is required',
            'no_of_accomodation_people.required' => 'Accomodation for how many People is required',
            'area.required' => "Area of Place (Sq. Mt.) is required",
            'no_of_workers.required' => 'Numbers of Workers / Servants is required',
            'types_of_business.required' => 'Type of Business is required',
            'no_of_workers_sleep_night.required' => 'Number of Workers / Servants sleep at night at working place is required',
            'fire_equips.required' => 'Fire extinguishers/ preventive equipments are installed at working place is required',
            'business_address.required' => 'Address Of Business Place is required',

             // ===== Other Document

            'electric_license_doc.required' => 'Letter from License Holder regarding proper electric connection is required',
            'electric_license_doc.max' => 'The file size should be less than 2MB.',
            'electric_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'gas_license_doc.required' => 'Letter from connection holder and license regarding proper cooking gas connection is required',
            'gas_license_doc.max' => 'The file size should be less than 2MB.',
            'gas_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'shop_license_doc.required' => 'Shop License is required',
            'shop_license_doc.max' => 'The file size should be less than 2MB.',
            'shop_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'food_license.required' => 'Food License is required',
            'food_license.max' => 'The file size should be less than 2MB.',
            'food_license.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'tax_bill_paid_doc.required' => 'Up-to-date receipt of Tax bill paid is required',
            'tax_bill_paid_doc.max' => 'The file size should be less than 2MB.',
            'tax_bill_paid_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'trade_license.required' => 'Trade License (Kerosene/Other Petroleum Stock/ Explosive goods) is required',
            'trade_license.max' => 'The file size should be less than 2MB.',
            'trade_license.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'gas_certificate_doc.required' => 'Commissioning Certificate of Gas Fitting is required',
            'gas_certificate_doc.max' => 'The file size should be less than 2MB.',
            'gas_certificate_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'commissioning_certificate.required' => 'Commissioning Certificate of Fire extinguishers/ preventive equipments of I.S.I. Mark is required',
            'commissioning_certificate.max' => 'The file size should be less than 2MB.',
            'commissioning_certificate.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'construction_plan_doc.required' => 'Maps of Proposed Construction is required',
            'construction_plan_doc.max' => 'The file size should be less than 2MB.',
            'construction_plan_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

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
