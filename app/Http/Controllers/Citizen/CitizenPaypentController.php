<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Http\Requests\CitizePaymentRequest;
use Illuminate\Http\Request;
use App\Models\CitizenPayment;
use App\Models\FeeConstruction;
use App\Models\Business_NOC;
use App\Models\Hospital_NOC;
use App\Models\Building_NOC;
use App\Models\FeeBldgHt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CitizenPaypentController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function make_payment_create($id, $status, $noc_mode)
    {
        if($noc_mode == 1){

            $data = DB::table('business_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 1)  // ==== New Business NOC
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
                // dd($data);

        }elseif($noc_mode == 2){

            $data = DB::table('business_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 2)  // ==== Renew Business NOC
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
                // dd($data);

        }elseif($noc_mode == 3){

            $data = DB::table('hospital_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as NH_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 3)  // ==== New Hospital NOC
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
                // dd($data);

        }elseif($noc_mode == 4){

            $data = DB::table('hospital_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as RH_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 4)  // ==== New Hospital NOC
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
                // dd($data);
        }elseif($noc_mode == 5){

            $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as P_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 5)  // ==== Provisional Building NOC
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
                // dd($data);

        }elseif($noc_mode == 6){

            $data = DB::table('building_noc as t1')
                ->select('t1.*', 't2.*', 't1.id as F_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 6)  // ==== Final Building NOC
                ->where('t2.citizen_id',  Auth::user()->id)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
                // dd($data);
        }

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        $mst_fee_building_hts = FeeBldgHt::select('id', 'building_ht')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_building_hts);

        return view('citizen.payment.make_payment')->with(['data'=>$data, 'mst_fee_construction'=>$mst_fee_construction, 'mst_fee_building_hts'=>$mst_fee_building_hts, 'noc_mode'=>$noc_mode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function make_payment_store(CitizePaymentRequest $request, $id,  $status, $noc_mode)
    {
        if($noc_mode == 1){
            // dd($request);
            $data = new CitizenPayment();

            $data->mst_token = $request->get('mst_token');
            $data->payment_dt = date('Y-m-d', strtotime($request->get('payment_dt')));
            $data->citizen_id = $request->get('citizens_id');
            $data->payment_noc_mode = $request->get('payment_noc_mode');

            $data->l_name = $request->get('l_name');
            $data->f_name = $request->get('f_name');
            $data->father_name = $request->get('father_name');
            $data->fee_construction_id = $request->get('fee_construction_id');
            $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');

            $data->wing_option = $request->get('wing_option');
            $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
            $data->wing_rate = ($request->wing_rate) ? $request->get('wing_rate') : 0;
            $data->new_area_meter = ($request->new_area_meter) ? $request->get('new_area_meter') : 0;
            $data->meter_rate = ($request->meter_rate) ? $request->get('meter_rate') : 0;
            $data->total_charges_cost = ($request->total_charges_cost) ? $request->get('total_charges_cost') : 0;

            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            $data->save();

            // ==== Generate New Business NOC Invoice Number
            $invoice_unique_id = "UMC_".rand(1000,10000000).time();
            $update_invoice_id = [
                'invoice_number' => $invoice_unique_id.$data->id ,
                'citizen_payment_status' => 1,
            ];

            CitizenPayment::where('id', $data->id)->update($update_invoice_id);


            // ==== Update Payment Status
            $update = [
                'status' => 2,
                'payment_status' =>  1, // ==== Payment Done Successfully.
                'payment_dt' =>  date("Y-m-d H:i:s"),
                'payment_by' =>  Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->update($update);

            return redirect()->route('new_business_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

        }elseif($noc_mode == 2){

            $data = new CitizenPayment();

            $data->mst_token = $request->get('mst_token');
            $data->payment_dt = date('Y-m-d', strtotime($request->get('payment_dt')));
            $data->citizen_id = $request->get('citizens_id');
            $data->payment_noc_mode = $request->get('payment_noc_mode');

            $data->l_name = $request->get('l_name');
            $data->f_name = $request->get('f_name');
            $data->father_name = $request->get('father_name');
            $data->fee_construction_id = $request->get('fee_construction_id');
            $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');

            $data->wing_option = $request->get('wing_option');
            $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
            $data->wing_rate = ($request->wing_rate) ? $request->get('wing_rate') : 0;
            $data->new_area_meter = ($request->new_area_meter) ? $request->get('new_area_meter') : 0;
            $data->meter_rate = ($request->meter_rate) ? $request->get('meter_rate') : 0;
            $data->total_charges_cost = ($request->total_charges_cost) ? $request->get('total_charges_cost') : 0;

            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            $data->save();

            // ==== Generate New Business NOC Invoice Number
            $invoice_unique_id = "UMC_".rand(1000,10000000).time();
            $update_invoice_id = [
                'invoice_number' => $invoice_unique_id.$data->id ,
                'citizen_payment_status' => 1,
            ];

            CitizenPayment::where('id', $data->id)->update($update_invoice_id);


            // ==== Update Payment Status
            $update = [
                'status' => 2,
                'payment_status' =>  1, // ==== Payment Done Successfully.
                'payment_dt' =>  date("Y-m-d H:i:s"),
                'payment_by' =>  Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->update($update);

            return redirect()->route('renew_business_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

        }elseif($noc_mode == 3){

            $data = new CitizenPayment();

            $data->mst_token = $request->get('mst_token');
            $data->payment_dt = date('Y-m-d', strtotime($request->get('payment_dt')));
            $data->citizen_id = $request->get('citizens_id');
            $data->payment_noc_mode = $request->get('payment_noc_mode');

            $data->l_name = $request->get('l_name');
            $data->f_name = $request->get('f_name');
            $data->father_name = $request->get('father_name');
            $data->fee_construction_id = $request->get('fee_construction_id');
            $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');

            $data->wing_option = $request->get('wing_option');
            $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
            $data->wing_rate = ($request->wing_rate) ? $request->get('wing_rate') : 0;
            $data->new_area_meter = ($request->new_area_meter) ? $request->get('new_area_meter') : 0;
            $data->meter_rate = ($request->meter_rate) ? $request->get('meter_rate') : 0;
            $data->total_charges_cost = ($request->total_charges_cost) ? $request->get('total_charges_cost') : 0;

            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            $data->save();

            // ==== Generate New Business NOC Invoice Number
            $invoice_unique_id = "UMC_".rand(1000,10000000).time();
            $update_invoice_id = [
                'invoice_number' => $invoice_unique_id.$data->id ,
                'citizen_payment_status' => 1,
            ];

            CitizenPayment::where('id', $data->id)->update($update_invoice_id);


            // ==== Update Payment Status
            $update = [
                'status' => 2,
                'payment_status' =>  1, // ==== Payment Done Successfully.
                'payment_dt' =>  date("Y-m-d H:i:s"),
                'payment_by' =>  Auth::user()->id,
            ];

            Hospital_NOC::where('id', $id)->update($update);

            return redirect()->route('new_hospital_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

        }elseif($noc_mode == 4){

            $data = new CitizenPayment();

            $data->mst_token = $request->get('mst_token');
            $data->payment_dt = date('Y-m-d', strtotime($request->get('payment_dt')));
            $data->citizen_id = $request->get('citizens_id');
            $data->payment_noc_mode = $request->get('payment_noc_mode');

            $data->l_name = $request->get('l_name');
            $data->f_name = $request->get('f_name');
            $data->father_name = $request->get('father_name');
            $data->fee_construction_id = $request->get('fee_construction_id');
            $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');

            $data->wing_option = $request->get('wing_option');
            $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
            $data->wing_rate = ($request->wing_rate) ? $request->get('wing_rate') : 0;
            $data->new_area_meter = ($request->new_area_meter) ? $request->get('new_area_meter') : 0;
            $data->meter_rate = ($request->meter_rate) ? $request->get('meter_rate') : 0;
            $data->total_charges_cost = ($request->total_charges_cost) ? $request->get('total_charges_cost') : 0;

            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            $data->save();

            // ==== Generate New Business NOC Invoice Number
            $invoice_unique_id = "UMC_".rand(1000,10000000).time();
            $update_invoice_id = [
                'invoice_number' => $invoice_unique_id.$data->id ,
                'citizen_payment_status' => 1,
            ];

            CitizenPayment::where('id', $data->id)->update($update_invoice_id);


            // ==== Update Payment Status
            $update = [
                'status' => 2,
                'payment_status' =>  1, // ==== Payment Done Successfully.
                'payment_dt' =>  date("Y-m-d H:i:s"),
                'payment_by' =>  Auth::user()->id,
            ];

            Hospital_NOC::where('id', $id)->update($update);

            return redirect()->route('renew_hospital_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

        }elseif($noc_mode == 5){

            $data = new CitizenPayment();

            $data->mst_token = $request->get('mst_token');
            $data->payment_dt = date('Y-m-d', strtotime($request->get('payment_dt')));
            $data->citizen_id = $request->get('citizens_id');
            $data->payment_noc_mode = $request->get('payment_noc_mode');

            $data->l_name = $request->get('l_name');
            $data->f_name = $request->get('f_name');
            $data->father_name = $request->get('father_name');
            $data->fee_construction_id = $request->get('fee_construction_id');
            $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');

            $data->wing_option = $request->get('wing_option');
            $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
            $data->wing_rate = ($request->wing_rate) ? $request->get('wing_rate') : 0;
            $data->new_area_meter = ($request->new_area_meter) ? $request->get('new_area_meter') : 0;
            $data->meter_rate = ($request->meter_rate) ? $request->get('meter_rate') : 0;
            $data->total_charges_cost = ($request->total_charges_cost) ? $request->get('total_charges_cost') : 0;

            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            $data->save();

            // ==== Generate New Business NOC Invoice Number
            $invoice_unique_id = "UMC_".rand(1000,10000000).time();
            $update_invoice_id = [
                'invoice_number' => $invoice_unique_id.$data->id ,
                'citizen_payment_status' => 1,
            ];

            CitizenPayment::where('id', $data->id)->update($update_invoice_id);


            // ==== Update Payment Status
            $update = [
                'status' => 2,
                'payment_status' =>  1, // ==== Payment Done Successfully.
                'payment_dt' =>  date("Y-m-d H:i:s"),
                'payment_by' =>  Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->update($update);

            return redirect()->route('provisional_building_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

        }elseif($noc_mode == 6){

            $data = new CitizenPayment();

            $data->mst_token = $request->get('mst_token');
            $data->payment_dt = date('Y-m-d', strtotime($request->get('payment_dt')));
            $data->citizen_id = $request->get('citizens_id');
            $data->payment_noc_mode = $request->get('payment_noc_mode');

            $data->l_name = $request->get('l_name');
            $data->f_name = $request->get('f_name');
            $data->father_name = $request->get('father_name');
            $data->fee_construction_id = $request->get('fee_construction_id');
            $data->fee_mode_operate_id = $request->get('fee_mode_operate_id');

            $data->wing_option = $request->get('wing_option');
            $data->fee_bldg_ht_id = $request->get('fee_bldg_ht_id');
            $data->wing_rate = ($request->wing_rate) ? $request->get('wing_rate') : 0;
            $data->new_area_meter = ($request->new_area_meter) ? $request->get('new_area_meter') : 0;
            $data->meter_rate = ($request->meter_rate) ? $request->get('meter_rate') : 0;
            $data->total_charges_cost = ($request->total_charges_cost) ? $request->get('total_charges_cost') : 0;

            $data->inserted_dt = date("Y-m-d H:i:s");
            $data->inserted_by = Auth::user()->id;
            $data->save();

            // ==== Generate New Business NOC Invoice Number
            $invoice_unique_id = "UMC_".rand(1000,10000000).time();
            $update_invoice_id = [
                'invoice_number' => $invoice_unique_id.$data->id ,
                'citizen_payment_status' => 1,
            ];

            CitizenPayment::where('id', $data->id)->update($update_invoice_id);


            // ==== Update Payment Status
            $update = [
                'status' => 2,
                'payment_status' =>  1, // ==== Payment Done Successfully.
                'payment_dt' =>  date("Y-m-d H:i:s"),
                'payment_by' =>  Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->update($update);

            return redirect()->route('final_building_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

        }

    }
}

