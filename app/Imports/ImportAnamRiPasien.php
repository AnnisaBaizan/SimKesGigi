<?php

namespace App\Imports;

use App\Models\anamripasien;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAnamRiPasien implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new anamripasien([
            'kartupasien_id' => $row[0],
            'klhn_utama' => $row[1],
            'klhn_tmbhn' => $row[2],
            'goldar' => $row[3],
            'nadi' => $row[4],
            'tknn_drh' => $row[5],
            'ktrgn_drh' => $row[6],
            'suhu' => $row[7],
            'pernafasan' => $row[8],
            'jantung' => $row[9],
            'diabetes' => $row[10],
            'haemophilia' => $row[11],
            'hepatitis' => $row[12],
            'lambung' => $row[13],
            'pnykt_ln' => $row[14],
            'nm_pnykt_ln' => $row[15],
            'alergi_obat' => $row[16],
            'nm_obat' => $row[17],
            'alergi_mkn' => $row[18],
            'nm_mkn' => $row[19],
        ]);
    }
}
