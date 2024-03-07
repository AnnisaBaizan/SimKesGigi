<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nimnip' => $row[0],
            'username' => $row[1],
            'email' => $row[2],
            'password' => $row[3],
            'role' => $row[4],
            'pembimbing' => $row[5],
            'avatar' => "AvatarDefault.jpg"
        ]);
    }
}