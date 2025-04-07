<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllTransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all()->map(function($transaction) {
            return [
                'ID' => $transaction->id,
                'Transaction Number' => $transaction->transaction_number,
                'Transaction Type' => class_basename($transaction->transactionable),
                'Payment Status' => $transaction->payment->midtrans_status,
                'Customer Name' => $transaction->transactionable->customer_name,
                'Customer Contact' => $transaction->transactionable->customer_contact,
                'Price' => $transaction->transactionable->price,
                'Created At' => $transaction->created_at->format('Y-m-d H:i:s'),
                'Updated At' => $transaction->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Transaction Number',
            'Transaction Type',
            'Payment Status',
            'Customer Name',
            'Customer Contact',
            'Price',
            'Created At',
            'Updated At',
        ];
    }
}
