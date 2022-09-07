<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            0=>[
                'id'=>1,
                'username' => "Kartik Mahato",
                'email' => "kartik123@gmail.com",
                'password' => Hash::make('kartik123'),
                'role' => 1
            ],
            1 =>[
                'id'=>2,
                'username' => "Kushal Majumder",
                'email' => "kushal123@gmail.com",
                'password' => Hash::make('kushal123'),
                'role' => 2
            ],
            2 =>[
                'id'=>3,
                'username' => "Sangeeta Chowdhury",
                'email' => "sangeeta123@gmail.com",
                'password' => Hash::make('sangeeta123'),
                'role' => 2
            ],
            3 =>[
                'id'=>4,
                'username' => "Souvik Das",
                'email' => "souvik123@gmail.com",
                'password' => Hash::make('souvik123'),
                'role' => 3
            ],
            4 =>[
                'id'=>5,
                'username' => "Suman Kundu",
                'email' => "suman123@gmail.com",
                'password' => Hash::make('suman123'),
                'role' => 3
            ]
        ]);
            
    }
}
