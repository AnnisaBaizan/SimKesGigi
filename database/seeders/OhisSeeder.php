<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OhisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 24; $i++) {
            $userId = ($i % 4) * 3 + 3; // Generate 3, 6, 9, or 12 alternately
            $pembimbingId = ($userId === 3) ? '1234567890122341' : (($userId === 6) ? '0926374816237653' : (($userId === 9) ? '1234567890127634' : '0926374816232387'));
            
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
                    $kartuPasienId = 1; // Set default value to 1 if conditions are not met
            }

             $diValues = [];
            $ciValues = [];
            for ($j = 1; $j <= 6; $j++) {// Generate random value between null, 0, 1, 2, and 3
                $diValue = rand(0, 4) === 0 ? null : rand(0, 3);
                $ciValue = rand(0, 4) === 0 ? null : rand(0, 3);
                
                $diValues[] = $diValue;
                $ciValues[] = $ciValue;
            }

            // Count jumlahNilaiDI and jumlahNilaiCI without counting null values
            $jumlahNilaiDI = array_sum(array_filter($diValues, function($value) { return $value !== null; }));
            $jumlahGigiDI = count(array_filter($diValues, function($value) { return $value !== null; }));
            $scoreDI = ($jumlahGigiDI !== 0) ? ($jumlahNilaiDI / $jumlahGigiDI) : 0;

            $jumlahNilaiCI = array_sum(array_filter($ciValues, function($value) { return $value !== null; }));
            $jumlahGigiCI = count(array_filter($ciValues, function($value) { return $value !== null; }));
            $scoreCI = ($jumlahGigiCI !== 0) ? ($jumlahNilaiCI / $jumlahGigiCI) : 0;

            $nilaiKriteriaOHIS = $scoreDI + $scoreCI;

            if ($nilaiKriteriaOHIS >= 0 && $nilaiKriteriaOHIS <= 1.2) {
                $kriteriaOHIS = 'Baik';
            } elseif ($nilaiKriteriaOHIS > 1.2 && $nilaiKriteriaOHIS <= 3.0) {
                $kriteriaOHIS = 'Sedang';
            } elseif ($nilaiKriteriaOHIS > 3.0 && $nilaiKriteriaOHIS <= 6.0) {
                $kriteriaOHIS = 'Buruk';
            } else {
                $kriteriaOHIS = '';
            }

            $createdAt = Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s');
            $updatedAt = Carbon::now();

            DB::table('ohis')->insert([
                'user_id' => $userId,
                'pembimbing' => $pembimbingId,
                'kartupasien_id' => $kartuPasienId,
                'di_1' => $diValues[0],
                'di_2' => $diValues[1],
                'di_3' => $diValues[2],
                'di_4' => $diValues[3],
                'di_5' => $diValues[4],
                'di_6' => $diValues[5],
                'ci_1' => $ciValues[0],
                'ci_2' => $ciValues[1],
                'ci_3' => $ciValues[2],
                'ci_4' => $ciValues[3],
                'ci_5' => $ciValues[4],
                'ci_6' => $ciValues[5],
                'jumlah_nilai_di' => $jumlahNilaiDI,
                'jumlah_gigi_di' => $jumlahGigiDI,
                'score_di' => number_format($scoreDI, 2),
                'jumlah_nilai_ci' => $jumlahNilaiCI,
                'jumlah_gigi_ci' => $jumlahGigiCI,
                'score_ci' => number_format($scoreCI, 2),
                'nilai_kriteria_ohis' => number_format($nilaiKriteriaOHIS, 2),
                'kriteria_ohis' => $kriteriaOHIS,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
