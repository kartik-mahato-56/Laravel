<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('communicaton_details')->delete();
        DB::table('communicaton_details')->insert([
            0=>[
                'id'=>1,
                'admin_id'=>1,
                'user_id' =>2,
                'date' => date('Y-m-d')
            ],
            1=>[
                'id'=>2,
                'admin_id'=>1,
                'user_id' =>5,
                'date' => date('Y-m-d')
            ],
            2=>[
                'id'=>3,
                'admin_id'=>3,
                'user_id' =>3,
                'date' => date('Y-m-d')
            ],
            3=>[
                'id'=>4,
                'admin_id'=>6,
                'user_id' =>4,
                'date' => date('Y-m-d')
            ]
        ]);

    }
}
