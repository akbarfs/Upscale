<?php

namespace App\Imports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TalentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Talent([
            'talent_name' => $row[5],
            'talent_phone' => $row[6],
            'talent_email' => $row[7],
            'talent_web' => $row[8],
            'talent_skill' => $row[9],
            'talent_current_adress' => $row[10],
            'talent_linkedin' => $row[11],
            'talent_current_work' => $row[13],
            'talent_start_career' => $row[14],
            'talent_totalexperience' => $row[15],
        ]);
    }
    
    public function startRow(): int
    {
        return 1;
    }
}
