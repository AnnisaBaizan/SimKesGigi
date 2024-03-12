<?php

use App\Models\kartupasien;
use Illuminate\Support\Facades\DB;

    function get_v($tabel,$name,$id,$col) {
        $data = DB::table($tabel)->where($name,$id)->get($col);
        return $data;
    }


    if (!function_exists('getPatients')) {
        function getPatients($user_id, $pembimbing) {
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
?>