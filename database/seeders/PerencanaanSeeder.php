<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerencanaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = [3, 6, 9, 12];
        $pembimbings = [
            3 => '1234567890122341',
            6 => '0926374816237653',
            9 => '1234567890127634',
            12 => '0926374816232387'
        ];
        $kartupasienIds = [
            3 => [1, 2, 3],
            6 => [4, 5, 6],
            9 => [7, 8, 9],
            12 => [10, 11, 12]
        ];

        $gigiOptions = ['Gigi 11', 'Gigi 12', 'Gigi 13', 'Gigi 21', 'Gigi 22'];
        $rasionalOptions = ['Menghindari kerusakan', 'Menjaga kebersihan', 'Memperbaiki estetika'];
        $kompetensiOptions = ['Klinis', 'Radiologi', 'Pencabutan', 'Prostodonti'];
        $tujuanOptions = ['Penyembuhan cepat', 'Perawatan maksimal', 'Pencegahan masalah lanjutan'];
        $indikatorOptions = ['Hasil optimal', 'Evaluasi berkala', 'Kesembuhan pasien'];
        $evaluasiOptions = ['Pengamatan langsung', 'Foto radiologi', 'Rekaman klinis'];

        for ($i = 0; $i < 24; $i++) {
            $userId = $userIds[$i % 4];
            $pembimbing = $pembimbings[$userId];
            $kartupasienId = $kartupasienIds[$userId][array_rand($kartupasienIds[$userId])];

            $data = [
                'user_id' => $userId,
                'pembimbing' => $pembimbing,
                'kartupasien_id' => $kartupasienId,
                'gigi' => $gigiOptions[array_rand($gigiOptions)],
                'rasional' => $rasionalOptions[array_rand($rasionalOptions)],
                'kompetensi' => $kompetensiOptions[array_rand($kompetensiOptions)],
                'tujuan' => $tujuanOptions[array_rand($tujuanOptions)],
                'indikator' => $indikatorOptions[array_rand($indikatorOptions)],
                'cara_evaluasi' => $evaluasiOptions[array_rand($evaluasiOptions)],
                'acc' => rand(0, 1),
                'created_at' => Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()
            ];

            DB::table('perencanaans')->insert($data);
        }
    }
}
