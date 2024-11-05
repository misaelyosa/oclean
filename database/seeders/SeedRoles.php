<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['user_id' => 1, 'role' => 'superadmin'],
            ['user_id' => 2, 'role' => 'admin_bank_sampah'],
            ['user_id' => 3, 'role' => 'peternak_maggot'],
            ['user_id' => 4, 'role' => 'user']
        ];

        DB::table('roles')->insert($roles);
    }
}

