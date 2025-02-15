<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Citizen;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citizens = [
            [
                'f_name' => 'Suraj',
                'm_name' => 'M',
                'l_name' => 'L',
                'mobile_no' => '7758913585',
                'email' => 'suraj@gmail.com',
                'password'=>'1234567890',
            ],
        ];

        foreach($citizens as $citizen){
            Citizen::updateOrCreate([
                'email' => $citizen['email'],
            ],[
                'f_name' => $citizen['f_name'],
                'm_name' => $citizen['m_name'],
                'l_name' => $citizen['l_name'],
                'mobile_no' => $citizen['mobile_no'],
                'email' => $citizen['email'],
                'password' => bcrypt($citizen['password']),
                'inserted_by' => 1,
                'inserted_dt' => Carbon::now(),
            ]);
        }
        // DB::table('citizens')->insert([
        //     'f_name' => 'Abhishek',
        //     'm_name' => 'Govind',
        //     'l_name' => 'Jha',
        //     'mobile_no' => '9004763926',
        //     'email' => 'gjha2733@gmail.com',
        //     'password' => bcrypt('1234567890'),
        //     'inserted_by' => 2,
        //     'inserted_dt' => Carbon::now(),
        // ]);
    }
}
