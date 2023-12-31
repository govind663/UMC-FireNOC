<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CitizenBusinessRepository
{
    public function getPendingCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 0)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnderprocessCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 5)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnpaidCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 1)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getGeneratedInvoiceCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 7)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getPaidCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 2)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getReviewedCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 6)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getApprovedCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 3)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getRejectedCitizenBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 4)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }
}
