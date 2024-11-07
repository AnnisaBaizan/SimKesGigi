<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodontalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elemenPermukaanGigiValues = ['31 Distal', '32 Mesial', '33 Distal', '34 Mesial', '41 Distal', '42 Mesial', '43 Distal', '44 Mesial'];
        $kalkulusValues = ['Subgingiva', 'Supragingiva'];

        $count = 0;
        $masalahCounts = [
            "Gingivitis" => 0,
            "Periodontitis" => 1,
            "Abscess Periodontal" => 2,
            "Tidak ditemukan" => 3
        ];

        while ($count < 14) {
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

            $eksplakkalId = rand(1, 3);

            // Randomly select values for elemen_permukaan_gigi and kalkulus
            $elemenPermukaanGigi = $elemenPermukaanGigiValues[array_rand($elemenPermukaanGigiValues)];
            $kalkulus = $kalkulusValues[array_rand($kalkulusValues)];
            
            // Generate random values for pocket_depth, pocket_sakit, rubor, tumor, kolor, dolor, fungsio, attachment, pus
            $pocketDepth = rand(50, 90) / 100.0;
            $pocketSakit = rand(0, 1);
            $rubor = rand(0, 1);
            $tumor = rand(0, 1);
            $kolor = rand(0, 1);
            $dolor = rand(0, 1);
            $fungsio = rand(0, 1);
            $attachment = rand(0, 1);
            $pus = rand(0, 1);

            // Generate random string for dll
            $dll = $this->generateRandomString(10);

            // Determine masalah based on conditions
            if ($pocketDepth == 1 && $rubor == 1 && $tumor == 0 && $kolor == 1 && $dolor == 0 && $fungsio == 1 && $attachment == 0 && $pus == 1) {
                $masalah = "Gingivitis";
            } else if ($pocketDepth == 1 && $rubor == 1 && $tumor == 1 && $kolor == 1 && $dolor == 1 && $fungsio == 1 && $attachment == 1 && $pus == 1) {
                $masalah = "Periodontitis";
            } else if ($pocketDepth == 1 && $rubor == 1 && $tumor == 1 && $kolor == 1 && $dolor == 1 && $fungsio == 1 && $attachment == 1 && $pus == 1 ) {
                $masalah = "Abscess Periodontal";
            } else {
                $masalah = "Tidak ditemukan";
            }

            // Skip this iteration if masalah is "Tidak ditemukan" or if it has already been added twice
            if ($masalah === "Tidak ditemukan" || $masalahCounts[$masalah] >= 2) {
                continue;
            }

            $randomCreatedAt = Carbon::create(rand(2022, 2024), rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59))->format('Y-m-d H:i:s');
            $randomUpdatedAt = Carbon::create(rand(2022, 2024), rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59))->format('Y-m-d H:i:s');

            DB::table('periodontals')->insert([
                'user_id' => $userId,
                'pembimbing' => $pembimbingId,
                'kartupasien_id' => $kartuPasienId,
                'eksplakkal_id' => $eksplakkalId,
                
                'elemen_permukaan_gigi' => $elemenPermukaanGigi,
                'kalkulus' => $kalkulus,
                'pocket_depth' => $pocketDepth,
                'pocket_sakit' => $pocketSakit,
                'rubor' => $rubor,
                'tumor' => $tumor,
                'kolor' => $kolor,
                'dolor' => $dolor,
                'fungsio' => $fungsio,
                'attachment' => $attachment,
                'pus' => $pus,
                'dll' => $dll,
                'masalah' => $masalah,
                'created_at' => $randomCreatedAt,
                'updated_at' => $randomUpdatedAt,
            ]);

            // Increment the count for the specific masalah
            $masalahCounts[$masalah]++;
            $count++;
        }
    }

    private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}