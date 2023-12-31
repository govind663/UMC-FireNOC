<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class BusinessRepository
{
    public function getPendingBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 0)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnderprocessBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 5)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnpaidBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 1)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getGeneratedInvoiceBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 7)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getPaidBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 2)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getReviewedBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 6)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getApprovedBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 3)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getRejectedBusinessNOC()
    {
        return DB::table('business_noc AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 4)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }
}
