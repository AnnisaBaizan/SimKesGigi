<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder untuk kode 1
        for ($i = 1; $i <= 15; $i++) {
            DB::table('pertanyaans')->insert([
                'kode' => 1,
                'soal' => $this->getSoalKode1($i),
                'created_at' => $this->getRandomDate(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk kode 2
        for ($i = 1; $i <= 13; $i++) {
            DB::table('pertanyaans')->insert([
                'kode' => 2,
                'soal' => $this->getSoalKode2($i),
                'created_at' => $this->getRandomDate(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomDate()
    {
        return Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s');
    }

    /**
     * Mendapatkan pertanyaan untuk kode 1
     *
     * @param int $index
     * @return string
     */
    private function getSoalKode1($index)
    {
        $soal = [
            "Guna gigi adalah…",
            "Gigi harus dijaga bersih agar….",
            "Bila gigi tidak dijaga dan dirawat akan mengakibatkan……",
            "Cara merawat gigi dan mulut agar sehat adalah",
            "Menyikat gigi sebaiknya dilakukan berapa kali dalam sehari",
            "Kapan waktu menyikat gigi yang tepat",
            "Menyikat gigi sebaiknya menggunakan pasta gigi yang mengandung ……",
            "Satu buah sikat gigi dipakai sendiri atau boleh bersama-sama?",
            "Apa akibat dari bulu sikat gigi yang kasar dan keras bila digunakan menggosok gigi?",
            "Makanan yang menyehatkan dan membersihkan gigi adalah",
            "Makanan yang merusak gigi adalah",
            "Minuman yang merusak gigi adalah",
            "Penyebab gigi berlubang/ karies adalah",
            "Bila gigi berlubang/karies dibiarkan lama kelamaan akan mengakibatkan",
            "Adakah ada pengganti gigi tetap (gigi dewasa) bila tanggal/lepas",
        ];

        return $soal[$index - 1];
    }

    /**
     * Mendapatkan pertanyaan untuk kode 2
     *
     * @param int $index
     * @return string
     */
    private function getSoalKode2($index)
    {
        $soal = [
            "Tidak menggosok gigi setelah makan pagi/sarapan",
            "Tidak menggosok gigi sebelum tidur",
            "1 sikat gigi digunakan bersama",
            "Tidak Makan sayur/ buah",
            "Makan coklat/ bergula",
            "Sesudah makan manis dan lengket tidak kumur-kumur",
            "Sering minum bersoda",
            "Setiap hari minum teh/ kopi",
            "Setiap hari merokok/ mengunyah sirih /tembakau",
            "Sering menggigit benda keras",
            "Sering menghisap ibu jari",
            "Sering menggertakkan gigi",
            "Selalu/ sering mengunyah satu sisi",
        ];

        return $soal[$index - 1];
    }
}
