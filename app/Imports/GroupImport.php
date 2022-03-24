<?php

namespace App\Imports;

use App\Models\Group;
use Maatwebsite\Excel\Concerns\ToModel;

class GroupImport implements ToModel
{
    /**
     * @param array $row
     *
     *
     */
    public function model(array $row)
    {
        return new Group([
           'id' => $row[0],
           'name' => $row[1], 
        ]);
    }
}