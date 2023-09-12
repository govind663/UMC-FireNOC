<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business_NOC;
use App\Models\NOC_Master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RemarksRequest;

class AdminRenewBusinessNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $data = DB::table('business_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 2)  // ==== Renew Business NOC (status=2)
                ->where('t1.status', $status)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->get();
        // dd($data);

        return view('admin.business_noc.renew_business_noc.grid')->with('data', $data)->with('status', $status);
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
                ->select('t1.*', 't2.*')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 2)  // ==== Renew Business NOC (status=2)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
        // dd($data);

        return view('admin.business_noc.renew_business_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Approved the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved($id, $status)
    {
        $update = [
            'application_status' => 1 ,
            'approved_dt' => date("Y-m-d H:i:s") ,
            'approved_by' => Auth::user()->id ,
        ];

        Business_NOC::where('id', $id)->where('status', $status)->update($update);

        return redirect()->route('new_business_noc_list',$status)->with('message', 'The application form which you had filled for your new business noc has been approved Successfully.');
    }

    /**
     * Rejected the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejected(RemarksRequest $request, $id, $status)
    {
        $update = [
            'status' => 4 ,
            'remarks' => $request->get('remarks'),
            'rejected_dt' => date("Y-m-d H:i:s") ,
            'rejected_by' => Auth::user()->id ,
        ];

        Business_NOC::where('id', $id)->where('status', $status)->update($update);

        return redirect()->route('admin_renew_business_noc',$status)->with('message', 'The application form which you had filled for your new business noc has been rejected Successfully.');
    }
}
