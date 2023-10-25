<?php

namespace App\Exports;

use App\Models\kartupasien;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportKartuPasien implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return kartupasien::select('no_kartu', 'nama', 'no_iden', 'tgl_lhr', 'umur', 'jk', 'suku', 'pekerjaan', 'hub', 'no_hp', 'no_tlpn', 'alamat')->get();
    }
}
