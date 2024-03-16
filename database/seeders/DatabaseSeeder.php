<?php

namespace Database\Seeders;

use App\Models\Eksplakkal;
use App\Models\Ohis;
use App\Models\Pengsiperi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GigiSeeder::class);
        $this->call(PermukaangigiSeeder::class);
        $this->call(KartupasienSeeder::class);
        $this->call(AnamripasienSeeder::class);
        $this->call(PertanyaanSeeder::class);
        $this->call(PengsiperiSeeder::class);
        $this->call(EksplakkalSeeder::class);
        $this->call(OhisSeeder::class);
    }  
}
