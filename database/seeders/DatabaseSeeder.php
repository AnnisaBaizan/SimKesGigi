<?php

namespace Database\Seeders;

use App\Models\Anomalimukosa;
use App\Models\Askepgilut;
use App\Models\Eksplakkal;
use App\Models\Gejala;
use App\Models\Odontogram;
use App\Models\Ohis;
use App\Models\Pengsiperi;
use App\Models\Penyebab;
use App\Models\Periodontal;
use App\Models\User;
use App\Models\Vitalitas;
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
        $this->call(OdontogramSeeder::class);
        $this->call(AnomalimukosaSeeder::class);
        $this->call(AskepgilutSeeder::class);
        $this->call(PenyebabSeeder::class);
        $this->call(GejalaSeeder::class);
        $this->call(VitalitasSeeder::class);
        $this->call(PeriodontalSeeder::class);
    }  
}
