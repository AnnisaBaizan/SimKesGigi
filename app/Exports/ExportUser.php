<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all()->only('nimnip', 'username', 'email', 'password','role');
        return User::select('nimnip', 'username', 'email', 'password', 'role', 'pembimbing')->get();
    }
}
