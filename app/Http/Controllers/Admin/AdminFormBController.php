<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RemarksRequest;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\Snappy\Facades\SnappyPdf;

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
        if ($status == 0 || $status == 5 || $status == 1) {
            $query = DB::table('form_b AS t1')
                ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                ->where('t2.noc_mode', 10) // ==== New Business NOC (status=1)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id', 'DESC');
        } else {
            $query = DB::table('form_b AS t1')
                ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status', 't4.payment_recepit_doc')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
                ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token')
                ->leftJoin('fee_receipt_documents as t4', 't4.mst_token', '=', 't2.mst_token')
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
        } elseif (Auth::user()->role == 4) {
            $query->where('t1.status', $status);
        } elseif (Auth::user()->role == 7) {
            if ($status == 0) {
                $query->where('t1.status', $status);
            } else if ($status == 5) {
                $query->whereIn('t1.status', [$status, 8]);
            }
        } elseif (Auth::user()->role == 8) {
            $query->where('t1.status', $status);
        }

        $data = $query->get();
        // dd($data);
        return view('admin.form_b.new_form_b.grid')->with(['data' => $data, 'status' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $status)
    {
        //  return($status);
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
        if (Auth::user()->role == 7) {

            // Initialize the update array
            $update = [
                'clerk_status' => 1, // Approved by operator
                'clerk_by' => Auth::user()->id,
                'clerk_dt' => date("Y-m-d H:i:s"),
                'application_status' => 8, // Change this to the appropriate status for NOC
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
                'status' => 8,
            ];

            // Check which button was clicked
            if ($request->has('contractor_dt', 'contractor_name', 'contractor_address', 'fees_paid', 'annual_charges', 'total_charge', 'shera')) {
                // If the demand letter button was clicked
                $update = array_merge($update, [
                    'status' => 5, // New (Level Up that means application goes to field inspector)
                    'contractor_dt' => date("Y-m-d H:i:s"), // Approved by operator
                    'contractor_name' => $request->contractor_name,
                    'contractor_address' => $request->contractor_address,
                    'fees_paid' => $request->fees_paid,
                    'annual_charges' => $request->annual_charges,
                    'total_charge' => $request->total_charge,
                    'shera' => $request->shera,
                ]);
            } elseif ($request->has('f_inspector_dt')) {
                // If the noc letter button was clicked
                $update = array_merge($update, [
                    'status' => 5, // Change this to the appropriate status for NOC
                    'f_inspector_dt' => date("Y-m-d H:i:s"),
                ]);
            }

            //  dd($request->all());
            FormB::where('id', $id)->where('status', $status)->update($update);

            return redirect()->route('all_new_form_b_list', 5)->with('message', 'The application form which you had filled for your new form b has been approved Successfully.');

            // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 8) {

            // ==== Upload (f_inspector_doc)
            // $fileName = "";

            // if (!empty($request->hasFile('ch_inspector_doc'))) {
            //     $image = $request->file('ch_inspector_doc');
            //     $image_name = $image->getClientOriginalName();
            //     $extension = $image->getClientOriginalExtension();
            //     $new_name = time() . rand(10, 999) . '.' . $extension;
            //     $image->move(public_path('/PMC_FireNOC/form_b/New_FormB/ch_inspector_doc'), $new_name);

            //     $image_path = "/PMC_FireNOC/form_b/New_FormB/ch_inspector_doc" . $image_name;
            //     $fileName = $new_name;
            // }

            $update = [
                'status' => 5, // === Unpaid (Level Up that means application go to User End)
                'station_status' => 1, // ===== Approved by Field Inspector
                'station_by' => Auth::user()->id,
                'station_dt' => date("Y-m-d H:i:s"),
                'application_status' => 8,
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
                // 'ch_inspector_doc' => $fileName,
                // 'ch_inspector_remarks' => $request->ch_inspector_remarks
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 5)->with('message', 'The application form which you had filled for your new form b has been approved Successfully.');

            // display only Paid form (status=2)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 1, // === Reviewed (Level Up that means application go to DMC)
                'cf_status' => 1, // ===== Approved by Field Inspector
                'cf_by' => Auth::user()->id,
                'cf_dt' => date("Y-m-d H:i:s"),
                'application_status' => 3, // ===== Chief Fire Officer will pass
                'approved_dt' => date("Y-m-d H:i:s"),
                'approved_by' => Auth::user()->id,
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 3)->with('message', 'The application &&&& form which you had filled for your new other noc has been approved Successfully.');

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
        if (Auth::user()->role == 7) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'clerk_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
                'current_rejected_status' => $status,
                'current_rejected_role' => $auth_role
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 2)->with('message', 'The application form which you had filled for your new other noc has been rejected Successfully.');

            // display only underprocess form (status=5)
        } elseif (Auth::user()->role == 8) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'station_status' => 2, // ===== Rejected by operator
                'remarks' => $request->get('remarks'),
                'rejected_dt' => date("Y-m-d H:i:s"),
                'rejected_by' => Auth::user()->id,
                'current_rejected_status'  => $status,
                'current_rejected_role' => $auth_role
            ];

            FormB::where('id', $id)->where('status', $status)->update($update);
            return redirect()->route('all_new_form_b_list', 2)->with('message', 'The application form which you had filled for your new other noc has been rejected Successfully.');

            // display only Paid form (status=2)
        } elseif (Auth::user()->role == 3) {
            $update = [
                'status' => 4, // === Rejected (this form go to direct display in user rejected list)
                'cf_status' => 2, // ===== Rejected by operator
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
        } elseif (Auth::user()->role == 4) {
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
            return redirect()->route('all_new_form_b_list', 4)->with('message', 'The application form which you had filled for your new form b has been rejected Successfully.');
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($all_status)
    {
        $statusArray = is_array($all_status) ? $all_status : [$all_status];

        $query = DB::table('form_b AS t1')
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID')
            ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id')
            ->where('t2.noc_mode', 10)
            ->whereNull('t2.deleted_at')
            ->where('t1.status', $statusArray)
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
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token')
            ->where('t2.noc_mode', 10)  // ==== New Other NOC (status=1)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->whereNUll('t3.deleted_at')
            ->first();

        return FacadePdf::loadView('citizen.form_b.new_form_b.new_form_b_pdf', compact('data', 'status'))->setPaper('a4')->stream("New Form B" . $data->FB_NOC_ID . ".pdf");
    }

    public function admin_download_clerk_demand_letter_pdf($id, $status)
    {

        $data = DB::table('form_b as t1')
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token')
            ->where('t2.noc_mode', 10)  // ==== New Other NOC (status=1)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->whereNUll('t3.deleted_at')
            ->get();

            $datas = DB::table('form_b as t1')
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token')
            ->where('t2.noc_mode', 10)  // ==== New Other NOC (status=1)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->whereNUll('t3.deleted_at')
            ->first();
        // dd($datas);
        $pdf = SnappyPdf::loadView('admin.form_b.new_form_b.demand_form_b_pdf', compact('data','datas', 'status'))
            ->setPaper('a4')
            ->setOption('margin-bottom', 3)
            ->setOption('margin-top', 3)
            ->setOption('margin-left', 3)
            ->setOption('margin-right', 3)
            ->setOption('enable-local-file-access', true); // ✅ Enable local file loading


        // return FacadePdf::loadView('admin.form_b.new_form_b.demand_form_b_pdf', compact('data','status'))->setPaper('a4')->stream("New Form B".$data->FB_NOC_ID.".pdf");

        return $pdf->inline('CERTIFICATE_' . $datas->noc_mst_id . '.pdf');
    }

    // public function showApprovalForm($FB_NOC_ID, $status, $auth_role)
    // {
    //     // Pass the data to the view if needed
    //     return view('admin.form_b.demand_form', compact('FB_NOC_ID', 'status', 'auth_role'));
    // }

    // // Method to process the approval form submission
    // public function processApprovalForm(Request $request, $FB_NOC_ID, $status, $auth_role)
    // {
    //     // Validate the form data
    //     $request->validate([
    //         'contractor_dt' => 'required|date',
    //         'contractor_name' => 'required|string|max:255',
    //         'contractor_address' => 'required|string|max:255',
    //         'fees_paid' => 'required|numeric',
    //         'annual_charges' => 'required|numeric',
    //         'total_charge' => 'required|numeric',
    //         'shera' => 'required|numeric',
    //     ]);

    //     // Process the approval data here (e.g., save to the database)
    //     // Example: Update approval status or save data

    //     return redirect()->route('admin.form.approve', [$FB_NOC_ID, $status, $auth_role])
    //                      ->with('success', 'Approval submitted successfully.');
    // }

    public function admin_download_clerk_noc_letter_pdf($id, $status)
    {
        $data = DB::table('form_b as t1')
            ->select('t1.*', 't2.*', 't1.id as FB_NOC_ID', 't2.id as d_ID', 't3.citizen_payment_status')
            ->leftJoin('noc_master as t2', 't2.id', '=', 't1.noc_mst_id')
            ->leftJoin('citizen_payments as t3', 't3.mst_token', '=', 't2.mst_token')
            ->where('t2.noc_mode', 10)  // ==== New Other NOC (status=1)
            ->where('t1.status', $status)
            ->where('t1.id', $id)
            ->whereNUll('t1.deleted_at')
            ->whereNUll('t2.deleted_at')
            ->whereNUll('t3.deleted_at')
            ->first();
        // dd($data);

        $pdf = SnappyPdf::loadView('admin.form_b.new_form_b.objection_form_b_pdf', compact('data', 'status'))
            ->setPaper('a4')
            ->setOption('margin-bottom', 3)
            ->setOption('margin-top', 3)
            ->setOption('margin-left', 3)
            ->setOption('margin-right', 3)
            ->setOption('enable-local-file-access', true); // ✅ Enable local file loading

        // return FacadePdf::loadView('admin.form_b.new_form_b.objection_form_b_pdf', compact('data','status'))->setPaper('a4')->stream("New Form B".$data->FB_NOC_ID.".pdf");
        return $pdf->inline('CERTIFICATE_' . $data->FB_NOC_ID . '.pdf');
    }
}
