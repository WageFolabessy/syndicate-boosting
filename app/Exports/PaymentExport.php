<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payment::all()->map(function($payment) {
            return [
                'ID' => $payment->id,
                'Transaction ID' => $payment->transaction_id,
                'Transaction Number' => $payment->transaction->transaction_number,
                'Transaction Type' => class_basename($payment->transaction->transactionable),
                'Midtrans Transaction ID' => $payment->midtrans_transaction_id,
                'Midtrans Status' => $payment->midtrans_status,
                'Payload' => $payment->payload ? json_encode($payment->payload, JSON_PRETTY_PRINT) : null,
                'Created At' => $payment->created_at->format('Y-m-d H:i:s'),
                'Updated At' => $payment->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Transaction ID',
            'Transaction Number',
            'Transaction Type',
            'Midtrans Transaction ID',
            'Midtrans Status',
            'Payload',
            'Created At',
            'Updated At',
        ];
    }
}
