<?php

namespace App\Exports;

use App\Models\GameAccount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GameAccountsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return GameAccount::with('game')->get()->map(function ($account) {
            return [
                'ID'            => $account->id,
                'Game'          => $account->game ? $account->game->name : '-',
                'Account Name'  => $account->account_name,
                'Description'   => $account->description,
                'Features'      => $account->features,
                'Original Price'=> $account->original_price,
                'Sale Price'    => $account->sale_price,
                'Image'         => $account->image,
                'Level'         => $account->level,
                'Account Age'   => $account->account_age,
                'Created At'    => $account->created_at ? $account->created_at->toDateTimeString() : null,
                'Updated At'    => $account->updated_at ? $account->updated_at->toDateTimeString() : null,
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Game',
            'Account Name',
            'Description',
            'Features',
            'Original Price',
            'Sale Price',
            'Image',
            'Level',
            'Account Age',
            'Created At',
            'Updated At'
        ];
    }
}
