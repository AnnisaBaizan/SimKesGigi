<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejalaskepgilut = [
            1 => [
                "Bukti adanya rujukan segera atau konsultasi dengan seorang dokter mengenai penyakit yang tidak terkontrol (misalnya, tanda-tanda masalah jantung, tanda-tanda diabetes yang tidak terkontrol, atau tanda-tanda vital yang tidak normal) pada riwayat kesehatannya",
                "Bukti adanya kebutuhan untuk premedikasi antibiotik",
                "Bukti bahwa klien berisiko terjadinya cedera pada mulut (misalnya, memainkan olahraga kontak atau atletik tanpa pelindung mulut atau memiliki gangguan penglihatan, tremor, atau terbatasnya ketangkasan)",
                "Bukti bahwa klien berisiko untuk penyakit gigi dan mulut atau penyakit sistemik",
                "Bukti bahwa klien berada dalam situasi yang mengancam hidupnya"
            ],
            2 => [
                "Klien merasa ketakutan",
                "Kekhawatiran klien tentang kerahasiaan, biaya perawatan, penularan penyakit, keracunan fluoride, keracunan merkuri, paparan radiasi, atau pada asuhan kesehatan gigi dan mulut yang direncanakan."
            ],
            3 => [
                "Klien melaporkan ketidakpuasan dengan penampilan giginya",
                "Klien melaporkan ketidakpuasan dengan penampilan gusi/jaringan periodontalnya",
                "Klien melaporkan ketidakpuasan dengan penampilan profil wajahnya",
                "Klien melaporkan ketidakpuasan dengan penampilan prostesis giginya",
                "Klien melaporkan ketidakpuasan dengan aroma napasnya"
            ],
            4 => [
                "Gigi dengan tanda-tanda penyakit",
                "Gigi yang hilang",
                "Rusaknya restorasi",
                "Gigi dengan abrasi atau erosi",
                "Gigi dengan tanda-tanda trauma",
                "Peralatan prostetik yang tidak pas",
                "Kesulitan mengunyah"
            ],
            5 => [
                "Adanya lesi ekstraoral atau intraoral, nyeri jika ditekan, atau ada pembengkakan; peradangan gingiva",
                "Perdarahan saat probing; poket dalam atau kehilangan attachment 4 mm; masalah mucogingival",
                "Terdapat xerostomia",
                "Manifestasi oral dari defisiensi nutrisi"
            ],
            6 => [
                "Rasa sakit atau sensitivitas ekstraoral atau intraoral sebelum perawatan asuhan kesehatan gigi",
                "Lunak pada palpasi ketika pemeriksaan ekstraoral atau intraoral",
                "Ketidaknyamanan selama perawatan asuhan kesehatan gigi"
            ],
            7 => [
                "Klien memiliki pertanyaan, kesalahpahaman, atau kurangnya pengetahuan tentang penyakit gigi dan mulut.",
                "Klien tidak memahami alasan untuk memelihara kesehatan gigi dan mulutnya sendiri (misalnya, alasan yang berkaitan dengan adanya oral biofilm dan respon inang atau pentingnya menghilangkan oral biofilm setiap hari).",
                "Klien tidak memahami hubungan antara beberapa penyakit sistemik dan penyakit gigi dan mulut.",
                "Klien salah menafsirkan informasi."
            ],
            8 => [
                "Kontrol plak yang tidak memadai",
                "Kurang pengawasan orang tua (wali) terhadap pemeliharaan kebersihan gigi dan mulut anak sehari-hari",
                "Kurangnya pemantauan status kesehatan diri",
                "Tidak melakukan pemeriksaan gigi dalam 2 tahun terakhir"
            ]
        ];
        foreach ($gejalaskepgilut as $askepgilut => $gejalas) {
            foreach ($gejalas as $gejala) {
                DB::table('gejalas')->insert([
                    'askepgilut_id' => $askepgilut,
                    'gejala' => $gejala,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
