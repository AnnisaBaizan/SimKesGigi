<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnamripasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ANAMNESA DAN RIWAYAT PASIEN
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 1,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'A',
            'nadi' => '78',
            'tknn_drh' => '117/77',
            'ktrgn_drh' => 'Normal',
            'suhu' => '36,5',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Tidak Ada',
            'created_at' =>'2023-10-05 07:16:48',
            'updated_at' => '2023-10-05 07:16:48',
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 2,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'B',
            'nadi' => '65',
            'tknn_drh' => '90/120',
            'ktrgn_drh' => 'Hypertensi',
            'suhu' => '37',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Ada',
            'nm_pnykt_ln' => 'Eksim',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'Udang',
            'created_at' =>'2022-11-25 07:00:00',
            'updated_at' => '2022-11-25 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 3,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'O',
            'nadi' => '85',
            'tknn_drh' => '100/65',
            'ktrgn_drh' => 'Hypotensi',
            'suhu' => '36,9',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Ada',
            'nm_obat' => 'aspirin, ibuprofen, dan naproxen',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'kacang',
            'created_at' =>'2021-03-06 07:00:00',
            'updated_at' => '2021-03-06 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 4,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'A',
            'nadi' => '78',
            'tknn_drh' => '117/77',
            'ktrgn_drh' => 'Normal',
            'suhu' => '36,5',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Tidak Ada',
            'created_at' =>'2023-02-10 07:16:48',
            'updated_at' => '2023-02-10 07:16:48',
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 5,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'B',
            'nadi' => '65',
            'tknn_drh' => '90/120',
            'ktrgn_drh' => 'Hypertensi',
            'suhu' => '37',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Ada',
            'nm_pnykt_ln' => 'Eksim',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'Udang',
            'created_at' =>'2022-12-20 07:00:00',
            'updated_at' => '2022-12-20 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 6,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'O',
            'nadi' => '85',
            'tknn_drh' => '100/65',
            'ktrgn_drh' => 'Hypotensi',
            'suhu' => '36,9',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Ada',
            'nm_obat' => 'aspirin, ibuprofen, dan naproxen',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'kacang',
            'created_at' =>'2021-01-12 07:00:00',
            'updated_at' => '2021-01-12 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 7,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'A',
            'nadi' => '78',
            'tknn_drh' => '117/77',
            'ktrgn_drh' => 'Normal',
            'suhu' => '36,5',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Tidak Ada',
            'created_at' =>'2023-06-13 07:16:48',
            'updated_at' => '2023-06-13 07:16:48',
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 8,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'AB',
            'nadi' => '65',
            'tknn_drh' => '90/120',
            'ktrgn_drh' => 'Hypertensi',
            'suhu' => '37',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Ada',
            'nm_pnykt_ln' => 'Eksim',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'Udang',
            'created_at' =>'2022-08-19 07:00:00',
            'updated_at' => '2022-08-19 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 9,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'O',
            'nadi' => '85',
            'tknn_drh' => '100/65',
            'ktrgn_drh' => 'Hypotensi',
            'suhu' => '36,9',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Ada',
            'nm_obat' => 'aspirin, ibuprofen, dan naproxen',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'kacang',
            'created_at' =>'2021-05-16 07:00:00',
            'updated_at' => '2021-05-16 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 10,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'A',
            'nadi' => '78',
            'tknn_drh' => '117/77',
            'ktrgn_drh' => 'Normal',
            'suhu' => '36,5',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Tidak Ada',
            'created_at' =>'2023-07-08 07:16:48',
            'updated_at' => '2023-07-08 07:16:48',
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 11,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'AB',
            'nadi' => '65',
            'tknn_drh' => '90/120',
            'ktrgn_drh' => 'Hypertensi',
            'suhu' => '37',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Tidak Ada',
            'pnykt_ln' => 'Ada',
            'nm_pnykt_ln' => 'Eksim',
            'alergi_obat' => 'Tidak Ada',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'Udang',
            'created_at' =>'2022-09-11 07:00:00',
            'updated_at' => '2022-09-11 07:00:00'
        ]);
        DB::table('anamripasiens')->insert([
            'kartupasien_id' => 12,
            'klhn_utama' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque nostrum neque veritatis, praesentium porro eligendi! Cumque provident sed deleniti veritatis.',
            'klhn_tmbhn' => 'Odio at vero error sapiente. Est qui veniam iusto eum.',
            'goldar' => 'O',
            'nadi' => '85',
            'tknn_drh' => '100/65',
            'ktrgn_drh' => 'Hypotensi',
            'suhu' => '36,9',
            'pernafasan' => 'Normal',
            'jantung' => 'Tidak Ada',
            'diabetes' => 'Tidak Ada',
            'haemophilia' => 'Tidak Ada',
            'hepatitis' => 'Tidak Ada',
            'lambung' => 'Ada',
            'pnykt_ln' => 'Tidak Ada',
            'alergi_obat' => 'Ada',
            'nm_obat' => 'aspirin, ibuprofen, dan naproxen',
            'alergi_mkn' => 'Ada',
            'nm_mkn' => 'kacang',
            'created_at' =>'2021-04-26 07:00:00',
            'updated_at' => '2021-04-26 07:00:00'
        ]);
        
    }
}
