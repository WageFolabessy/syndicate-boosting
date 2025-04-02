<?php

namespace App\Exports;

use App\Models\Faq;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FaqsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Faq::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Question',
            'Answer',
            'Created At',
            'Upadated At',
        ];
    }
}
