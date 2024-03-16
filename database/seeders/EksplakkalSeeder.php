<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EksplakkalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $mukaOptions = ['Simetris', 'Tidak Simetris'];
            $terabaOptions = ['Teraba', 'Tidak Teraba'];
            $textureOptions = ['Keras', 'Lunak'];
            $sakitOptions = ['Sakit', 'Tidak Sakit'];
            $allowedNumbers = [11, 12, 13, 14, 15, 16, 17, 18, 21, 22, 23, 24, 25, 26, 27, 28, 31, 32, 33, 34, 35, 36, 37, 38, 41, 42, 43, 44, 45, 46, 47, 48];
            $allowedWord = ['Distal', 'Bukal', 'Mesial', 'Oklusal', 'Palatal', 'Lingual'];
    
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
    
                // Generate random attributes
                $muka = $mukaOptions[array_rand($mukaOptions)];
                $limpe_kanan_teraba = $terabaOptions[array_rand($terabaOptions)];
                $limpe_kanan_texture = $textureOptions[array_rand($textureOptions)];
                $limpe_kanan_sakit = $sakitOptions[array_rand($sakitOptions)];
                $limpe_kiri_teraba = $terabaOptions[array_rand($terabaOptions)];
                $limpe_kiri_texture = $textureOptions[array_rand($textureOptions)];
                $limpe_kiri_sakit = $sakitOptions[array_rand($sakitOptions)];
    
                // Generate random array length for 'plak', 'supragingiva', and 'subgingiva'
                $plak = $this->generateRandomData($allowedNumbers, $allowedWord, rand(1, 50));
                $supraGingiva = $this->generateRandomData($allowedNumbers, $allowedWord, rand(1, 50));
                $subGingiva = $this->generateRandomData($allowedNumbers, $allowedWord, rand(1, 50));
    
                // Count jumlah_plak and calculate other attributes
                $jumlahPlak = count($plak);
                $jumlahPermukaan = rand($jumlahPlak + 1, 190); 
                $jumlahTidakPlak = $jumlahPermukaan - $jumlahPlak;
                $plaqueScore = number_format(($jumlahTidakPlak / $jumlahPermukaan) * 100, 2);
                $kriteria = ($plaqueScore >= 85) ? 'Baik' : 'Buruk';
    
                $created_at = Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s');
                $updated_at = Carbon::now();
    
                DB::table('eksplakkals')->insert([
                    'user_id' => $userId,
                    'pembimbing' => $pembimbingId,
                    'kartupasien_id' => $kartuPasienId,
                    'muka' => $muka,
                    'limpe_kanan_teraba' => $limpe_kanan_teraba,
                    'limpe_kanan_texture' => $limpe_kanan_texture,
                    'limpe_kanan_sakit' => $limpe_kanan_sakit,
                    'limpe_kiri_teraba' => $limpe_kiri_teraba,
                    'limpe_kiri_texture' => $limpe_kiri_texture,
                    'limpe_kiri_sakit' => $limpe_kiri_sakit,
                    'plak' => implode(', ', $plak),
                    'jumlah_plak' => $jumlahPlak,
                    'jumlah_permukaan' => $jumlahPermukaan,
                    'jumlah_tidak_plak' => $jumlahTidakPlak,
                    'plaque_score' => $plaqueScore,
                    'kriteria' => $kriteria,
                    'supragingiva' => implode(', ', $supraGingiva),
                    'subgingiva' => implode(', ', $subGingiva),
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ]);
            }
        }
    }
    
    
    private function generateRandomData(array $allowedNumbers, array $allowedWord, int $count): array {
        $data = [];
        for ($i = 0; $i < $count; $i++) {
            $data[] = $allowedNumbers[array_rand($allowedNumbers)] . ' ' . $allowedWord[array_rand($allowedWord)];
        }
        return $data;
    }
}