<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Http\Requests\CitizePaymentRequest;
use Illuminate\Http\Request;
use App\Models\CitizenPayment;
use App\Models\FeeConstruction;
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
    public function make_payment_create($id, $status)
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

        $mst_fee_construction = FeeConstruction::select('id', 'construction_type')->whereNUll('deleted_at')->orderBy('id', 'desc')->get();
        // dd($mst_fee_construction);

        return view('payment.make_pyment')->with(['data'=>$data, 'mst_fee_construction'=>$mst_fee_construction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function make_payment_store(CitizePaymentRequest $request, $id, $status)
    {
        $data = CitizenPayment::findOrFail($id);

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
        $data->wing_rate = $request->get('wing_rate');
        $data->new_area_meter = $request->get('new_area_meter');
        $data->meter_rate = $request->get('meter_rate');
        $data->total_charges_cost = $request->get('total_charges_cost');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->modified_by = Auth::user()->id;
        $data->save();

        return redirect( )->route('new_business_noc_list', 2)->with('message', 'Your payment done for your new business noc has been done Successfully.');

    }
}