<?php

namespace App\Exports;

use App\Models\GameRankTier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GameRankTiersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return GameRankTier::with('rankCategory')->get()->map(function ($tier) {
            return [
                'ID'              => $tier->id,
                'Category'        => $tier->rankCategory ? $tier->rankCategory->name : '-',
                'Tier'            => $tier->tier,
                'Progress Target' => $tier->progress_target,
                'Display Order'   => $tier->display_order,
                'Created At'      => $tier->created_at ? $tier->created_at->toDateTimeString() : null,
                'Updated At'      => $tier->updated_at ? $tier->updated_at->toDateTimeString() : null,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Category',
            'Tier',
            'Progress Target',
            'Display Order',
            'Created At',
            'Updated At',
        ];
    }
}
