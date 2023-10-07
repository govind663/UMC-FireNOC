<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class HospitalRepository
{
    public function getPendingHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 0)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnderprocessHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 5)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnpaidHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 1)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }


    public function getPaidHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 2)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getReviewedHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 6)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getApprovedHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 3)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getRejectedHospitalNOC()
    {
        return DB::table('hospital_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 4)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }
}
