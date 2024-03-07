<?php
use Illuminate\Support\Facades\DB;

    function get_v($tabel,$name,$id,$col) {
        $data = DB::table($tabel)->where($name,$id)->get($col);
        return $data;
    }

?>