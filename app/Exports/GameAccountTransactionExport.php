<?php

namespace App\Exports;

use App\Models\AccountOrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GameAccountTransactionExport implements FromCollection, WithHeadings
{
    protected $month;
    protected $year;
    protected $progressStatus;

    public function __construct($month = null, $year = null, $progressStatus = null)
    {
        $this->month = $month;
        $this->year = $year;
        $this->progressStatus = $progressStatus;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $month = $this->month;
        $year = $this->year;
        $progressStatus = $this->progressStatus;

        return AccountOrderDetail::with(['transaction', 'gameAccount.game'])
            ->when($month, fn ($q) => $q->whereMonth('created_at', $month))
            ->when($year, fn ($q) => $q->whereYear('created_at', $year))
            ->when(
                $progressStatus,
                fn ($q) => $q->whereHas('transaction', fn ($query) => $query->where('transactions.status', $progressStatus))
            )
            ->get()->map(function ($detail) {
            return [
                'ID' => $detail->id,
                'Transaction Number' => optional($detail->transaction)->transaction_number,
                'Payment Status' => optional(optional($detail->transaction)->payment)->midtrans_status ?? 'pending',
                'Game Account' => optional($detail->gameAccount)->account_name,
                'Game' => optional(optional($detail->gameAccount)->game)->name,
                'Customer Name' => $detail->customer_name,
                'Customer Contact' => $detail->customer_contact,
                'Price' => $detail->price,
                'Created At' => $detail->created_at->format('Y-m-d H:i:s'),
                'Updated At' => $detail->updated_at->format('Y-m-d H:i:s'),
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
