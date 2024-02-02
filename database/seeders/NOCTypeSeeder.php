<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NOCTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fee_constructions')->insert([
            'construction_type' => 'Business',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);

        DB::table('fee_constructions')->insert([
            'construction_type' => 'Hospital',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);

        DB::table('fee_constructions')->insert([
            'construction_type' => 'Building',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
    }
}
