<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RemarksRequest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class AdminFormBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        //dd($status);
        if($status == 0 || $status == 5 || $status == 1){
            $query = DB::table('form_b AS t1')
                    ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                    ->where('t2.noc_mode', 10) // ==== New Business NOC (status=1)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC');
        }else{
            $query = DB::table('form_b AS t1')
                    ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status', 't4.payment_recepit_doc')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                    ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                    ->leftJoin('fee_receipt_documents as t4', 't4.mst_token', '=', 't2.mst_token' )
                    ->where('t2.noc_mode', 10) // ==== New Business NOC (status=1)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->whereNUll('t3.deleted_at')
                    ->whereNUll('t4.deleted_at')
                    ->orderBy('t1.id', 'DESC');
        }

        if (Auth::user()->role == 0) {
            $query->where('t1.status', $status);
        } elseif (Auth::user()->role == 1) {
            $query->where('t1.status', $status);
        } elseif (Auth::user()->role == 2) {
            $query->where('t1.status', $status);
            // $query->where('t3.citizen_payment_status', 2);
        } elseif (Auth::user()->role == 3) {
            $query->where('t1.status', $status);
        }elseif (Auth::user()->role == 4) {
            $query->where('t1.status', $status);
        }

        $data = $query->get();
       // dd($data);
        return view('admin.form_b.new_form_b.grid')->with('data', $data)->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status)
    {
        // dd($status);
        $data = DB::table('form_b as t1')
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 10) // ==== New Other NOC (status=1)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->first();
        // dd($data);
// return($data);
        return view('admin.form_b.new_form_b.view')->with('data', $data)->with('status', $status);
    }

    /**
     * Approved the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved(Request $request, $id, $status, $auth_role)
    {
        // display only pending form (status=0)
        if (Auth::user()->role == 0) {
            $update = [
                'status' => 5, // === New (Level Up that means application go to field inspector)
                'operator_status' => 1, // ===== Approved by operator
                'operator_by' => Auth::user()->id,
                'operator_dt' => date("Y-m-d H:i:s"),
                'application_status' => 1, // ===== Field Inspector will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 1)->with('message', 'The application form which you had filled for your new other noc has been approved Successfully.');

        // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 2) {

            // ==== Upload (f_inspector_doc)
            $fileName = "";

            if (!empty($request->hasFile('ch_inspector_doc'))) {
                $image = $request->file('ch_inspector_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/PMC_FireNOC/form_b/New_FormB/ch_inspector_doc'), $new_name);

                $image_path = "/PMC_FireNOC/form_b/New_FormB/ch_inspector_doc" . $image_name;
                $fileName = $new_name;
            }

            $update = [
                'status' => 1, // === Unpaid (Level Up that means application go to User End)
                'inspector_status' => 1, // ===== Approved by Field Inspector
                'inspector_by' => Auth::user()->id,
                'ch_inspector_dt' => date("Y-m-d H:i:s"),
                'inspector_dt' => date("Y-m-d H:i:s"),
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
                'ch_inspector_doc' => $fileName,
                'ch_inspector_remarks' => $request->ch_inspector_remarks
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 1)->with('message', 'The application form which you had filled for your new other noc has been approved Successfully.');

        // display only Paid form (status=2)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 3, // === Reviewed (Level Up that means application go to DMC)
                // 'officer_status' => 1, // ===== Approved by Chief Fire Officer
                // 'officer_by' => Auth::user()->id,
                // 'officer_dt' => date("Y-m-d H:i:s"),
                'application_status' => 3, // ===== Chief Fire Officer will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 1)->with('message', 'The application form which you had filled for your new other noc has been approved Successfully.');

        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 4) {
            $update = [
                'status' => 3, // === Approved by DMC (This is the final step)
                'application_status' => 3, // ===== DMC will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 3)->with('message', 'The application form which you had filled for your new other noc has been approved Successfully.');
        }
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
                'current_rejected_status' => $status,
                'current_rejected_role' => $auth_role
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 2)->with('message', 'The application form which you had filled for your new other noc has been rejected Successfully.');

        // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 1) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'inspector_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
                'current_rejected_status'  => $status,
                'current_rejected_role' => $auth_role
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 2)->with('message', 'The application form which you had filled for your new other noc has been rejected Successfully.');

        // display only Paid form (status=2)
        } elseif (Auth::user()->role == 2) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'officer_status' => 2, // ===== Rejected by operator
                'application_status' => 2, // ===== Chief Fire Officer will pass
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
                'current_rejected_status'  => $status,
                'current_rejected_role' => $auth_role
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 2)->with('message', 'The application form which you had filled for your new other noc has been rejected Successfully.');

        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'remarks' => $request->get('remarks'),
                'application_status' => 3, // ===== DMC will pass
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
                'current_rejected_status'  => $status,
                'current_rejected_role' => $auth_role
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 4)->with('message', 'The application form which you had filled for your new other noc has been rejected Successfully.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($all_status)
    {
        // dd($all_status);
        $query = DB::table('form_b AS t1')
                    ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID')
                    ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                    ->where('t2.noc_mode', 10) // ==== New Other NOC (status=1)
                    ->whereNUll('t1.deleted_at')
                    ->whereNUll('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC');

        if (Auth::user()->role == 0) {
            $query->where('t1.operator_status', $all_status);
        } elseif (Auth::user()->role == 1) {
            $query->where('t1.inspector_status', $all_status);
        } elseif (Auth::user()->role == 2) {
            $query->where('t1.officer_status', $all_status);
        } elseif (Auth::user()->role == 3) {
            $query->where('t1.status', $all_status);
        }

        $data = $query->get();
        // dd($data);

        return view('admin.form_b.all_application.new_form_b.grid')->with('data', $data)->with('all_status', $all_status);
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
        $query = DB::table('form_b AS t1')
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 10) // ==== New Other NOC (status=1)
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
        } elseif (Auth::user()->role == 3) {
            $query->where('t1.status', $all_status);
        }

        $data = $query->first();
        // dd($data);

        return view('admin.form_b.all_application.new_form_b.view')->with('data', $data)->with('all_status', $all_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_download_new_form_b_pdf($id, $status)
    {
        $data = DB::table('form_b as t1')
                ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID' , 't3.citizen_payment_status')
                ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id' )
                ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token' )
                ->where('t2.noc_mode', 10)  // ==== New Other NOC (status=1)
                ->where('t1.status', $status)
                ->where('t1.id', $id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->whereNUll('t3.deleted_at')
                ->first();

        return FacadePdf::loadView('citizen.form_b.new_form_b.new_form_b_pdf', compact('data','status'))->setPaper('a4')->stream("New Other NOC".$data->FB_NOC_ID.".pdf");
    }

}

