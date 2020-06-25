<?php

namespace App\Exports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\FromCollection;

class TalentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Talent::select("talent_name","talent_email")->limit(10)->get();
    }
}
