<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnomalimukosaSeeder extends Seeder
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

        $occlusi = ['Normal bite', 'Cross bite', 'Deep bite'];
        $attributes = ['bentuk', 'warna', 'posisi', 'ukuran', 'struktur'];

        for ($i = 0; $i < 24; $i++) {
            $userId = $userIds[$i % 4];
            $pembimbing = $pembimbings[$userId];
            $kartupasienId = $kartupasienIds[$userId][array_rand($kartupasienIds[$userId])];

            $data = [
                'user_id' => $userId,
                'pembimbing' => $pembimbing,
                'kartupasien_id' => $kartupasienId,
                'occlusi' => $occlusi[array_rand($occlusi)]
            ];

            foreach ($attributes as $attribute) {
                $data[$attribute] = rand(0, 1) ? 'Normal' : 'Abnormal';
            }

            $oralParts = ['lidah', 'pipi', 'palatum', 'gingiva', 'bibir'];
            foreach ($oralParts as $oralPart) {
                $data["w_$oralPart"] = rand(0, 1) ? 'Ada' : 'Tidak Ada';
                $data["i_$oralPart"] = rand(0, 1) ? 'Ada' : 'Tidak Ada';
                $data["u_$oralPart"] = rand(0, 1) ? 'Ada' : 'Tidak Ada';
                if ($data["w_$oralPart"] === 'Ada') {
                    $data["dw_$oralPart"] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 20);
                }
                if ($data["i_$oralPart"] === 'Ada') {
                    $data["di_$oralPart"] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 20);
                }
                if ($data["u_$oralPart"] === 'Ada') {
                    $data["du_$oralPart"] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 20);
                }
            }

            $data['created_at'] = Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s');
            $data['updated_at'] = Carbon::now();

            DB::table('anomalimukosas')->insert($data);
        }
    }
}
