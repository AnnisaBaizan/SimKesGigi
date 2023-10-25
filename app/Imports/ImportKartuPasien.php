<?php

namespace App\Imports;

use App\Models\kartupasien;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportKartuPasien implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new kartupasien([
            'no_kartu'=> $row[0],
            'nama' => $row[1],
            'no_iden' => $row[2],
            'tgl_lhr' => $row[3],
            'umur' => $row[4],
            'jk' => $row[5],
            'suku' => $row[6],
            'pekerjaan' => $row[7],
            'hub' => $row[8],
            'no_hp' => $row[9],
            'no_tlpn' => $row[10],
            'alamat' => $row[11]
        ]);
    }
}
