<?php

use App\Models\Askepgilut;
use App\Models\Diagnosa;
use App\Models\Eksplakkal;
use App\Models\Gejala;
use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\Pelaksanaan;
use App\Models\Penyebab;
use App\Models\Periodontal;
use App\Models\Vitalitas;
use Illuminate\Support\Facades\DB;

function get_v($tabel, $name, $id, $col)
{
    $data = DB::table($tabel)->where($name, $id)->get($col);
    return $data;
}

function get_c($tabel, $name, $id)
{
    $data = DB::table($tabel)->where($name, $id)->get();
    return $data;
}

if (!function_exists('getPatients')) {
    function getPatients($user_id, $pembimbing)
    {
        $patients = kartupasien::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->get();

        $options = '<option value="" selected disabled>Pilih Pasien</option>';
        foreach ($patients as $patient) {
            $options .= '<option value="' . $patient->id . '">' . $patient->no_kartu . ' | ' . $patient->nama . '</option>';
        }

        return $options;
    }
}

if (!function_exists('getGigis')) {
    function getGigis($user_id, $pembimbing, $kartupasien_id)
    {
        $gigis = Diagnosa::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->get();

        $GigiHTML = '<option value="" selected disabled>Pilih Gigi</option>';

        $addedGigi = []; // untuk menghindari duplikasi gigi

        foreach ($gigis as $gg) {
            $gigiArray = explode(",", $gg->gigi);
            foreach ($gigiArray as $gigi) {
                // Periksa apakah gigi sudah ditambahkan sebelumnya
                if (in_array($gigi, $addedGigi)) {
                    continue; // Lewati jika sudah ada
                }

                // Periksa apakah gigi tidak ada dalam tabel Pelaksanaan
                $exists = Pelaksanaan::where('gigi', $gigi)
                    ->where('user_id', $user_id)
                    ->where('pembimbing', $pembimbing)
                    ->where('kartupasien_id', $kartupasien_id)
                    ->exists();

                if (!$exists) {
                    // Jika gigi tidak ada dalam tabel Pelaksanaan, tambahkan sebagai opsi dalam HTML
                    $GigiHTML .= '<option value="' . htmlspecialchars($gigi) . '">' . htmlspecialchars($gigi) . '</option>';
                    $addedGigi[] = $gigi; // Tambahkan ke daftar gigi yang sudah ditambahkan
                }
            }
        }

        return $GigiHTML;
    }
}

//Menu Vitalitas

if (!function_exists('getOdontogram')) {
    function getOdontogram($user_id, $pembimbing, $kartupasien_id)
    {
        $odontograms = Odontogram::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->get();

        $odontogramHTML = '<option value="" selected disabled>Pilih Odontogram</option>';
        foreach ($odontograms as $odontogram) {
            $odontogramHTML .= '<option value="' . htmlspecialchars($odontogram->id) . '">' . htmlspecialchars($odontogram->created_at) . '</option>';
        }
        return $odontogramHTML;
    }
}


if (!function_exists('getElemenGigis')) {
    function getElemenGigis($user_id, $pembimbing, $kartupasien_id, $odontogram_id)
    {
        $elemengigis = Odontogram::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->where('id', $odontogram_id)
            ->latest() // Mengurutkan berdasarkan 'created_at' secara otomatis
            ->first();

        $elemenGigiHTML = '<option value="" selected disabled>Pilih Elemen Gigi</option>';
        if ($elemengigis && !empty($elemengigis->gigi_karies)) {
            // foreach ($elemengigis as $elemengigi) {
            $gigiArray = explode(",", $elemengigis->gigi_karies);
            foreach ($gigiArray as $gigi) {

                // Periksa apakah elemen gigi tidak ada dalam tabel Vitalitas
                $vitalitas = Vitalitas::where('elemen_gigi', $gigi)
                    ->where('user_id', $user_id)
                    ->where('pembimbing', $pembimbing)
                    ->where('kartupasien_id', $kartupasien_id)
                    ->where('odontogram_id', $odontogram_id)
                    ->first();
                if (!$vitalitas) {
                    // Jika elemen gigi tidak ada dalam tabel Vitalitas, tambahkan sebagai opsi dalam elemen HTML
                    $elemenGigiHTML .= '<option value="' . $gigi . '">' . $gigi . '</option>';
                }
            }
            // }
        }

        return $elemenGigiHTML;
    }
}

//end Menu Vitalitas


//---------------------------------------------------------


//Menu Periodontal

if (!function_exists('getEksplakkal')) {
    function getEksplakkal($user_id, $pembimbing, $kartupasien_id)
    {
        $eksplakkals = eksplakkal::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->get();

        $eksplakkalHTML = '<option value="" selected disabled>Pilih eksplakkal</option>';
        foreach ($eksplakkals as $eksplakkal) {
            $eksplakkalHTML .= '<option value="' . htmlspecialchars($eksplakkal->id) . '">' . htmlspecialchars($eksplakkal->created_at) . '</option>';
        }
        return $eksplakkalHTML;
    }
}

