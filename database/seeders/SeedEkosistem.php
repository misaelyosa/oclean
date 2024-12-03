<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class SeedEkosistem extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<3; $i++){
            DB::table('ekosistems')->insert([
                'rt_rw_kec_kota'=>$faker->postcode(),
                'detail'=>$faker->address(),
            ]);
        }
    }
}
