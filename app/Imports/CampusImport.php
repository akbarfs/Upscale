<?php

namespace App\Imports;

use App\Campus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Contracts\Queue\ShouldQueue; //IMPORT SHOUDLQUEUE
// use Maatwebsite\Excel\Concerns\WithChunkReading; 
class CampusImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Campus([
            'tipe' => $row['tipe'],
            'provinsi' => $row['provinsi'],
            'nama' => $row['nama']
        ]);
    }
}
