<?php

namespace App\Exports;

use App\Models\GameRankTierDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GameRankTierDetailsExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return GameRankTierDetail::with('tier')->get()->map(function ($detail) {
            return [
                'ID'            => $detail->id,
                'Tier'          => $detail->tier ? $detail->tier->tier : '-', 
                'Star Number'   => $detail->star_number,
                'Price'         => $detail->price,
                'Display Order' => $detail->display_order,
                'Created At'    => $detail->created_at ? $detail->created_at->toDateTimeString() : null,
                'Updated At'    => $detail->updated_at ? $detail->updated_at->toDateTimeString() : null,
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Tier',
            'Star Number',
            'Price',
            'Display Order',
            'Created At',
            'Updated At',
        ];
    }
}
