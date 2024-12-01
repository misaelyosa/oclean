<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SeedBankSampah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<3; $i++){
            DB::table('BankSampah')->insert([
                'nama'=>$faker->name(),
                'totalSampah'=>rand(10,100),
                'admin'=>2,
            ]);
        }
    }
}
