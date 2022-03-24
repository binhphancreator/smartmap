<?php

namespace App\Imports;

use App\Models\Point;
use Maatwebsite\Excel\Concerns\ToModel;

class PointImport implements ToModel
{
    /**
     * @param array $row
     *
     *
     */
    public function model(array $row)
    {
        return new Point([
           'id' => $row[0],
           'point_id' => $row[1],
           'group_id' => $row[2],
           'name' => $row[3], 
           'block' => $row[4],
           'floor' => $row[5],
           'room' => $row[6],
           'picture' => $row[7]
        ]);
    }
}