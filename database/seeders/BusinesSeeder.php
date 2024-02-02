<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_master')->insert([
            'business_nature' => 'Hotel & Canteen',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Stable',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Timber Mart / Furniture',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Oil Stock & Sales',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Kerosene',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Diesel',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Patrol',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Company / Factory',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Petrol Pump',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Theatre',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Hall',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Rationing',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'General Stores',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Temporary funfair / Fair / Circus',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Storage and Sale of Explosive goods',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
        DB::table('business_master')->insert([
            'business_nature' => 'Other',
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
    }
}