if (!function_exists('getElemenPermukaanGigis')) {
    function getElemenPermukaanGigis($user_id, $pembimbing, $kartupasien_id, $eksplakkal_id)
    {
        // Ambil record paling baru dari tabel 'Eksplakkal'
        $latestRecord = Eksplakkal::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->where('id', $eksplakkal_id)
            ->latest() // Mengurutkan berdasarkan 'created_at' secara otomatis
            ->first(); // Ambil record paling baru

        // Inisialisasi opsi HTML
        $elemenPermukaanGigiHTML = '<option value="" selected disabled>Pilih Elemen Permukaan Gigi</option>';

        // Periksa jika record ditemukan dan nilai 'subgingiva' atau 'supragingiva' tidak kosong
        if ($latestRecord && (!empty($latestRecord->subgingiva) || !empty($latestRecord->supragingiva))) {
            // Gabungkan nilai subgingiva dan supragingiva menjadi satu array
            $gigiArray = array_merge(
                explode(",", $latestRecord->subgingiva),
                explode(",", $latestRecord->supragingiva)
            );

            foreach ($gigiArray as $permukaan_gigi) {
                // Set nilai $kalkulus berdasarkan pilihan pengguna
                $kalkulus = in_array($permukaan_gigi, explode(",", $latestRecord->subgingiva)) ? "Subgingiva" : "Supragingiva";

                // Periksa apakah elemen gigi tidak ada dalam tabel periodontal
                $periodontal = Periodontal::where('elemen_permukaan_gigi', $permukaan_gigi)
                    ->where('user_id', $user_id)
                    ->where('pembimbing', $pembimbing)
                    ->where('kartupasien_id', $kartupasien_id)
                    ->where('eksplakkal_id', $eksplakkal_id)
                    ->first();

                if (!$periodontal) {
                    // Tambahkan opsi dengan atribut data-kalkulus
                    $elemenPermukaanGigiHTML .= '<option value="' . htmlspecialchars($permukaan_gigi) . '" data-kalkulus="' . htmlspecialchars($kalkulus) . '">' . htmlspecialchars($permukaan_gigi) . '</option>';
                }
            }
        }

        return $elemenPermukaanGigiHTML;
    }
}

//end Menu Periodontal


//------------------------------------------------------------------------------------------


//Menu Pelaksanaan

if (!function_exists('getPreviewDiagnosas')) {
    function getPreviewDiagnosas($user_id, $pembimbing, $kartupasien_id, $gigi)
    {
        $diagnosas = Diagnosa::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->where('gigi', $gigi)
            ->get();

        $PreviewdiagnosaHTML = '';

        // Loop setiap diagnosa
        foreach ($diagnosas as $diagnosa) {
            // Split masalah, penyebab, dan gejala
            $penyebab = explode('|', $diagnosa->penyebab);
            $gejala = explode('|', $diagnosa->gejala);
            $askepIds = explode('|', $diagnosa->askepgilut);

            $PreviewdiagnosaHTML .= '<br><center><b>Preview Diagnosa</b></center></br>';
            $PreviewdiagnosaHTML .= '<b>Masalah:</b> ' . htmlspecialchars($diagnosa->masalah ?? 'Tidak Ditemukan') . '<br>';
            $PreviewdiagnosaHTML .= '<hr>';

            foreach ($askepIds as $index => $id_askep) {
                // Tampilkan data Askepgilut
                $askepgilut = Askepgilut::find($id_askep);
                if ($askepgilut) {
                    $PreviewdiagnosaHTML .= '<b>Askepgilut:</b> ' . htmlspecialchars($askepgilut->askepgilut) . '<br>';
                }

                // Tampilkan penyebab untuk askepgilut terkait
                $penyebabs = get_c('penyebabs', 'askepgilut_id', $id_askep)->toArray();
                $penyebabList = array_filter($penyebabs, function ($penyebabI) use ($penyebab, $index) {
                    return in_array($penyebabI->id, explode(',', $penyebab[$index] ?? ''));
                });
                $PreviewdiagnosaHTML .= '<b>Penyebab:</b> ' . implode(', ', array_map(fn($item) => htmlspecialchars($item->penyebab), $penyebabList)) . '<br>';

                // Tampilkan gejala untuk askepgilut terkait
                $gejalas = get_c('gejalas', 'askepgilut_id', $id_askep)->toArray();
                $gejalaList = array_filter($gejalas, function ($gejalaI) use ($gejala, $index) {
                    return in_array($gejalaI->id, explode(',', $gejala[$index] ?? ''));
                });
                $PreviewdiagnosaHTML .= '<b>Gejala:</b> ' . implode(', ', array_map(fn($item) => htmlspecialchars($item->gejala), $gejalaList)) . '<br>';

                $PreviewdiagnosaHTML .= '<hr>';
            }
        }

        return $PreviewdiagnosaHTML ?: '<p>Tidak ada diagnosa ditemukan</p>';
    }
}


if (!function_exists('getDiagnosa')) {
    function getDiagnosa($user_id, $pembimbing, $kartupasien_id, $gigi)
    {
        $diagnosa = Diagnosa::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
            ->where('gigi', $gigi)
            ->first();

        // Cek apakah $diagnosa ditemukan atau tidak
        if ($diagnosa) {
            $diagnosaHTML = $diagnosa->id;
        } else {
            $diagnosaHTML = 'Tidak ada diagnosa ditemukan';
        }

        return $diagnosaHTML;
    }
}

//end Menu Pelaksanaan



//--------------------------------------------------




//Menu Diagnosis


if (!function_exists('getPenyebabs')) {
    function getPenyebabs($askepgilut)
    {
        $penyebabs = Penyebab::where('askepgilut_id', $askepgilut)->get();

        $penyebabOptions = '<option value="" disabled>Pilih Penyebab</option>';
        foreach ($penyebabs as $penyebab) {
            $penyebabOptions .= '<option value="' . $penyebab->id . '">' . $penyebab->penyebab . '</option>';
        }

        return $penyebabOptions;
    }
}

if (!function_exists('getGejalas')) {
    function getGejalas($askepgilut)
    {
        $gejalas = Gejala::where('askepgilut_id', $askepgilut)->get();

        $gejalaOptions = '<option value="" disabled>Pilih gejala</option>';
        foreach ($gejalas as $gejala) {
            $gejalaOptions .= '<option value="' . $gejala->id . '">' . $gejala->gejala . '</option>';
        }

        return $gejalaOptions;
    }
}


//End Menu Diagnosis