<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Business_NOC;
use App\Models\NOC_Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NewBusinessNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        // return $status;

        $data = DB::table('business_noc AS t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                ->where('t1.status', $status)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->get();
        // dd($data);

        return view('citizen.business_noc.new_business_noc.grid')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citizen.business_noc.new_business_noc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

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
            'food_license' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'tax_bill_paid_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'trade_license' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'gas_certificate_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'commissioning_certificate' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'affidavit_doc' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',

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

        ], [

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
            'location_map_doc.required' => 'Location of Place (Google Map Link) is required',
            'location_map_doc.max' => 'The file size should be less than 2MB.',
            'location_map_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'electric_license_doc.required' => 'Letter from License Holder regarding proper electric connection is required',
            'electric_license_doc.max' => 'The file size should be less than 2MB.',
            'electric_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'gas_license_doc.required' => 'Letter from connection holder and license regarding proper cooking gas connection is required',
            'gas_license_doc.max' => 'The file size should be less than 2MB.',
            'gas_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'shop_license_doc.required' => 'Shop License is required',
            'shop_license_doc.max' => 'The file size should be less than 2MB.',
            'shop_license_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            'food_license.required' => 'Food License is required',
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

            'affidavit_doc.required' => 'Copy of Affidavit is required',
            'affidavit_doc.max' => 'The file size should be less than 2MB.',
            'affidavit_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

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

        ]);

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

        // ==== Generate New Business NOC Token Number
        $unique_id = "UMC/BN/".rand(1000,10000000);
        $update = [
            'mst_token' => $unique_id.$noc_master->id ,
        ];

        NOC_Master::where('id', $noc_master->id)->update($update);


        $data = new Business_NOC();

        // ==== Upload (location_map_doc)
        if (!empty($request->hasFile('location_map_doc'))) {
            $image = $request->file('location_map_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/location_map_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/location_map_doc" . $image_name;
            $data->location_map_doc = $new_name;
        }

        // ==== Upload (electric_license_doc)
        if (!empty($request->hasFile('electric_license_doc'))) {
            $image = $request->file('electric_license_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/electric_license_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/electric_license_doc" . $image_name;
            $data->electric_license_doc = $new_name;
        }

        // ==== Upload (gas_license_doc)
        if (!empty($request->hasFile('gas_license_doc'))) {
            $image = $request->file('gas_license_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/" . $image_name;
            $data->gas_license_doc = $new_name;
        }

        // ==== Upload (shop_license_doc)
        if (!empty($request->hasFile('shop_license_doc'))) {
            $image = $request->file('shop_license_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/shop_license_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/shop_license_doc" . $image_name;
            $data->shop_license_doc = $new_name;
        }

        // ==== Upload (food_license)
        if (!empty($request->hasFile('food_license'))) {
            $image = $request->file('food_license');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/food_license'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/food_license" . $image_name;
            $data->food_license = $new_name;
        }

        // ==== Upload (tax_bill_paid_doc)
        if (!empty($request->hasFile('tax_bill_paid_doc'))) {
            $image = $request->file('tax_bill_paid_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/tax_bill_paid_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/tax_bill_paid_doc" . $image_name;
            $data->tax_bill_paid_doc = $new_name;
        }

        // ==== Upload (trade_license)
        if (!empty($request->hasFile('trade_license'))) {
            $image = $request->file('trade_license');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/trade_license'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/trade_license" . $image_name;
            $data->trade_license = $new_name;
        }

        // ==== Upload (gas_certificate_doc)
        if (!empty($request->hasFile('gas_certificate_doc'))) {
            $image = $request->file('gas_certificate_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_certificate_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_certificate_doc" . $image_name;
            $data->gas_certificate_doc = $new_name;
        }

        // ==== Upload (commissioning_certificate)
        if (!empty($request->hasFile('commissioning_certificate'))) {
            $image = $request->file('commissioning_certificate');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/commissioning_certificate'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/commissioning_certificate" . $image_name;
            $data->commissioning_certificate = $new_name;
        }

        // ==== Upload (affidavit_doc)
        if (!empty($request->hasFile('affidavit_doc'))) {
            $image = $request->file('affidavit_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/affidavit_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/affidavit_doc" . $image_name;
            $data->affidavit_doc = $new_name;
        }

        $data->noc_mst_id = $noc_master->id;
        $data->l_name = $request->get('l_name');
        $data->f_name = $request->get('f_name');
        $data->father_name = $request->get('father_name');
        $data->society_name = $request->get('society_name');
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

        $data->types_of_property = $request->get('types_of_property');
        $data->property_no = $request->get('property_no');

        $data->city_name = $request->get('city_name');
        $data->survey_no = $request->get('survey_no');
        $data->cts_no = $request->get('cts_no');
        $data->part_no = $request->get('part_no');
        $data->plot_no = $request->get('plot_no');
        $data->land_property_no = $request->get('land_property_no');

        $data->area_pincode = $request->get('area_pincode');
        $data->shop_no = $request->get('shop_no');
        $data->building_height = $request->get('building_height');
        $data->rooms_in_buld = $request->get('rooms_in_buld');
        $data->property_on_floor_buld = $request->get('property_on_floor_buld');
        $data->no_of_accomodation_people = $request->get('no_of_accomodation_people');
        $data->area = $request->get('area');
        $data->no_of_workers = $request->get('no_of_workers');
        $data->types_of_business = $request->get('types_of_business');
        $data->no_of_workers_sleep_night = $request->get('no_of_workers_sleep_night');
        $data->fire_equips = $request->get('fire_equips');
        $data->business_address = $request->get('business_address');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect('/citizen/dashboard')->with('message', 'The application form which you had filled for your new business noc has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status, $app_status)
    {
        $data = DB::table('business_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '==', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                ->where('t1.status', $status)
                ->where('t1.application_status', $app_status)
                ->where('t1.id', $id)
                ->whereNUll('t1.id')
                ->whereNUll('t2.id')
                ->first();

        return view('citizen.business_noc.new_business_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status, $app_status)
    {
        $data = DB::table('business_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '==', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                ->where('t1.status', $status)
                ->where('t1.application_status', $app_status)
                ->where('t1.id', $id)
                ->whereNUll('t1.id')
                ->whereNUll('t2.id')
                ->first();

        return view('citizen.business_noc.new_business_noc.edit')->with('data', $data)->with('status', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Business_NOC::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        $data = NOC_Master::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return view('citizen.business_noc.new_business_noc.grid');
    }
}
