<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AskepgilutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'askepgilut' => 'Perlindungan dari Risiko Kesehatan',
                'deskripsi' => 'Kebutuhan untuk terhindar dari kontraindikasi medis pelayanan kesehatan gigi; termasuk kebutuhan untuk dilindungi dari risiko kesehatan yang terkait dengan asuhan kesehatan gigi dan mulut.'
            ],
            [
                'askepgilut' => 'Kebebasan dari Ketakutan dan Stres',
                'deskripsi' => 'Kebutuhan untuk merasa aman dan bebas dari rasa takut dan ketidaknyamanan emosional di lingkungan perawatan kesehatan gigi dan mulut.'
            ],
            [
                'askepgilut' => 'Kesan Wajah Yang Sehat',
                'deskripsi' => 'Kebutuhan untuk merasa puas dengan penampilan mulut-wajah dan nafas sendiri.'
            ],
            [
                'askepgilut' => 'Kondisi Biologis dan Fungsi Gigi yang Baik',
                'deskripsi' => 'Kebutuhan untuk memiliki gigi-geligi yang utuh dan dan tahan terhadap mikroba berbahaya atau restorasi yang kuat, berfungsi dengan baik, dan mencerminkan nutrisi dan pola makan yang tepat.'
            ],
            [
                'askepgilut' => 'Keutuhan/Integritas Kulit dan Membran Mukosa pada Kepala dan Leher',
                'deskripsi' => 'Kebutuhan untuk memiliki pelindung yang utuh dan berfungsi dengan baik dari kepala dan leher seseorang, termasuk selaput lendir pada rongga mulut dan periodontium yang tahan melawan mikroba berbahaya, menolak zat yang merugikan dan trauma, dan mencerminkan kecukupan nutrisi.'
            ],
            [
                'askepgilut' => 'Bebas dari Nyeri pada Kepala dan Leher',
                'deskripsi' => 'Kebutuhan bebas dari ketidaknyamanan fisik di daerah kepala dan leher.'
            ],
            [
                'askepgilut' => 'Konseptualisasi dan Pemecahan Masalah',
                'deskripsi' => 'Kebutuhan untuk memahami ide dan abstraksi untuk membuat keputusan yang baik tentang kesehatan gigi dan mulut seseorang.'
            ],
            [
                'askepgilut' => 'Tanggung jawab untuk Kesehatan Mulut',
                'deskripsi' => 'Tanggung jawab untuk kesehatan mulut seseorang sebagai hasil dari interaksi antara motivasi seseorang, kemampuan fisik, dan lingkungan.'
            ],
        ];

        foreach ($data as $item) {
            DB::table('askepgiluts')->insert([
                'askepgilut' => $item['askepgilut'],
                'deskripsi' => $item['deskripsi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
