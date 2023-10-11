<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function fire_noc_invoice($id, $status, $noc_mode){

        if($noc_mode == 1){
            $data = DB::table('business_noc as t1')
                    ->select('t1.*', 't2.*', 't3.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.id as payment_id')
                    ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 1)  // ==== New Business NOC
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->where('t1.status', $status)
                    ->where('t1.id', $id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->first();
            // dd($data);
        }elseif($noc_mode == 2){
            $data = DB::table('business_noc as t1')
                    ->select('t1.*', 't2.*', 't3.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.id as payment_id')
                    ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 2)  // ==== Renew Business NOC
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->where('t1.status', $status)
                    ->where('t1.id', $id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->first();
            // dd($data);
        }elseif($noc_mode == 3){
            $data = DB::table('hospital_noc as t1')
                    ->select('t1.*', 't2.*', 't3.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.id as payment_id')
                    ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 3)  // ==== Renew Business NOC
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->where('t1.status', $status)
                    ->where('t1.id', $id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->first();
            // dd($data);
        }elseif($noc_mode == 4){
            $data = DB::table('hospital_noc as t1')
                    ->select('t1.*', 't2.*', 't3.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.id as payment_id')
                    ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 4)  // ==== Renew Business NOC
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->where('t1.status', $status)
                    ->where('t1.id', $id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->first();
            // dd($data);
        }elseif($noc_mode == 5){
            $data = DB::table('building_noc as t1')
                    ->select('t1.*', 't2.*', 't3.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.id as payment_id')
                    ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 5)  // ==== Renew Business NOC
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->where('t1.status', $status)
                    ->where('t1.id', $id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->first();
            // dd($data);
        }elseif($noc_mode == 6){
            $data = DB::table('building_noc as t1')
                    ->select('t1.*', 't2.*', 't3.*', 't1.id as NB_NOC_ID', 't2.id as d_ID', 't3.id as payment_id')
                    ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 6)  // ==== Renew Business NOC
                    ->where('t2.citizen_id',  Auth::user()->id)
                    ->where('t1.status', $status)
                    ->where('t1.id', $id)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->first();
            // dd($data);
        }

        $fetch_payments = DB::table('citizen_payments as t1')
                            ->select('t1.*','t2.construction_type', 't3.operation_mode', 't4.building_ht')
                            ->leftJoin('fee_constructions as t2', 't2.id', '=', 't1.fee_construction_id' )
                            ->leftJoin('fee_mode_operates as t3', 't3.id', '=', 't1.fee_mode_operate_id' )
                            ->leftJoin('fee_bldg_hts as t4', 't4.id', '=', 't1.fee_bldg_ht_id' )
                            ->where('t1.citizen_id',  Auth::user()->id)
                            ->where('t1.id', $id)
                            ->whereNUll('t1.deleted_at')
                            ->whereNUll('t2.deleted_at')
                            ->whereNUll('t3.deleted_at')
                            ->whereNUll('t4.deleted_at')
                            ->get();

        // dd($fetch_payments);

        return view('citizen.invoice.citizen_invoice')->with(['data'=>$data, 'fetch_payments'=>$fetch_payments, 'noc_mode'=>$noc_mode]);;
    }
}
