<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdontogramSeeder extends Seeder
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

            // Generate random values for each kode column
            $kodeColumns = [
                '11', '21', '12', '22', '13', '23', '14', '24', '15', '25', '16', '26', '17', '27', '18', '28',
                '41', '31', '42', '32', '43', '33', '44', '34', '45', '35', '46', '36', '47', '37', '48', '38',
                '51', '61', '52', '62', '53', '63', '54', '64', '55', '65', '81', '71', '82', '72', '83', '73',
                '84', '74', '85', '75'
            ];

            $kodeValues = [];
            foreach ($kodeColumns as $kodeColumn) {
                $kodeValues['kode_' . $kodeColumn] = rand(0, 10) === 0 ? null : rand(0, 9); // Random integer between 0 and 9
            }

            // Generate random Huruf A-G for kode_ columns
            $alphabets = [NULL, 'A', 'B', 'C', 'D', 'E', 'F', 'G'];

            $specifiedColumns = ['51', '61', '52', '62', '53', '63', '54', '64', '55', '65', '81', '71', '82', '72', '83', '73', '84', '74', '85', '75'];
            foreach ($specifiedColumns as $kodeColumn) {
                $kodeValues['kode_' . $kodeColumn] = $alphabets[rand(0, count($alphabets) - 1)];
            }

            // Calculate jumlah_tetap_d, jumlah_tetap_m, jumlah_tetap_f, dmf_t, jumlah_susu_d, jumlah_susu_e, jumlah_susu_f, def_t
            $kodeSelectedValues = array_values($kodeValues);
            $jumlah_tetap_d = array_reduce($kodeSelectedValues, function ($carry, $item) {
                return $carry + (($item === 1 || $item === 2) ? 1 : 0);
            });
            $jumlah_tetap_m = array_reduce($kodeSelectedValues, function ($carry, $item) {
                return $carry + ($item === 4 ? 1 : 0);
            });
            $jumlah_tetap_f = array_reduce($kodeSelectedValues, function ($carry, $item) {
                return $carry + ($item === 3 ? 1 : 0);
            });
            $dmf_t = $jumlah_tetap_d + $jumlah_tetap_m + $jumlah_tetap_f;
            $jumlah_susu_d = array_reduce($kodeSelectedValues, function ($carry, $item) {
                return $carry + ($item === 'B' || $item === 'C' ? 1 : 0);
            });
            $jumlah_susu_e = array_reduce($kodeSelectedValues, function ($carry, $item) {
                return $carry + ($item === 'E' ? 1 : 0);
            });
            $jumlah_susu_f = array_reduce($kodeSelectedValues, function ($carry, $item) {
                return $carry + ($item === 'D' ? 1 : 0);
            });
            $def_t = $jumlah_susu_d + $jumlah_susu_e + $jumlah_susu_f;

            // Menghapus "kode_" dari setiap kunci array sebelum implode
            $gigi_karies = implode(',', array_map(function ($key) {
                return substr($key, 5); // Menghapus "kode_" dari setiap kunci array
            }, array_keys(array_filter($kodeValues, function ($item) {
                return $item === '1' || $item === '2' || $item === 'B' || $item === 'C';
            }))));

            // Generate timestamps
            $createdAt = Carbon::createFromDate(rand(2022, 2024), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s');
            $updatedAt = Carbon::now();

            DB::table('odontograms')->insert([
                'user_id' => $userId,
                'pembimbing' => $pembimbingId,
                'kartupasien_id' => $kartuPasienId,
                'kode_11' => $kodeValues['kode_11'],
                'kode_21' => $kodeValues['kode_21'],
                'kode_12' => $kodeValues['kode_12'],
                'kode_22' => $kodeValues['kode_22'],
                'kode_13' => $kodeValues['kode_13'],
                'kode_23' => $kodeValues['kode_23'],
                'kode_14' => $kodeValues['kode_14'],
                'kode_24' => $kodeValues['kode_24'],
                'kode_15' => $kodeValues['kode_15'],
                'kode_25' => $kodeValues['kode_25'],
                'kode_16' => $kodeValues['kode_16'],
                'kode_26' => $kodeValues['kode_26'],
                'kode_17' => $kodeValues['kode_17'],
                'kode_27' => $kodeValues['kode_27'],
                'kode_18' => $kodeValues['kode_18'],
                'kode_28' => $kodeValues['kode_28'],
                'kode_41' => $kodeValues['kode_41'],
                'kode_31' => $kodeValues['kode_31'],
                'kode_42' => $kodeValues['kode_42'],
                'kode_32' => $kodeValues['kode_32'],
                'kode_43' => $kodeValues['kode_43'],
                'kode_33' => $kodeValues['kode_33'],
                'kode_44' => $kodeValues['kode_44'],
                'kode_34' => $kodeValues['kode_34'],
                'kode_45' => $kodeValues['kode_45'],
                'kode_35' => $kodeValues['kode_35'],
                'kode_46' => $kodeValues['kode_46'],
                'kode_36' => $kodeValues['kode_36'],
                'kode_47' => $kodeValues['kode_47'],
                'kode_37' => $kodeValues['kode_37'],
                'kode_48' => $kodeValues['kode_48'],
                'kode_38' => $kodeValues['kode_38'],
                'kode_51' => $kodeValues['kode_51'],
                'kode_61' => $kodeValues['kode_61'],
                'kode_52' => $kodeValues['kode_52'],
                'kode_62' => $kodeValues['kode_62'],
                'kode_53' => $kodeValues['kode_53'],
                'kode_63' => $kodeValues['kode_63'],
                'kode_54' => $kodeValues['kode_54'],
                'kode_64' => $kodeValues['kode_64'],
                'kode_55' => $kodeValues['kode_55'],
                'kode_65' => $kodeValues['kode_65'],
                'kode_81' => $kodeValues['kode_81'],
                'kode_71' => $kodeValues['kode_71'],
                'kode_82' => $kodeValues['kode_82'],
                'kode_72' => $kodeValues['kode_72'],
                'kode_83' => $kodeValues['kode_83'],
                'kode_73' => $kodeValues['kode_73'],
                'kode_84' => $kodeValues['kode_84'],
                'kode_74' => $kodeValues['kode_74'],
                'kode_85' => $kodeValues['kode_85'],
                'kode_75' => $kodeValues['kode_75'],
                'jumlah_tetap_d' => $jumlah_tetap_d,
                'jumlah_tetap_m' => $jumlah_tetap_m,
                'jumlah_tetap_f' => $jumlah_tetap_f,
                'dmf_t' => $dmf_t,
                'jumlah_susu_d' => $jumlah_susu_d,
                'jumlah_susu_e' => $jumlah_susu_e,
                'jumlah_susu_f' => $jumlah_susu_f,
                'def_t' => $def_t,
                'gigi_karies' => $gigi_karies,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
