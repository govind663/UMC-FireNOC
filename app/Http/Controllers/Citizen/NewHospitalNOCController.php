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
    public function index()
    {
        return view('citizen.hospital_noc.new_hospital_noc.grid');
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

        // ==== Generate New Business NOC Token Number
        $unique_id = "UMC/BN/".rand(1000,10000000);
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
    public function show($id)
    {
        return view('citizen.hospital_noc.new_hospital_noc.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('citizen.hospital_noc.new_hospital_noc.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalNOCRequest $request, $id)
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
        //
    }
}
