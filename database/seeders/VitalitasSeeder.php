<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VitalitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define possible values for elemen gigi
        $elemenGigiValues = [11, 12, 13, 14, 21, 22, 23, 24, 31, 32, 33, 34, 41, 42, 43, 44];

        $count = 0;
        $masalahCounts = [
            "Karies Mencapai Email (KME)" => 0,
            "Karies Mencapai Dentin (KMD)" => 0,
            "Karies Mencapai Pulpa (KMP)" => 0,
            "Karies Mencapai Pulpa Vital (KMP Vital)" => 0,
            "Sisa Akar" => 0,
            "Karies Mencapai Pulpa Non Vital (KMP Non Vital)" => 0,
            "Peradangan" => 0
        ];

        while ($count < 28) {
            $userId = ($count % 4) * 3 + 3;
            $pembimbingId = $userId === 3 ? '1234567890122341' : ($userId === 6 ? '0926374816237653' : ($userId === 9 ? '1234567890127634' : '0926374816232387'));
            
            // Set kartuPasienId based on user_id and pembimbing
            switch ($userId) {
                case 3:
                    $kartuPasienId = rand(1, 3);
                    break;
                case 6:
                    $kartuPasienId = rand(4, 6);
                    break;
                case 9:
                    $kartuPasienId = rand(7, 9);
                    break;
                case 12:
                    $kartuPasienId = rand(10, 12);
                    break;
                default:
                    $kartuPasienId = rand(1, 12);
            }

            // Randomly select a value for elemen gigi from the defined array
            $elemenGigi = $elemenGigiValues[array_rand($elemenGigiValues)];
            
            // Generate random values for inspeksi, thermis, sondasi, perkusi, druk, mobility
            $inspeksi = rand(0, 1);
            $thermis = rand(0, 1);
            $sondasi = rand(0, 1);
            $perkusi = rand(0, 1);
            $druk = rand(0, 1);
            $mobility = rand(0, 1);
            
            // Determine masalah based on conditions
            if ($inspeksi == 1 && $thermis == 0 && $sondasi == 1 && $perkusi == 0 && $druk == 0 && $mobility == 0) {
                $masalah = "Karies Mencapai Email (KME)";
            } else if ($inspeksi == 1 && $thermis == 1 && $sondasi == 1 && $perkusi == 0 && $druk == 0 && $mobility == 0) {
                $masalah = "Karies Mencapai Dentin (KMD)";
            } else if ($inspeksi == 1 && $thermis == 1 && $sondasi == 1 && $perkusi == 1 && $druk == 0 && $mobility == 0) {
                $masalah = "Karies Mencapai Pulpa (KMP)";
            } else if (($inspeksi == 1 && $thermis == 1 && $sondasi == 1 && $perkusi == 1 && $druk == 1 && $mobility == 0) ||
                ($inspeksi == 1 && $thermis == 1 && $sondasi == 1 && $perkusi == 1 && $druk == 0 && $mobility == 1) ||
                ($inspeksi == 1 && $thermis == 1 && $sondasi == 1 && $perkusi == 1 && $druk == 1 && $mobility == 1)) {
                $masalah = "Karies Mencapai Pulpa Vital (KMP Vital)";
            } else if (($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 0 && $druk == 0 && $mobility == 0) ||
                ($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 0 && $druk == 0 && $mobility == 1) ||
                ($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 0 && $druk == 1 && $mobility == 0) ||
                ($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 0 && $druk == 1 && $mobility == 1) ||
                ($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 1 && $druk == 0 && $mobility == 1) ||
                ($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 1 && $druk == 1 && $mobility == 1)) {
                $masalah = "Sisa Akar";
            } else if (($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 1 && $druk == 0 && $mobility == 0) ||
                ($inspeksi == 1 && $thermis == 0 && $sondasi == 0 && $perkusi == 1 && $druk == 1 && $mobility == 0)) {
                $masalah = "Karies Mencapai Pulpa Non Vital (KMP Non Vital)";
            } else if ($inspeksi == 0 && $thermis == 0 && $sondasi == 0 && $perkusi == 0 && $druk == 0 && $mobility == 1) {
                $masalah = "Peradangan";
            } else {
                $masalah = "Tidak ditemukan";
            }

            // Skip this iteration if masalah is "Tidak ditemukan" or if it has already been added twice
            if ($masalah === "Tidak ditemukan" || $masalahCounts[$masalah] >= 4) {
                continue;
            }

            $randomCreatedAt = Carbon::create(rand(2022, 2024), rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59))->format('Y-m-d H:i:s');
            $randomUpdatedAt = Carbon::create(rand(2022, 2024), rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59))->format('Y-m-d H:i:s');

            DB::table('vitalitas')->insert([
                'user_id' => $userId,
                'pembimbing' => $pembimbingId,
                'kartupasien_id' => $kartuPasienId,
                'elemen_gigi'=> $elemenGigi,
                'inspeksi' => $inspeksi,
                'thermis' => $thermis,
                'sondasi' => $sondasi,
                'perkusi' => $perkusi,
                'druk' => $druk,
                'mobility' => $mobility,
                'masalah' => $masalah,
                'created_at' => $randomCreatedAt,
                'updated_at' => $randomUpdatedAt,
            ]);

            // Increment the count for the specific masalah
            $masalahCounts[$masalah]++;
            $count++;
        }
    }
}