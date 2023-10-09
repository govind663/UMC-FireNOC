<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeReceiptDocumentRequest;
use App\Models\CitizenPayment;
use Illuminate\Http\Request;
use App\Models\FeeReceiptDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function fire_noc_certificate($id, $status, $noc_mode){

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
                    ->whereNUll('t2.deleted_at')
                    ->first();
            // dd($data);
        }

        return view('citizen.certificate.master_certificate')->with(['data'=>$data,'noc_mode'=>$noc_mode]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload_payment_receipt(FeeReceiptDocumentRequest $request, $id, $status, $noc_mode)
    {
        $data = new FeeReceiptDocument();

        // ==== Upload (payment_recepit_doc)
        if (!empty($request->hasFile('payment_recepit_doc'))) {
            $image = $request->file('payment_recepit_doc');
            $image_name = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $new_name = time() . rand(10, 999) . '.' . $extension;
            $image->move(public_path('/UMC_FireNOC/payment/payment_recepit_doc'), $new_name);

            $image_path = "/UMC_FireNOC/payment/payment_recepit_doc" . $image_name;
            $data->payment_recepit_doc = $new_name;
        }

        $data->citizen_id = $request->get('citizens_id');
        $data->payment_noc_mode = $request->get('payment_noc_mode');
        $data->document_status = 1;
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->inserted_by = Auth::user()->id;
        $data->save();

        // ==== Generate New Business NOC Token Number

        $update = [
            'citizen_payment_status' => 2,
        ];

        CitizenPayment::where('mst_token', $request->get('mst_token'))->update($update);

        return redirect()->back()->with('message', 'The application form which you had filled for your provisional building noc has been done Successfully.');
    }
}
