<?php

namespace App\Exports;

use App\Models\Label;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LabelExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Label::all();
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Color',
            'Created At',
            'Updated At',
        ];
    }
}
