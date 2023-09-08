<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitizenHomeController extends Controller
{
    public function Citizen_Home()
    {
        // ==== new_business_noc(pending)
        $business_total_pending = DB::table('business_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 0)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($business_total_pending);

        // ==== new_business_noc(unpaid)
        $business_total_unpaid = DB::table('business_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 1)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($business_total_unpaid);

        // ==== new_business_noc(paid)
        $business_total_paid = DB::table('business_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 2)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($business_total_paid);

        // ==== new_business_noc(Approved)
        $business_total_approved = DB::table('business_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 3)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($business_total_approved);

        // ==== new_business_noc(Rejected)
        $business_total_rejected = DB::table('business_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 4)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($business_total_rejected);



        // ==== new_hospital_noc(pending)
        $hospital_total_pending = DB::table('hospital_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 0)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($hospital_total_pending);

        // ==== new_hospital_noc(unpaid)
        $hospital_total_unpaid = DB::table('hospital_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 1)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($hospital_total_unpaid);

        // ==== new_hospital_noc(paid)
        $hospital_total_paid = DB::table('hospital_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 2)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($hospital_total_paid);

        // ==== new_hospital_noc(Approved)
        $hospital_total_approved = DB::table('hospital_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 3)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($hospital_total_approved);

        // ==== new_hospital_noc(Rejected)
        $hospital_total_rejected = DB::table('hospital_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 4)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($hospital_total_rejected);


        // ==== new_building_noc(pending)
        $building_total_pending = DB::table('building_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 0)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($building_total_pending);

        // ==== new_building_noc(unpaid)
        $building_total_unpaid = DB::table('building_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 1)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($building_total_unpaid);

        // ==== new_building_noc(paid)
        $building_total_paid = DB::table('building_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 2)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($building_total_paid);

        // ==== new_building_noc(Approved)
        $building_total_approved = DB::table('building_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 3)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($building_total_approved);

        // ==== new_building_noc(Rejected)
        $building_total_rejected = DB::table('building_noc AS t1')
                        ->select('t1.id')
                        ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                        ->where('t1.status', 4)
                        ->whereNUll('t1.deleted_at')
                        ->whereNUll('t2.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();
        // dd($building_total_rejected);

        return view('citizen.citizen_dashboard')
        ->with(['business_total_pending' => $business_total_pending,'business_total_unpaid' => $business_total_unpaid,'business_total_paid' => $business_total_paid, 'business_total_rejected' => $business_total_rejected, 'business_total_approved' => $business_total_approved])
        ->with(['hospital_total_pending' => $hospital_total_pending,'hospital_total_unpaid' => $hospital_total_unpaid,'hospital_total_paid' => $hospital_total_paid, 'hospital_total_rejected' => $hospital_total_rejected, 'hospital_total_approved' => $hospital_total_approved])
        ->with(['building_total_pending' => $building_total_pending,'building_total_unpaid' => $building_total_unpaid,'building_total_paid' => $building_total_paid, 'building_total_rejected' => $building_total_rejected, 'building_total_approved' => $building_total_approved]);
    }
}
