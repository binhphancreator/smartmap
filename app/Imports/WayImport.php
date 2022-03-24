<?php

namespace App\Imports;

use App\Models\Way;
use Maatwebsite\Excel\Concerns\ToModel;

class WayImport implements ToModel
{
    /**
     * @param array $row
     *
     *
     */
    public function model(array $row)
    {
        return new Way([
           'start_point_id' => $row[1],
           'end_point_id' => $row[2],
           'introduction' => $row[3],
        ]);
    }
}