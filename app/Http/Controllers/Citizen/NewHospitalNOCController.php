<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Hospital_NOC;
use App\Models\NOC_Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HospitalNOCRequest;

class NewHospitalNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $data = DB::table('hospital_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as NH_NOC_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 3)  // ==== Renew Hospital NOC (status=3)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->get();
        // dd($data);

        return view('citizen.hospital_noc.new_hospital_noc.grid')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citizen.hospital_noc.new_hospital_noc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalNOCRequest $request)
    {
        $noc_master = new NOC_Master();

        $noc_master->noc_a_date = date('Y-m-d', strtotime($request->get('nocs_a_date')));
        $noc_master->citizen_id = $request->get('citizens_id');
        $noc_master->noc_mode = $request->get('noc_mode');
        $noc_master->declare_date = date('Y-m-d', strtotime($request->get('declare_date')));
        $noc_master->declare_by = $request->get('declare_by');
        $noc_master->nominated_persion = $request->get('nominated_persion');
        $noc_master->nominated_persion_name = $request->get('nominated_persion_name');
        $noc_master->deliver_by = $request->get('deliver_by');
        $noc_master->d_last_name = $request->get('d_last_name');
        $noc_master->d_first_name = $request->get('d_first_name');
        $noc_master->d_father_name = $request->get('d_father_name');
        $noc_master->d_house_name = $request->get('d_house_name');
        $noc_master->d_flat_no = $request->get('d_flat_no');
        $noc_master->d_wing_no = $request->get('d_wing_no');
        $noc_master->d_road_name = $request->get('d_road_name');
        $noc_master->d_area_name = $request->get('d_area_name');
        $noc_master->d_taluka_name = $request->get('d_taluka_name');
        $noc_master->d_pincode = $request->get('d_pincode');
        $noc_master->d_email = $request->get('d_email');
        $noc_master->inserted_dt = date("Y-m-d H:i:s");
        $noc_master->inserted_by = Auth::user()->id;
        $noc_master->save();

        // ==== Generate New Hospital NOC Token Number
        $unique_id = "UMC/HN/".rand(1000,10000000);
        $update = [
            'mst_token' => $unique_id.$noc_master->id ,
        ];
        NOC_Master::where('id', $noc_master->id)->update($update);

        $data = new Hospital_NOC();

        // ==== Upload (property_doc)
        if (!empty($request->hasFile('property_doc'))) {
            $image = $request->file('property_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/property_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/property_doc" . $image_name;
            $data->property_doc = $new_name;
        }

        // ==== Upload (location_doc)
        if (!empty($request->hasFile('location_doc'))) {
            $image = $request->file('location_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/location_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/location_doc" . $image_name;
            $data->location_doc = $new_name;
        }

        // ==== Upload (electric_doc)
        if (!empty($request->hasFile('electric_doc'))) {
            $image = $request->file('electric_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/electric_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/electric_doc" . $image_name;
            $data->electric_doc = $new_name;
        }

        // ==== Upload (shop_license_doc)
        if (!empty($request->hasFile('shop_license_doc'))) {
            $image = $request->file('shop_license_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/shop_license_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/shop_license_doc" . $image_name;
            $data->shop_license_doc = $new_name;
        }

        // ==== Upload (paid_tax_bill_doc)
        if (!empty($request->hasFile('paid_tax_bill_doc'))) {
            $image = $request->file('paid_tax_bill_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/paid_tax_bill_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/paid_tax_bill_doc" . $image_name;
            $data->paid_tax_bill_doc = $new_name;
        }

        // ==== Upload (commissioning_certificate)
        if (!empty($request->hasFile('commissioning_certificate'))) {
            $image = $request->file('commissioning_certificate');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/commissioning_certificate'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/commissioning_certificate" . $image_name;
            $data->commissioning_certificate = $new_name;
        }

        // ==== Upload (affidavit_doc)
        if (!empty($request->hasFile('affidavit_doc'))) {
            $image = $request->file('affidavit_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/affidavit_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/affidavit_doc" . $image_name;
            $data->affidavit_doc = $new_name;
        }

        // ==== Upload (corporation_certificate)
        if (!empty($request->hasFile('corporation_certificate'))) {
            $image = $request->file('corporation_certificate');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/corporation_certificate'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/corporation_certificate" . $image_name;
            $data->corporation_certificate = $new_name;
        }

        $data->noc_mst_id = $noc_master->id;
        $data->l_name = $request->get('l_name');
        $data->f_name = $request->get('f_name');
        $data->father_name = $request->get('father_name');
        $data->hospital_name = $request->get('hospital_name');
        $data->designation = $request->get('designation');

        $data->house_name = $request->get('house_name');
        $data->flat_no = $request->get('flat_no');
        $data->wing_name = $request->get('wing_name');
        $data->road_name = $request->get('road_name');
        $data->area_name = $request->get('area_name');
        $data->taluka_name = $request->get('taluka_name');
        $data->pincode = $request->get('pincode');
        $data->ward_no = $request->get('ward_no');
        $data->electrol_panel_no = $request->get('electrol_panel_no');
        $data->contact_persion = $request->get('contact_persion');
        $data->tel_no = $request->get('tel_no');
        $data->email = $request->get('email');

        $data->types_of_property = $request->get('types_of_property');
        $data->property_no = $request->get('property_no');

        $data->city_name = $request->get('city_name');
        $data->survey_no = $request->get('survey_no');
        $data->cts_no = $request->get('cts_no');
        $data->part_no = $request->get('part_no');
        $data->plot_no = $request->get('plot_no');
        $data->land_property_no = $request->get('land_property_no');

        $data->area_pincode = $request->get('area_pincode');
        $data->types_of_hospital = $request->get('types_of_hospital');
        $data->from_date = $request->get('from_date');
        $data->to_date = $request->get('to_date');
        $data->shop_no = $request->get('shop_no');
        $data->area_place_measurments = $request->get('area_place_measurments');
        $data->total_staff = $request->get('total_staff');
        $data->total_sleeping_staff = $request->get('total_sleeping_staff');
        $data->hospital_fireequip = $request->get('hospital_fireequip');
        $data->hospital_address = $request->get('hospital_address');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect('/citizen/dashboard')->with('message', 'The application form which you had filled for your new hospital noc has been done Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status)
    {
        $data = DB::table('hospital_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 3)  // ==== New Hospital NOC (status=3)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
        // dd($data);

        return view('citizen.hospital_noc.new_hospital_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status)
    {
        $data = DB::table('hospital_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as NH_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 3)  // ==== New Hospital NOC (status=3)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
        // dd($data);
        return view('citizen.hospital_noc.new_hospital_noc.edit')->with('data', $data)->with('status', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $n_id, $status)
    {
        $request->validate([
            // === Basic Details
            'l_name' => 'required',
            'f_name' => 'required',
            'father_name' => 'required',
            'hospital_name' => 'required',
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
            'city_name' => 'required',
            'survey_no' => 'required',
            'cts_no' => 'required',
            'part_no' => 'required',
            'plot_no' => 'required',
            'land_property_no' => 'required',

            // ===== Necessary Particulars about above service
            'area_pincode' => 'required',
            'types_of_hospital' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'shop_no' => 'required',
            'area_place_measurments' => 'required',
            'total_staff' => 'required',
            'total_sleeping_staff' => 'required',
            'hospital_fireequip' => 'required',
            'hospital_address' => 'required',

            // ===== Other Document
            'property_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'location_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'electric_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'shop_license_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'paid_tax_bill_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'commissioning_certificate' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'affidavit_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'corporation_certificate' => 'mimes:jpeg,png,jpg,pdf|max:2048',

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
            'd_pincode' => 'required',

        ], [
            // === Basic Details
            'l_name.required' => 'Last Name / Surname is required',
            'f_name.required' => 'First Name is required',
            'father_name.required' => "Father / Husband's Name is required",
            'hospital_name.required' => 'Name of Hospital is required',
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
            'city_name.required' => 'Town / City is required',
            'survey_no.required' => 'Survey / Block / Barrak No. is required',
            'cts_no.required' => 'C.T.S. No. is required',
            'part_no.required' => 'Part No. / Sheet No. is required',
            'plot_no.required' => 'Plot No. / Unit No. is required',
            'land_property_no.required' => 'Property Number is required',

            // ===== Necessary Particulars about above service
            'area_pincode.required' => 'Pincode is required',
            'types_of_hospital.required' => 'Type of Hospital is required',
            'from_date.required' => 'From Date is required',
            'to_date.required' => 'To Date is required',
            'shop_no.required' => 'Shop No. is required',
            'area_place_measurments.required' => 'Area of Place (Sq. Mt.) is required',
            'total_staff.required' => "Numbers of Staff is required",
            'total_sleeping_staff.required' => 'Number of Staff sleep at night at working place is required',
            'hospital_fireequip.required' => 'Fire extinguishers / preventive equipments are installed at working place is required',
            'hospital_address.required' => 'Address Of Hospital Place is required',

             // ===== Other Document
            // 'property_doc.required' => 'Document Of Property is required',
            'property_doc.max' => 'The file size should be less than 2MB.',
            'property_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'location_doc.required' => 'Location of Place is required',
            'location_doc.max' => 'The file size should be less than 2MB.',
            'location_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'electric_doc.required' => 'Letter from License Holder regarding proper electric connection is required',
            'electric_doc.max' => 'The file size should be less than 2MB.',
            'electric_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'shop_license_doc.required' => 'Shop License is required',
            'shop_license_doc.max' => 'The file size should be less than 2MB.',
            'shop_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'paid_tax_bill_doc.required' => 'Up-to-date receipt of Tax bill paid is required',
            'paid_tax_bill_doc.max' => 'The file size should be less than 2MB.',
            'paid_tax_bill_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'commissioning_certificate.required' => 'Commissioning Certificate of Fire extinguishers / preventive equipments of I.S.I. Mark is required',
            'commissioning_certificate.max' => 'The file size should be less than 2MB.',
            'commissioning_certificate.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'affidavit_doc.required' => 'Copy of Affidavit is required',
            'affidavit_doc.max' => 'The file size should be less than 2MB.',
            'affidavit_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'corporation_certificate.required' => 'Corporation Registration certificate (FOR OLD HOSPITAL) is required',
            'corporation_certificate.max' => 'The file size should be less than 2MB.',
            'corporation_certificate.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

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
             'd_pincode.required' => 'Pincode is required',
        ]);

        $noc_master = NOC_Master::findOrFail($n_id);
        $noc_master->noc_a_date = date('Y-m-d', strtotime($request->get('nocs_a_date')));
        $noc_master->citizen_id = $request->get('citizens_id');
        $noc_master->noc_mode = $request->get('noc_mode');
        $noc_master->declare_date = date('Y-m-d', strtotime($request->get('declare_date')));
        $noc_master->declare_by = $request->get('declare_by');
        $noc_master->nominated_persion = $request->get('nominated_persion');
        $noc_master->nominated_persion_name = $request->get('nominated_persion_name');
        $noc_master->deliver_by = $request->get('deliver_by');
        $noc_master->d_last_name = $request->get('d_last_name');
        $noc_master->d_first_name = $request->get('d_first_name');
        $noc_master->d_father_name = $request->get('d_father_name');
        $noc_master->d_house_name = $request->get('d_house_name');
        $noc_master->d_flat_no = $request->get('d_flat_no');
        $noc_master->d_wing_no = $request->get('d_wing_no');
        $noc_master->d_road_name = $request->get('d_road_name');
        $noc_master->d_area_name = $request->get('d_area_name');
        $noc_master->d_taluka_name = $request->get('d_taluka_name');
        $noc_master->d_pincode = $request->get('d_pincode');
        $noc_master->d_email = $request->get('d_email');
        $noc_master->modified_dt = date("Y-m-d H:i:s");
        $noc_master->modified_by = Auth::user()->id;
        $noc_master->save();

        $data = Hospital_NOC::findOrFail($id);

        // ==== Upload (property_doc)
        if (!empty($request->hasFile('property_doc'))) {
            $image = $request->file('property_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/property_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/property_doc" . $image_name;
            $data->property_doc = $new_name;
        }

        // ==== Upload (location_doc)
        if (!empty($request->hasFile('location_doc'))) {
            $image = $request->file('location_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/location_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/location_doc" . $image_name;
            $data->location_doc = $new_name;
        }

        // ==== Upload (electric_doc)
        if (!empty($request->hasFile('electric_doc'))) {
            $image = $request->file('electric_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/electric_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/electric_doc" . $image_name;
            $data->electric_doc = $new_name;
        }

        // ==== Upload (shop_license_doc)
        if (!empty($request->hasFile('shop_license_doc'))) {
            $image = $request->file('shop_license_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/shop_license_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/shop_license_doc" . $image_name;
            $data->shop_license_doc = $new_name;
        }

        // ==== Upload (paid_tax_bill_doc)
        if (!empty($request->hasFile('paid_tax_bill_doc'))) {
            $image = $request->file('paid_tax_bill_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/paid_tax_bill_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/paid_tax_bill_doc" . $image_name;
            $data->paid_tax_bill_doc = $new_name;
        }

        // ==== Upload (commissioning_certificate)
        if (!empty($request->hasFile('commissioning_certificate'))) {
            $image = $request->file('commissioning_certificate');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/commissioning_certificate'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/commissioning_certificate" . $image_name;
            $data->commissioning_certificate = $new_name;
        }

        // ==== Upload (affidavit_doc)
        if (!empty($request->hasFile('affidavit_doc'))) {
            $image = $request->file('affidavit_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/affidavit_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/affidavit_doc" . $image_name;
            $data->affidavit_doc = $new_name;
        }

        // ==== Upload (corporation_certificate)
        if (!empty($request->hasFile('corporation_certificate'))) {
            $image = $request->file('corporation_certificate');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/corporation_certificate'), $new_name);

            $image_path = "/UMC_FireNOC/Hospital_NOC/New_HospitalNOC/corporation_certificate" . $image_name;
            $data->corporation_certificate = $new_name;
        }

        $data->noc_mst_id = $noc_master->id;
        $data->l_name = $request->get('l_name');
        $data->f_name = $request->get('f_name');
        $data->father_name = $request->get('father_name');
        $data->hospital_name = $request->get('hospital_name');
        $data->designation = $request->get('designation');

        $data->house_name = $request->get('house_name');
        $data->flat_no = $request->get('flat_no');
        $data->wing_name = $request->get('wing_name');
        $data->road_name = $request->get('road_name');
        $data->area_name = $request->get('area_name');
        $data->taluka_name = $request->get('taluka_name');
        $data->pincode = $request->get('pincode');
        $data->ward_no = $request->get('ward_no');
        $data->electrol_panel_no = $request->get('electrol_panel_no');
        $data->contact_persion = $request->get('contact_persion');
        $data->tel_no = $request->get('tel_no');
        $data->email = $request->get('email');

        $data->types_of_property = $request->get('types_of_property');
        $data->property_no = $request->get('property_no');

        $data->city_name = $request->get('city_name');
        $data->survey_no = $request->get('survey_no');
        $data->cts_no = $request->get('cts_no');
        $data->part_no = $request->get('part_no');
        $data->plot_no = $request->get('plot_no');
        $data->land_property_no = $request->get('land_property_no');

        $data->area_pincode = $request->get('area_pincode');
        $data->types_of_hospital = $request->get('types_of_hospital');
        $data->from_date = $request->get('from_date');
        $data->to_date = $request->get('to_date');
        $data->shop_no = $request->get('shop_no');
        $data->area_place_measurments = $request->get('area_place_measurments');
        $data->total_staff = $request->get('total_staff');
        $data->total_sleeping_staff = $request->get('total_sleeping_staff');
        $data->hospital_fireequip = $request->get('hospital_fireequip');
        $data->hospital_address = $request->get('hospital_address');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect( )->route('new_hospital_noc_list',$status)->with('message', 'The application form which you had updated for your new hospital noc has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
