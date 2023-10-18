<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'DMC',
            'role' => '3',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234567890'),
            'inserted_by' => 1,
            'inserted_dt' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Chief Fire Officer',
            'role' => '2',
            'email' => 'cf_officer@gmail.com',
            'password' => bcrypt('1234567890'),
            'inserted_by' => 2,
            'inserted_dt' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Field Inspector',
            'role' => '1',
            'email' => 'f_inspector@gmail.com',
            'password' => bcrypt('1234567890'),
            'inserted_by' => 3,
            'inserted_dt' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Operator',
            'role' => '0',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('1234567890'),
            'inserted_by' => 4,
            'inserted_dt' => Carbon::now(),
        ]);
    }
}
