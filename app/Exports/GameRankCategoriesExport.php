<?php

namespace App\Exports;

use App\Models\GameRankCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GameRankCategoriesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $categories = GameRankCategory::with('game')->get();

        return $categories->map(function ($category) {
            return [
                'ID'             => $category->id,
                'Game'           => $category->game ? $category->game->name : '-',
                'Name'           => $category->name,
                'Image'          => $category->image,
                'Display Order'  => $category->display_order,
                'System Type'    => $category->system_type,
                'Created At'     => $category->created_at ? $category->created_at->toDateTimeString() : '-',
                'Updated At'     => $category->updated_at ? $category->updated_at->toDateTimeString() : '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Game',
            'Name',
            'Image',
            'Display Order',
            'System Type',
            'Created At',
            'Updated At',
        ];
    }
}
