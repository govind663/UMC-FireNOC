<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Business_NOC;
use App\Models\NOC_Master;
use App\Models\Business;
use App\Models\FeeBldgHt;
use App\Models\FeeCategory;
use App\Models\FeeModeOperate;
use App\Models\FeeMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BusinessNOCRequest;
use App\Models\CitizenPayment;
use App\Models\FeeReceiptDocument;

class NewBusinessNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {

        if($status == 0){
            $data = DB::table('business_noc AS t1')
                    ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                    ->where('t1.status', $status)
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->orderBy('t1.id','DESC')
                    ->get();
            // dd($data);

        }else{
            $data = DB::table('business_noc AS t1')
                    ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                    ->where('t1.status', $status)
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->orderBy('t1.id','DESC')
                    ->get();
            // dd($data);
        }


        return view('citizen.business_noc.new_business_noc.grid')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $busines_mst = Business::select('id', 'business_nature')->whereNUll('deleted_at')->orderBy('id','DESC')->get();
        // dd($busines_mst);

        return view('citizen.business_noc.new_business_noc.create')->with('data', $busines_mst);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessNOCRequest $request)
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
        $unique_id = "UMC/RBN/".rand(1000,10000000);
        $update = [
            'mst_token' => $unique_id.$noc_master->id ,
        ];

        NOC_Master::where('id', $noc_master->id)->update($update);


        $data = new Business_NOC();

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

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc" . $image_name;
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

        // ==== Upload (construction_plan_doc)
        if (!empty($request->hasFile('construction_plan_doc'))) {
            $image = $request->file('construction_plan_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc'), $new_name);

            $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc" . $image_name;
            $data->construction_plan_doc = $new_name;
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
        $data->from_date = ($request->from_date) ? $request->get('from_date') : null;
        $data->to_date = ($request->to_date) ? $request->get('to_date') : null;
        $data->no_of_workers_sleep_night = $request->get('no_of_workers_sleep_night');
        $data->fire_equips = $request->get('fire_equips');
        $data->business_address = $request->get('business_address');
        $data->location_map_link = $request->get('location_map_link');

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
    public function show($id, $status)
    {
        $data = DB::table('business_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID' , 't3.citizen_payment_status')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->whereNUll('t3.deleted_at')
                ->first();
        // dd($data);

        return view('citizen.business_noc.new_business_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $status)
    {
        $data = DB::table('business_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 1)  // ==== New Business NOC (status=1)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
         // dd($data);
        return view('citizen.business_noc.new_business_noc.edit')->with('data', $data)->with('status', $status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessNOCRequest $request, $id, $n_id,  $status)
    {
        if($status == 0){

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


            $data = Business_NOC::findOrFail($id);

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

                $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc" . $image_name;
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

            // ==== Upload (construction_plan_doc)
            if (!empty($request->hasFile('construction_plan_doc'))) {
                $image = $request->file('construction_plan_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc'), $new_name);

                $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc" . $image_name;
                $data->construction_plan_doc = $new_name;
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
            $data->from_date = ($request->from_date) ? $request->get('from_date') : null;
            $data->to_date = ($request->to_date) ? $request->get('to_date') : null;
            $data->no_of_workers_sleep_night = $request->get('no_of_workers_sleep_night');
            $data->fire_equips = $request->get('fire_equips');
            $data->business_address = $request->get('business_address');
            $data->location_map_link = $request->get('location_map_link');

            $data->modified_dt = date("Y-m-d H:i:s");
            $data->modified_by = Auth::user()->id;
            $data->save();

        } elseif($status == 4){

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


            $data = Business_NOC::findOrFail($id);

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

                $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/gas_license_doc" . $image_name;
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

            // ==== Upload (construction_plan_doc)
            if (!empty($request->hasFile('construction_plan_doc'))) {
                $image = $request->file('construction_plan_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc'), $new_name);

                $image_path = "/UMC_FireNOC/Business_NOC/New_BusinessNOC/construction_plan_doc" . $image_name;
                $data->construction_plan_doc = $new_name;
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
            $data->from_date = ($request->from_date) ? $request->get('from_date') : null;
            $data->to_date = ($request->to_date) ? $request->get('to_date') : null;
            $data->no_of_workers_sleep_night = $request->get('no_of_workers_sleep_night');
            $data->fire_equips = $request->get('fire_equips');
            $data->business_address = $request->get('business_address');
            $data->location_map_link = $request->get('location_map_link');

            $data->status = 0;
            $data->modified_dt = date("Y-m-d H:i:s");
            $data->modified_by = Auth::user()->id;
            $data->save();


            if($request->get('application_status') == 2 || $request->get('application_status') == 3){

                $update = [
                    'deleted_by' => Auth::user()->id,
                    'deleted_at' => date("Y-m-d H:i:s"),
                ];
                CitizenPayment::where('mst_token', $request->get('mst_token'))->update($update);
                FeeReceiptDocument::where('mst_token', $request->get('mst_token'))->update($update);
            }

        }


        return redirect( )->route('new_business_noc_list', $status)->with('message', 'The application form which you had updated for your new business noc has been done Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $n_id, $status)
    {
        $data = Business_NOC::findOrFail($id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        $data = NOC_Master::findOrFail($n_id);
        $data->deleted_by = Auth::user()->id;
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect( )->route('new_business_noc_list',$status)->with('message', 'The application form which you had deleted for your new business noc has been done Successfully.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function FetchOperationMode(Request $request)
    {
        $data['mode_of_operation'] = FeeModeOperate::select('id', 'operation_mode')
                                        ->where("fee_construction_id", $request->mode_of_operation)
                                        ->whereNUll('deleted_at')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return response()->json($data);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function FetchBuildingHight(Request $request)
    {
        $data['building_heights'] = FeeBldgHt::select('id', 'building_ht')
                                        ->where("fee_mode_operate_id", $request->bldg_hts)
                                        ->whereNUll('deleted_at')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return response()->json($data);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function FetchConstructionCategory(Request $request)
    {
        $data['construction_category'] = FeeCategory::select('id', 'category_name')
                                        ->where("fee_bldg_ht_id", $request->Construction_Categories)
                                        ->whereNUll('deleted_at')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return response()->json($data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function NOCFeeMasterCharges(Request $request)
    {
        $data['noc_fee_master_charges'] = FeeMaster::select('rate', 'charges')
                                        ->where("fee_bldg_ht_id", $request->Fee_Master_Rate)
                                        ->whereNUll('deleted_at')
                                        ->first();

        // dd($data);

        return response()->json($data);
    }
}
