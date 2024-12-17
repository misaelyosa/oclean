<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class SeedtransaksiProduk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<3; $i++){
            $jum = rand(1,5);
            $harga = rand(50000,100000);
            DB::table('TransaksiProduk')->insert([
                'jumlah'=>$jum,
                'harga'=>$harga,
                'total'=>$jum * $harga,
                'id_bnksmph'=>1,
                'id_user'=>4,
                'id_produk'=>rand(1,3),
            ]);
        }
    }
}
