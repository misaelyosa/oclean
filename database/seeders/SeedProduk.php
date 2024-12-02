<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class SeedProduk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<3; $i++){
            DB::table('produks')->insert([
                'namaProduk'=>$faker->word(),
                'harga'=>random_int(50000,150000),
                'jumlah'=>random_int(0,15),
                'bank'=>random_int(2,4),
            ]);
        }
    }
}
