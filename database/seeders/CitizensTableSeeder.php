<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitizensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citizens')->insert([
            'f_name' => 'Abhishek',
            'm_name' => 'Govind',
            'l_name' => 'Jha',
            'mobile_no' => '9004763926',
            'email' => 'abhishek_jha456@gmail.com',
            'password' => bcrypt('1234567890'),
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);
    }
}
