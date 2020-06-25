<?php

namespace App\Exports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TalentExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Talent::paginate(20);
    }
    public function headings(): array
    {
        return [
            'No',
            'Name',
            'Email',
            'Created at',
            'Updated at'
        ];
    }
}
