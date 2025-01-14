<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CitizenFormRepository
{
    public function getPendingCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 0)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnderprocessCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 5)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getUnpaidCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 1)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getGeneratedInvoiceCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 7)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getPaidCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 2)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getReviewedCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 6)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getApprovedCitizenFormB()
    {
        return DB::table('form_b AS t1')
                ->select('t1.id')
                ->leftJoin('noc_master AS t2', 't2.id', '=', 't1.noc_mst_id' )
                ->where('t1.status', 3)
                ->where('t2.citizen_id',  Auth::user()->id)
                ->whereNUll('t1.deleted_at')
                ->whereNUll('t2.deleted_at')
                ->orderBy('t1.id','DESC')
                ->count();
    }

    public function getRejectedCitizenFormB()
    {
        return DB::table('form_b AS t1')
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
