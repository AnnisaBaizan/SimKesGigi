<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengsiperiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            for ($i = 0; $i < 24; $i++) {
                $userId = ($i % 4) * 3 + 3;
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
    
                // Generate random array length for 'pengetahuan'
                $pengetahuanLength = rand(1, 15);
                $pengetahuan = implode(',', $this->generateRandomArray(1, 15, $pengetahuanLength)); // Generate array with random length and random numbers between 1 and 15
    
                $jumlahPertanyaanPeng = 15;
                $jawabanBenarPeng = count(explode(',', $pengetahuan));
                $nilaiPeng = number_format(($jawabanBenarPeng / $jumlahPertanyaanPeng)*100, 2); // Format nilaiPeng
                $kriteria = ($nilaiPeng > 75) ? 'Baik' : (($nilaiPeng >= 56 && $nilaiPeng <= 75) ? 'Sedang' : 'Buruk');
                $labialbukal = rand(1, 3);
                $hasilLb = ($labialbukal === 1 || $labialbukal === 3) ? 'Benar' : 'Salah';
                $lingualpalatal = rand(1, 2);
                $hasilLp = ($lingualpalatal === 1) ? 'Benar' : 'Salah';
                $kunyah = 2;
                $hasilK = ($kunyah === 2) ? 'Benar' : 'Salah';
                $interdental = rand(1, 3);
                $hasilI = ($interdental === 3) ? 'Benar' : 'Salah';
                $gerakan = rand(1, 3);
                $hasilG = ($gerakan === 3) ? 'Benar' : 'Salah';
                $jumlahBenar = ($hasilLb === 'Benar' ? 1 : 0) + ($hasilLp === 'Benar' ? 1 : 0) + ($hasilK === 'Benar' ? 1 : 0) + ($hasilI === 'Benar' ? 1 : 0) + ($hasilG === 'Benar' ? 1 : 0);
                $kesimpulan = ($jumlahBenar >= 3) ? 'Terampil' : 'Kurang Terampil';

                // Generate random array length for 'perilaku'
                $perilakuLength = rand(1, 13);
                $perilaku = implode(',', $this->generateRandomArray(16, 28, $perilakuLength)); // Generate array with random length and random numbers between 1 and 13
                $jumlahPilihan = 13;
                $jumlahYangTerpilih = count(explode(',', $perilaku));
                $nilaiPeri = number_format(($jumlahYangTerpilih / $jumlahPilihan)*100, 2); // Format nilaiPeri
                $berperilaku = ($nilaiPeri > 50) ? 'Positif' : 'Negatif';
    
                // Generate random array length for 'peran_ortu'
                $peranOrtuLength = rand(1, 3);
                $peranOrtu = implode(',', $this->generateRandomArray(1, 3, $peranOrtuLength)); // Generate array with random length and random numbers between 1 and 3
    
                $randomCreatedAt = Carbon::create(rand(2022, 2023), rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59))->format('Y-m-d H:i:s');
                $randomUpdatedAt = Carbon::create(rand(2022, 2023), rand(1, 12), rand(1, 28), rand(0, 23), rand(0, 59), rand(0, 59))->format('Y-m-d H:i:s');
    
                DB::table('pengsiperis')->insert([
                    'user_id' => $userId,
                    'pembimbing' => $pembimbingId,
                    'kartupasien_id' => $kartuPasienId,
                    'pengetahuan' => $pengetahuan,
                    'jumlah_pertanyaan_peng' => $jumlahPertanyaanPeng,
                    'jawaban_benar_peng' => $jawabanBenarPeng,
                    'nilai_peng' => $nilaiPeng,
                    'kriteria' => $kriteria,
                    'labialbukal' => $labialbukal,
                    'hasil_lb' => $hasilLb,
                    'lingualpalatal' => $lingualpalatal,
                    'hasil_lp' => $hasilLp,
                    'kunyah' => $kunyah,
                    'hasil_k' => $hasilK,
                    'interdental' => $interdental,
                    'hasil_i' => $hasilI,
                    'gerakan' => $gerakan,
                    'hasil_g' => $hasilG,
                    'kesimpulan' => $kesimpulan,
                    'perilaku' => $perilaku,
                    'jumlah_pilihan' => $jumlahPilihan,
                    'jumlah_yang_terpilih' => $jumlahYangTerpilih,
                    'nilai_peri' => $nilaiPeri,
                    'berperilaku' => $berperilaku,
                    'peran_ortu' => $peranOrtu,
                    'created_at' => $randomCreatedAt,
                    'updated_at' => $randomUpdatedAt,
                ]);
            }
        }
    
        /**
         * Generate an array of random numbers within a specified range
         *
         * @param int $min Minimum value
         * @param int $max Maximum value
         * @param int $count Number of elements in the array
         * @return array Random array of numbers
         */
        private function generateRandomArray($min, $max, $count)
        {
            $numbers = range($min, $max);
            shuffle($numbers);
            return array_slice($numbers, 0, $count);
        }
}
