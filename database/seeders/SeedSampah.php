<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedSampah extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        for($i=0; $i<3; $i++){
            DB::table('sampah')->insert([
                'user_id'=>4,
                'berat'=>rand(5,100),
                'foto'=>"ini src foto",
                'verified'=>rand(0,1) == 1,
            ]);
        }
    }
}
