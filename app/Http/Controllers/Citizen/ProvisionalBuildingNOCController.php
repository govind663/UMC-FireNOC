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
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Renew Hospital NOC (status=5)
                ->where('t1.status', $status)
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
    public function show($id, $status, $app_status)
    {
        $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '==', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== New Hospital NOC (status=1)
                ->where('t1.status', $status)
                ->where('t1.application_status', $app_status)
                ->where('t1.id', $id)
                ->whereNUll('t1.id')
                ->whereNUll('t2.id')
                ->first();

        return view('citizen.building_noc.provisional_building_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status, $app_status)
    {
        $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '==', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== New Hospital NOC (status=1)
                ->where('t1.status', $status)
                ->where('t1.application_status', $app_status)
                ->where('t1.id', $id)
                ->whereNUll('t1.id')
                ->whereNUll('t2.id')
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
    public function update(BuildingNOCRequest $request, $id)
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
