<?php

namespace App\Imports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TalentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Talent([
            'talent_name' => $row['nama'],
            'talent_phone' => $row['no_wa'],
            'talent_email' => $row['email'],
            'talent_web' => $row['website'],
            'talent_skill' => $row['keahlian'],
            'talent_current_adress' => $row['location'],
            'talent_linkedin' => $row['link_linkedin'],
            'talent_current_work' => $row['pekerjaan_skrg'],
            'talent_start_career' => $row['dari_thn'],
            'talent_totalexperience' => $row['pengalaman_kerja'],
        ]);
    }
    
    // public function startRow(): int
    // {
    //     return 1;
    // }
}
