<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Commissioner',
                'role' => '6',
                'email' => 'commissioner@gmail.com'
            ],
            [
                'name' => 'Additional Commissioner',
                'role' => '5',
                'email' => 'addl_commissioner@gmail.com'
            ],
            [
                'name' => 'DMC',
                'role' => '4',
                'email' => 'dmc@gmail.com'
            ],
            [
                'name' => 'Chief Fire Officer',
                'role' => '3',
                'email' => 'cf_officer@gmail.com'
            ],
            [
                'name' => 'Checker Maker',
                'role' => '2',
                'email' => 'checker_maker@gmail.com'
            ],
            [
                'name' => 'Field Inspector',
                'role' => '1',
                'email' => 'f_inspector@gmail.com'
            ],
            [
                'name' => 'Operator',
                'role' => '0',
                'email' => 'operator@gmail.com'
            ],
            [
                'name' => 'Clerk',
                'role' => '7',
                'email' => 'clerk@gmail.com'
            ],
            [
                'name' => 'Station Officer',
                'role' => '8',
                'email' => 'st_officer@gmail.com'
            ]
        ];

        foreach($users as $user){
            User::updateOrCreate([
                'email' => $user['email'],
            ],[
                'name' => $user['name'],
                'role' => $user['role'],
                'email' => $user['email'],
                'password' => bcrypt('1234567890'),
                'inserted_by' => 1,
                'inserted_dt' => Carbon::now(),
            ]);
        }
        
    }
}
