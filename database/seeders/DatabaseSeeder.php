<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(SeedEkosistem::class);
        $this->call(SeedRoles::class);
        $this->call(SeedUser::class);
        $this->call(SeedBankSampah::class);
        $this->call(SeedProduk::class);
        $this->call(SeedtransaksiSampah::class);
        $this->call(SeedtransaksiProduk::class);
    }
}
