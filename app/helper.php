<?php

use App\Models\kartupasien;
use App\Models\Odontogram;
use App\Models\Vitalitas;
use Illuminate\Support\Facades\DB;

function get_v($tabel, $name, $id, $col)
{
    $data = DB::table($tabel)->where($name, $id)->get($col);
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
            ->get('gigi_karies');

        $elemenGigiHTML = '<option value="" selected disabled>Pilih Elemen Gigi</option>';
        foreach ($elemengigis as $elemengigi) {
            $gigiArray = explode(",", $elemengigi->gigi_karies);
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
        }

        return $elemenGigiHTML;
    }
}
