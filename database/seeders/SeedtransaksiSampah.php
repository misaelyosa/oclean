<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class SeedtransaksiSampah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<3; $i++){
            DB::table('TransaksiSampah')->insert([
                'berat'=>rand(10,50),
                'id_user'=>4,
                'id_bnksmph'=>1,
            ]);
        }
    }
}