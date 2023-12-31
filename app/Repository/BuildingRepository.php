<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class BuildingRepository
{
    public function getPendingBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 0)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnderprocessBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 5)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnpaidBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 1)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getGeneratedInvoiceBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 7)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getPaidBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 2)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getReviewedBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 6)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getApprovedBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 3)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getRejectedBuildingNOC()
    {
        return DB::table('building_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 4)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }
}
