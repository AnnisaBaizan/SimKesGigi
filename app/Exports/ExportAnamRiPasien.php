<?php

namespace App\Exports;

use App\Models\anamripasien;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAnamRiPasien implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return anamripasien::select('kartupasien_id', 'klhn_utama', 'klhn_tmbhn', 'goldar', 'nadi', 'tknn_drh', 'ktrgn_drh', 'suhu', 'pernafasan', 'jantung', 'diabetes', 'haemophilia', 'hepatitis', 'lambung', 'pnykt_ln', 'nm_pnykt_ln', 'alergi_obat', 'nm_obat', 'alergi_mkn', 'nm_mkn')->get();
    }
}
