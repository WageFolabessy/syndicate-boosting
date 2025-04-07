<?php

namespace App\Exports;

use App\Models\AccountOrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GameAccountTransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AccountOrderDetail::all()->map(function($detail) {
            return [
                'ID'                 => $detail->id,
                'Transaction Number'     => $detail->transaction->transaction_number,
                'Payment Status'     => $detail->transaction->payment->midtrans_status,
                'Game Account'       => optional($detail->gameAccount)->account_name,
                'Game'               => optional(optional($detail->gameAccount)->game)->name,
                'Customer Name'      => $detail->customer_name,
                'Customer Contact'   => $detail->customer_contact,
                'Price'              => $detail->price,
                'Created At'         => $detail->created_at->format('Y-m-d H:i:s'),
                'Updated At'         => $detail->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Transaction Number',
            'Payment Status',
            'Game Account',
            'Game',
            'Customer Name',
            'Customer Contact',
            'Price',
            'Created At',
            'Updated At',
        ];
    }
}
