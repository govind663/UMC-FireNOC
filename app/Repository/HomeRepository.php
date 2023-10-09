<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class HomeRepository
{
    public function getTotalCitizen()
    {
        $totalCitizen = DB::table('citizens AS t1')
                        ->select('t1.id')
                        ->whereNUll('t1.deleted_at')
                        ->orderBy('t1.id','DESC')
                        ->count();

        return $totalCitizen;
    }

}
