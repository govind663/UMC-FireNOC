<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RemarksRequest;
use App\Models\Business_NOC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminNewBusinessNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {

        $data = DB::table('business_noc AS t1')
            ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 1) // ==== New Business NOC (status=1)
            ->where('t1.status', $status)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->orderBy('t1.id', 'DESC')
            ->get();
        // dd($data);

        return view('admin.business_noc.new_business_noc.grid')->with('data', $data)->with('status', $status);
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
            ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 1) // ==== New Business NOC (status=1)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->first();
        // dd($data);

        return view('admin.business_noc.new_business_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Approved the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved($id, $status, $auth_role)
    {
        $update = [
            'status' => 5, // === Underprocess (Level Up that means application go to field inspector)
            'operator_status' => 1, // ===== Approved by operator
            'approved_dt' => date("Y-m-d H:i:s"),
            'approved_by' => Auth::user()->id,
        ];

        Business_NOC::where('id', $id)->where('status', $status)->update($update);

        return redirect()->route('all_new_business_noc_list',1)->with('message', 'The application form which you had filled for your new business noc has been approved Successfully.');
    }

    /**
     * Rejected the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejected(RemarksRequest $request, $id, $status, $auth_role)
    {
        // dd('sdsd');
        $update = [
            'status' => 4, // === Rejected (this form go to direct display in user rejected list)
            'operator_status' => 2, // ===== Rejected by operator
            'remarks' => $request->get('remarks'),
            'rejected_dt' => date("Y-m-d H:i:s"),
            'rejected_by' => Auth::user()->id,
        ];

        Business_NOC::where('id', $id)->where('status', $status)->update($update);

        return redirect()->route('all_new_business_noc_list', 2)->with('message', 'The application form which you had filled for your new business noc has been rejected Successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($all_status)
    {
        // dd($all_status);
        $query = DB::table('business_noc AS t1')
                    ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                    ->where('t2.noc_mode', 1) // ==== New Business NOC (status=1)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC');

        if (Auth::user()->role == 0) {
            $query->where('t1.operator_status', $all_status);
        } elseif (Auth::user()->role == 1) {
            $query->where('t1.inspector_status', $all_status);
        } elseif (Auth::user()->role == 2) {
            $query->where('t1.officer_status', $all_status);
        }

        $data = $query->get();
        // dd($data);

        return view('admin.business_noc.all_application.new_business_noc.grid')->with('data', $data)->with('all_status', $all_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id, $all_status)
    {
        // dd($all_status);
        $query = DB::table('business_noc AS t1')
            ->select('t1.*', 't2.*', 't1.id as NB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 1) // ==== New Business NOC (status=1)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->orderBy('t1.id', 'DESC');

        if (Auth::user()->role == 0) {
            $query->where('t1.operator_status', $all_status);
        } elseif (Auth::user()->role == 1) {
            $query->where('t1.inspector_status', $all_status);
        } elseif (Auth::user()->role == 2) {
            $query->where('t1.officer_status', $all_status);
        }

        $data = $query->first();
        // dd($data);

        return view('admin.business_noc.all_application.new_business_noc.view')->with('data', $data)->with('all_status', $all_status);
    }

}
