<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class SeedUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $faker = Faker::create();
        $gender = ['female', 'male'];
        $names = ['admin', 'bank sampah', 'peternakmaggot', 'rumah tangga'];
        $emails = ['admin@gmail.com', 'banksampah@gmail.com', 'peternakmaggot@gmail.com', 'rumahtangga@gmail.com'];
        $roles = [1,2,3,4];
        $count= count($emails);

        for($i=0; $i<$count; $i++){
            DB::table('users')->insert([
                'name'=>$names[$i],
                'email'=>$emails[$i],
                'role'=>$roles[$i],
                'password'=>bcrypt('password'),
                'gender'=>$faker->randomElement($gender),
                'alamat'=>$faker->address(),
                'poin'=>0,
                'umur'=>rand(10,80),
                'no_telp'=>$faker->phoneNumber(),
            ]);
        }
    }
}
