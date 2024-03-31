<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyebabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penyebabskepgilut = [
            1 => [
                "Partisipasi dalam olahraga/kegiatan/pekerjaan yang beresiko menimbulkan cedera/gangguan kesehatan",
                "Penggunaan produk kesehatan gigi dan mulut yang tidak tepat",
                "Kurangnya pendidikan atau pengetahuan",
                "Parestesia, anestesia",
                "Kebiasaan buruk",
                "Potensi terjadinya infeksi",
                "Potensi terjadinya cedera mulut",
                "Kekhawatiran pada pengalaman negatif tentang pengendalian infeksi, keamanan radiasi, keamanan fluoride dan sejenisnya.",
                "Perilaku atau gaya hidup yang berisiko terhadap kesehatan"
            ],
            2 => [
                "Pengalaman negatif perawatan sebelumnya",
                "Takut akan hal yang tidak/belum diketahuinya",
                "Kekurangan biaya/sumber keuangan",
                "Takut akan mahalnya biaya perawatan"
            ],
            3 => [
                "Menggunakan atau membutuhkan prostesis gigi dan mulut",
                "Penyakit atau gangguan gigi dan mulut yang terlihat",
                "Bau mulut (halitosis)",
                "Maloklusi",
                "Pengguna atau orang yang membutuhkan peralatan ortodontik"
            ],
            4 => [
                "Infeksi Streptococcus mutans",
                "Nutrisi dan diet yang kurang ",
                "Faktor-faktor risiko yang dapat berubah dan tidak dapat diubah",
                "Kurangnya pendidikan kesehatan gigi dan mulut",
                "Kurang memeliharaan kesehatan gigi dan mulut",
                "Kurang melakukan perawatan/pemeriksaan gigi reguler"
            ],
            5 => [
                "Infeksi mikroba dan respon inang",
                "Perilaku pemeliharaan kesehatan gigi dan mulut yang tidak memadai",
                "Nutrisi yang tidak memadai",
                "Faktor-faktor risiko yang dapat berubah dan tidak dapat diubah",
                "Penggunaan tembakau",
                "Penyakit sistemik yang tidak terkontrol (mis., Diabetes, infeksi human immunodeficiency virus [HIV])",
                "Kurang melakukan pemeriksaan/perawatan gigi reguler"
            ],
            6 => [
                "Ketidaknyamanan sendi temporomandibular (TMJ)",
                "Bedah mulut, prosedur tindakan medis gigi, prosedur asuhan kesehatan gigi dan mulut",
                "Penyakit gigi yang tidak diobati",
                "Akses yang tidak memadai ke fasilitas perawatan atau kurang rutinnya perawatan gigi"
            ],
            7 => [
                "Defisit pengetahuan",
                "Kurangnya pemaparan informasi"
            ],
            8 => [
                "Ketidakpatuhan atau ketidaktaatan",
                "Menggunakan alat bantu atau produk perawatan gigi dan mulut yang tidak tepat",
                "Perlu pengawasan orang tua terhadap kebersihan gigi dan mulutnya",
                "Kurang mampu memelihara kesehatan gigi dan mulutnya sendiri",
                "Tidak dapat memelihara kesehatan gigi dan mulutnya sendiri",
                "Kurangnya keterampilan",
                "Gangguan fisik dan kemampuan kognitif",
                "Perilaku pemeliharaan kesehatan mulut yang tidak memadai",
                "Kekurangan sumber keuangan"
            ]
        ];

        foreach ($penyebabskepgilut as $askepgilut => $penyebabs) {
            foreach ($penyebabs as $penyebab) {
                DB::table('penyebabs')->insert([
                    'askepgilut_id' => $askepgilut,
                    'penyebab' => $penyebab,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
