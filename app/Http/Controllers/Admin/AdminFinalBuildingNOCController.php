<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building_NOC;
use App\Models\NOC_Master;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RemarksRequest;

class AdminFinalBuildingNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $data = DB::table('building_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as F_NOC_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t2.noc_mode', 6)  // ==== Renew Hospital NOC (status=2)
                ->where('t1.status', $status)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->get();
        // dd($data);

        return view('admin.building_noc.final_building_noc.grid')->with('data', $data)->with('status', $status);
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
                ->where('t2.noc_mode', 6)  // ==== Final Building NOC (status=6)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->first();
        // dd($data);
        return view('admin.building_noc.final_building_noc.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Approved the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved($id, $status, $auth_role)
    {
        // display only pending form (status=0)
        if (Auth::user()->role == 0) {
            $update = [
                'status' => 5, // === New (Level Up that means application go to field inspector)
                'operator_status' => 1, // ===== Approved by operator
                'application_status' => 1, // ===== Field Inspector will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);

        // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 1) {
            $update = [
                'status' => 1, // === Unpaid (Level Up that means application go to User End)
                'inspector_status' => 1, // ===== Approved by Field Inspector
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);

        // display only Paid form (status=2)
        } elseif (Auth::user()->role == 2) {
            $update = [
                'status' => 6, // === Reviewed (Level Up that means application go to DMC)
                'officer_status' => 1, // ===== Approved by Chief Fire Officer
                'application_status' => 2, // ===== Chief Fire Officer will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);

        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 3, // === Approved by DMC (This is the final step)
                'application_status' => 3, // ===== DMC will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);
        }

        return redirect()->route('all_final_building_noc_list',1)->with('message', 'The application form which you had filled for your provisional building noc has been approved Successfully.');
    }

    /**
     * Rejected the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rejected(RemarksRequest $request, $id, $status, $auth_role)
    {
        // display only pending form (status=0)
        if (Auth::user()->role == 0) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'operator_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);

        // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 1) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'inspector_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);

        // display only Paid form (status=2)
        } elseif (Auth::user()->role == 2) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'officer_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);
        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Building_NOC::where('id', $id)->where('status', $status)->update($update);
        }

        return redirect()->route('all_final_building_noc_list', 2)->with('message', 'The application form which you had filled for your provisional building noc has been rejected Successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($all_status)
    {
        // dd($all_status);
        $query = DB::table('building_noc AS t1')
                    ->select('t1.*', 't2.*', 't1.id as F_NOC_ID', 't2.id as d_ID')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                    ->where('t2.noc_mode', 6) // ==== Final Building NOC (status=1)
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

        return view('admin.building_noc.all_application.final_building_noc.grid')->with('data', $data)->with('all_status', $all_status);
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
        $query = DB::table('building_noc AS t1')
            ->select('t1.*', 't2.*', 't1.id as F_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 6) // ==== Final Building NOC (status=1)
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

        return view('admin.building_noc.all_application.final_building_noc.view')->with('data', $data)->with('all_status', $all_status);
    }
}
