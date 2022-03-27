<?php

namespace App\Imports;

use App\Models\Way;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class WayImport implements ToModel, WithValidation 
{
    use Importable;
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

    public function rules(): array  
    {
        return [
            '1' => [
                'required',
                'exists:points,id'
            ],
            '2' => [
                'required',
                'exists:points,id'
            ],
        ];
    }
}