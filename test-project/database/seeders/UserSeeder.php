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
        
        DB::table('admins')->insert([
            0=>[
                
                'username' => "Sumit Mahato",
                'email' => "sumit123@gmail.com",
                'password' => Hash::make('sumit123'),
                'role' => 1
            ],
            1=>[
                
                'username' => "Anil Gupta",
                'email' => "anil123@gmail.com",
                'password' => Hash::make('anil123'),
                'role' => 2
            ],
            2=>[
                
                'username' => "Khusal Gupta",
                'email' => "khusal123@gmail.com",
                'password' => Hash::make('khusal123'),
                'role' => 3
            ],
            3=>[
                
                'username' => "Vinit Pratap",
                'email' => "vinit123@gmail.com",
                'password' => Hash::make('vinit123'),
                'role' => 3
            ],
            4=>[
                
                'username' => "Ashish Kumar",
                'email' => "ashish123@gmail.com",
                'password' => Hash::make('ashish123'),
                'role' => 3
            ]
           
        ]);
            
    }
}
