<?php

namespace App\Imports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TalentImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Talent([
            'talent_name' => isset ($row['nama']) ? $row['nama']: '',
            'talent_phone' => isset ($row['no_wa']) ? $row['no_wa']: '',
            'talent_email' => isset ($row['email']) ? $row['email']: '',
            'talent_web' => isset ($row['website']) ? $row['website']: '',
            'talent_skill' => isset ($row['keahlian']) ? $row['keahlian']: '',
            'talent_current_adress' => isset ($row['location']) ? $row['location']: '',
            'talent_linkedin' => isset ($row['link_linkedin']) ? $row['link_linkedin']: '',
            'talent_current_work' => isset ($row['pekerjaan_skrg']) ? $row['pekerjaan_skrg']: '',
            'talent_start_career' => isset ($row['dari_thn']) ? $row['dari_thn']: '',
            'talent_totalexperience' => isset ($row['pengalaman_kerja']) ? $row['pengalaman_kerja']: '',
        ]);
    }
    
    // public function startRow(): int
    // {
    //     return 1;
    // }

    public function rules(): array
    {
    return [
        // 'nama' => 'unique:talent,talent_name',
        // 'no_wa' => 'unique:talent,talent_phone',
        'email' => 'unique:talent,talent_email',
    ];
    }

}
