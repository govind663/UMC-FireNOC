<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RemarksRequest;
use App\Models\Business_NOC;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRenewBusinessNOCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        if ($status == 0 || $status == 5 || $status == 1) {
            $query = DB::table('business_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                ->where('t2.noc_mode', 2) // ==== New Business NOC (status=1)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id', 'DESC');
        } else {
            $query = DB::table('business_noc AS t1')
                ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status', 't4.payment_recepit_doc')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token')
                ->leftJoin('fee_receipt_documents as t4', 't4.mst_token', '=', 't2.mst_token')
                ->where('t2.noc_mode', 2) // ==== New Business NOC (status=1)
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
        } elseif (Auth::user()->role == 4) {
            $query->where('t1.status', $status);
        } elseif (Auth::user()->role == 5) {
            $query->where('t1.status', $status);
            $query->where('t1.dmc_status', 1);
        } elseif (Auth::user()->role == 6) {
            $query->where('t1.status', $status);
            $query->where('t1.dmc_status', 1);
            $query->where('t1.addl_commissioner_status', 1);
        }

        $data = $query->get();

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
            ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 2) // ==== Renew Business NOC (status=2)
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

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 1)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

            // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 1) {

            // ==== Upload (f_inspector_doc)
            $fileName = "";

            if (!empty($request->hasFile('f_inspector_doc'))) {
                $image = $request->file('f_inspector_doc');
                $image_name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $new_name = time() . rand(10, 999) . '.' . $extension;
                $image->move(public_path('/UMC_FireNOC/Business_NOC/Renew_BusinessNOC/f_inspector_doc'), $new_name);

                $image_path = "/UMC_FireNOC/Business_NOC/Renew_BusinessNOC/f_inspector_doc" . $image_name;
                $fileName = $new_name;
            }

            $update = [
                'status' => 1, // === Unpaid (Level Up that means application go to User End)
                'inspector_status' => 1, // ===== Approved by Field Inspector
                'inspector_by' => Auth::user()->id,
                'f_inspector_dt' => date("Y-m-d H:i:s"),
                'inspector_dt' => date("Y-m-d H:i:s"),
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
                'f_inspector_doc' => $fileName,
                'f_inspector_remarks' => $request->f_inspector_remarks,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 1)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

            // display only Paid form (status=2)
        } elseif (Auth::user()->role == 2) {
            $update = [
                'status' => 6, // === Reviewed (Level Up that means application go to DMC)
                'officer_status' => 1, // ===== Approved by Chief Fire Officer
                'officer_by' => Auth::user()->id,
                'officer_dt' => date("Y-m-d H:i:s"),
                'application_status' => 2, // ===== Chief Fire Officer will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 1)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

            // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 3, // === Approved by DMC (This is the final step)
                'application_status' => 3, // ===== DMC will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 3)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 4) {
            $update = [
                'status' => 6, // === New (Level Up that means application go to Additional Commissioner)
                'dmc_status' => 1, // ===== Approved by DMC
                'dmc_by' => Auth::user()->id,
                'dmc_dt' => date("Y-m-d H:i:s"),
                'application_status' => 1, // ===== Additional Commissioner will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 1)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 5) {
            $update = [
                'status' => 6, // === New (Level Up that means application go to Commissioner)
                'addl_commissioner_status' => 1, // ===== Approved by Additional Commissioner
                'addl_commissioner_by' => Auth::user()->id,
                'addl_commissioner_dt' => date("Y-m-d H:i:s"),
                'application_status' => 1, // ===== Commissioner will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 1)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

        // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 6) {
            $update = [
                'status' => 6, // === New (Level Up that means application go to Chief Fire Officer)
                'commissioner_status' => 1, // ===== Approved by Commissioner
                'commissioner_by' => Auth::user()->id,
                'commissioner_dt' => date("Y-m-d H:i:s"),
                'application_status' => 1, // ===== Chief Fire Officer will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 1)->with('message', 'The application form which you had filled for your renew business noc has been approved Successfully.');

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
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 2)->with('message', 'The application form which you had filled for your renew business noc has been rejected Successfully.');

            // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 1) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'inspector_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 2)->with('message', 'The application form which you had filled for your renew business noc has been rejected Successfully.');

            // display only Paid form (status=2)
        } elseif (Auth::user()->role == 2) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'officer_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'application_status' => 2, // ===== Chief Fire Officer will pass
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 2)->with('message', 'The application form which you had filled for your renew business noc has been rejected Successfully.');

            // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'remarks' => $request->get('remarks'),
                'application_status' => 3, // ===== DMC will pass
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 4)->with('message', 'The application form which you had filled for your renew business noc has been rejected Successfully.');

            // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 4) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'dmc_status' => 2, // ===== Rejected by DMC
                'application_status' => 4, // ===== DMC will pass
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 2)->with('message', 'The application form which you had filled for your new business noc has been rejected Successfully.');

            // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 5) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'addl_commissioner_status' => 2, // ===== Rejected by Additional Commissioner
                'application_status' => 5, // ===== Additional Commissioner will pass
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 2)->with('message', 'The application form which you had filled for your new business noc has been rejected Successfully.');

            // display only Reviewed form (status=6)
        } elseif (Auth::user()->role == 6) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'commissioner_status' => 2, // ===== Rejected by Commissioner
                'application_status' => 6, // ===== Commissioner will pass
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
            ];

            Business_NOC::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_renew_business_noc_list', 2)->with('message', 'The application form which you had filled for your new business noc has been rejected Successfully.');
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
        $query = DB::table('business_noc AS t1')
            ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 2) // ==== New Business NOC (status=1)
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
        } elseif (Auth::user()->role == 4) {
            $query->where('t1.dmc_status', $all_status);
        } elseif (Auth::user()->role == 5) {
            $query->where('t1.addl_commissioner_status', $all_status);
        } elseif (Auth::user()->role == 6) {
            $query->where('t1.commissioner_status', $all_status);
        }

        $data = $query->get();
        // dd($data);

        return view('admin.business_noc.all_application.renew_business_noc.grid')->with('data', $data)->with('all_status', $all_status);
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
            ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 2) // ==== New Business NOC (status=1)
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
        } elseif (Auth::user()->role == 4) {
            $query->where('t1.dmc_status', $all_status);
        } elseif (Auth::user()->role == 5) {
            $query->where('t1.addl_commissioner_status', $all_status);
        } elseif (Auth::user()->role == 6) {
            $query->where('t1.commissioner_status', $all_status);
        }

        $data = $query->first();
        // dd($data);

        return view('admin.business_noc.all_application.renew_business_noc.view')->with('data', $data)->with('all_status', $all_status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admin_download_renew_business_noc_pdf($id, $status)
    {
        $data = DB::table('business_noc as t1')
            ->select('t1.*', 't2.*', 't1.id as RB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 2) // ==== Renew Business NOC (status=2)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->first();
        // dd($data);

        return FacadePdf::loadView('citizen.business_noc.renew_business_noc.renew_business_noc_pdf', compact('data', 'status'))->stream("Renew Business NOC #" . $data->RB_NOC_ID . ".pdf");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generate_renew_business_noc_certificate($id, $status)
    {
        $update = [
            'cf_activities' => 1,
        ];

        Business_NOC::where('id', $id)->where('status', $status)->update($update);
        return redirect()->route('admin_renew_business_noc_list', $status)->with('message', 'The application form which you had filled for your renew business noc has been certificate generated successfully.');
    }
}
