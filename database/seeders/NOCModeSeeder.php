<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NOCModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // === Business
        DB::table('fee_mode_operates')->insert([
            'operation_mode' => 'Benefit',
            'fee_construction_id' => 1,
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('fee_mode_operates')->insert([
            'operation_mode' => 'Non Benefit',
            'fee_construction_id' => 1,
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);

        // === Hospital
        DB::table('fee_mode_operates')->insert([
            'operation_mode' => 'Residential',
            'fee_construction_id' => 2,
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('fee_mode_operates')->insert([
            'operation_mode' => 'Non Residential',
            'fee_construction_id' => 2,
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);

        // === Building
        DB::table('fee_mode_operates')->insert([
            'operation_mode' => 'Residential',
            'fee_construction_id' => 3,
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('fee_mode_operates')->insert([
            'operation_mode' => 'Non Residential',
            'fee_construction_id' => 3,
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);

    }
}
