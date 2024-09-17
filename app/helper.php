<?php

use App\Models\Eksplakkal;
use App\Models\Gejala;
use App\Models\kartupasien;
use App\Models\Odontogram;
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


if (!function_exists('getElemenGigis')) {
    function getElemenGigis($user_id, $pembimbing, $kartupasien_id)
    {
        $elemengigis = Odontogram::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
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

if (!function_exists('getElemenPermukaanGigis')) {
    function getElemenPermukaanGigis($user_id, $pembimbing, $kartupasien_id)
    {
        // Ambil record paling baru dari tabel 'Eksplakkal'
        $latestRecord = Eksplakkal::where('user_id', $user_id)
            ->where('pembimbing', $pembimbing)
            ->where('kartupasien_id', $kartupasien_id)
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
