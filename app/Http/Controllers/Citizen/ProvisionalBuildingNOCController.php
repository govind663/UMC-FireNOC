<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Building_NOC;
use App\Models\NOC_Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BuildingNOCRequest;

class ProvisionalBuildingNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $data = DB::table('building_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as P_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Renew Hospital NOC (status=5)
                ->where('t1.status', $status)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->get();
        // dd($data);

        return view('citizen.building_noc.provisional_building_noc.grid')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citizen.building_noc.provisional_building_noc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingNOCRequest $request)
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

        // ==== Generate Provisional Building NOC Token Number
        $unique_id = "UMC/BN/".rand(1000,10000000);
        $update = [
            'mst_token' => $unique_id.$noc_master->id ,
        ];
        NOC_Master::where('id', $noc_master->id)->update($update);

        $data = new Building_NOC();

        // ==== Upload (maps_of_proposed_doc)
        if (!empty($request->hasFile('maps_of_proposed_doc'))) {
            $image = $request->file('maps_of_proposed_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/maps_of_proposed_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/maps_of_proposed_doc" . $image_name;
            $data->maps_of_proposed_doc = $new_name;
        }

        // ==== Upload (city_survey_doc)
        if (!empty($request->hasFile('city_survey_doc'))) {
            $image = $request->file('city_survey_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/city_survey_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/city_survey_doc" . $image_name;
            $data->city_survey_doc = $new_name;
        }

        // ==== Upload (sanad_doc)
        if (!empty($request->hasFile('sanad_doc'))) {
            $image = $request->file('sanad_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/sanad_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/sanad_doc" . $image_name;
            $data->sanad_doc = $new_name;
        }

        // ==== Upload (competent_authority_doc)
        if (!empty($request->hasFile('competent_authority_doc'))) {
            $image = $request->file('competent_authority_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/competent_authority_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/competent_authority_doc" . $image_name;
            $data->competent_authority_doc = $new_name;
        }

        // ==== Upload (dues_certificate_doc)
        if (!empty($request->hasFile('dues_certificate_doc'))) {
            $image = $request->file('dues_certificate_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/dues_certificate_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/dues_certificate_doc" . $image_name;
            $data->dues_certificate_doc = $new_name;
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
        $data->contact_persion = $request->get('contact_persion');
        $data->tel_no = $request->get('tel_no');
        $data->email = $request->get('email');

        $data->types_of_property = $request->get('types_of_property');
        $data->property_no = $request->get('property_no');

        $data->peermission_no = $request->get('peermission_no');
        $data->permission_date = $request->get('permission_date');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        return redirect('/citizen/dashboard')->with('message', 'The application form which you had filled for your provisional building noc has been done Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status)
    {
        $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Provisional Building NOC (status=5)
                ->where('t1.status', $status)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();

        return view('citizen.building_noc.provisional_building_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status)
    {
        $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as P_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Provisional Building NOC (status=5)
                ->where('t1.status', $status)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();

        return view('citizen.building_noc.provisional_building_noc.edit')->with('data', $data)->with('status', $status);
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
            'maps_of_proposed_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'city_survey_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'sanad_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'competent_authority_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'dues_certificate_doc' => 'mimes:jpeg,png,jpg,pdf|max:2048',

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
            'peermission_no.required' => 'Construction Permission Number is required',
            'permission_date.required' => 'Date of Permission is required',


             // ===== Other Document
            // 'maps_of_proposed_doc.required' => 'Document Of Property is required',
            'maps_of_proposed_doc.max' => 'The file size should be less than 2MB.',
            'maps_of_proposed_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'city_survey_doc.required' => 'Location of Place is required',
            'city_survey_doc.max' => 'The file size should be less than 2MB.',
            'city_survey_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'sanad_doc.required' => 'Letter from License Holder regarding proper electric connection is required',
            'sanad_doc.max' => 'The file size should be less than 2MB.',
            'sanad_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'competent_authority_doc.required' => 'Shop License is required',
            'competent_authority_doc.max' => 'The file size should be less than 2MB.',
            'competent_authority_doc.mimes' => ' Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .',

            // 'dues_certificate_doc.required' => 'Up-to-date receipt of Tax bill paid is required',
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

        $data = Building_NOC::findOrFail($id);
        // ==== Upload (maps_of_proposed_doc)
        if (!empty($request->hasFile('maps_of_proposed_doc'))) {
            $image = $request->file('maps_of_proposed_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/maps_of_proposed_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/maps_of_proposed_doc" . $image_name;
            $data->maps_of_proposed_doc = $new_name;
        }

        // ==== Upload (city_survey_doc)
        if (!empty($request->hasFile('city_survey_doc'))) {
            $image = $request->file('city_survey_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/city_survey_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/city_survey_doc" . $image_name;
            $data->city_survey_doc = $new_name;
        }

        // ==== Upload (sanad_doc)
        if (!empty($request->hasFile('sanad_doc'))) {
            $image = $request->file('sanad_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/sanad_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/sanad_doc" . $image_name;
            $data->sanad_doc = $new_name;
        }

        // ==== Upload (competent_authority_doc)
        if (!empty($request->hasFile('competent_authority_doc'))) {
            $image = $request->file('competent_authority_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/competent_authority_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/competent_authority_doc" . $image_name;
            $data->competent_authority_doc = $new_name;
        }

        // ==== Upload (dues_certificate_doc)
        if (!empty($request->hasFile('dues_certificate_doc'))) {
            $image = $request->file('dues_certificate_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/dues_certificate_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Building_NOC/Provisional_BuildingNOC/dues_certificate_doc" . $image_name;
            $data->dues_certificate_doc = $new_name;
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
        $data->contact_persion = $request->get('contact_persion');
        $data->tel_no = $request->get('tel_no');
        $data->email = $request->get('email');

        $data->types_of_property = $request->get('types_of_property');
        $data->property_no = $request->get('property_no');

        $data->peermission_no = $request->get('peermission_no');
        $data->permission_date = $request->get('permission_date');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect( )->route('provisional_building_noc_list',$status)->with('message', 'The application form which you had updated for your provisional building noc has been done Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $n_id, $status)
    {
        $data = Building_NOC::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        $data = NOC_Master::findOrFail($n_id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect()->route('provisional_building_noc_list',$status)->with('message', 'The application form which you had deleted for your provisional building noc has been done Successfully.');
    }
}
