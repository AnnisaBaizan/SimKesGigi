<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelaksanaanSeeder extends Seeder
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

        $gigiOptions = ['11', '12', '13', '21', '22'];
        // $diagnosaOptions = ['Karies', 'Gingivitis', 'Fraktur gigi', 'Abses periodontal'];
        $intervensiOptions = ['Pembersihan karang gigi', 'Penambalan', 'Pencabutan', 'Perawatan saluran akar'];
        $hasilOptions = ['Sembuh total', 'Memerlukan evaluasi', 'Perawatan lanjutan diperlukan'];
        $rencanaOptions = ['Kontrol rutin', 'Perawatan lanjutan', 'Observasi lebih lanjut'];

        for ($i = 0; $i < 24; $i++) {
            $userId = $userIds[$i % 4];
            $pembimbing = $pembimbings[$userId];
            $kartupasienId = $kartupasienIds[$userId][array_rand($kartupasienIds[$userId])];

            $data = [
                'user_id' => $userId,
                'pembimbing' => $pembimbing,
                'kartupasien_id' => $kartupasienId,
                'gigi' => $gigiOptions[array_rand($gigiOptions)],
                // 'diagnosa' => $diagnosaOptions[array_rand($diagnosaOptions)],
                
                'diagnosa_id' => rand(0, 12),
                'intervensi' => $intervensiOptions[array_rand($intervensiOptions)],
                'hasil' => $hasilOptions[array_rand($hasilOptions)],
                'rencana' => $rencanaOptions[array_rand($rencanaOptions)],
                'acc' => rand(0, 1),
                'created_at' => Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()
            ];

            DB::table('pelaksanaans')->insert($data);
        }
    }
}
