<?php

namespace App\Exports;

use App\Models\BoostingService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BoostingServicesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $services = BoostingService::with('game')->get();

        return $services->map(function ($service) {
            return [
                'ID'              => $service->id,
                'Game'            => $service->game ? $service->game->name : '-',
                'Title'           => $service->title,
                'Description'     => $service->description,
                'Original Price'  => $service->original_price,
                'Sale Price'      => $service->sale_price,
                'Image'           => $service->image,
                'Created At'      => $service->created_at ? $service->created_at->toDateTimeString() : null,
                'Updated At'      => $service->updated_at ? $service->updated_at->toDateTimeString() : null,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Game',
            'Title',
            'Description',
            'Original Price',
            'Sale Price',
            'Image',
            'Created At',
            'Updated At',
        ];
    }
}
