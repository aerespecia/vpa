<?php

namespace App\Imports;

use App\Models\Active;
use Maatwebsite\Excel\Concerns\ToModel;

class ActivesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Active([
            //
        ]);
    }
}
