<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllTransactionExport implements FromCollection, WithHeadings
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

        return Transaction::with('transactionable')
            ->when($month, fn ($q) => $q->whereMonth('created_at', $month))
            ->when($year, fn ($q) => $q->whereYear('created_at', $year))
            ->when($progressStatus, function ($query) use ($progressStatus) {
                $query->where(function ($progressQuery) use ($progressStatus) {
                    $progressQuery
                        ->where(function ($accountOrderQuery) use ($progressStatus) {
                            $accountOrderQuery
                                ->where('transactionable_type', \App\Models\AccountOrderDetail::class)
                                ->where('status', $progressStatus);
                        })
                        ->orWhereHasMorph(
                            'transactionable',
                            [\App\Models\PackageOrderDetail::class, \App\Models\CustomOrderDetail::class],
                            fn ($morphQuery) => $morphQuery->where('status', $progressStatus)
                        );
                });
            })
            ->get()
            ->map(function ($transaction) {
                return [
                    'ID' => $transaction->id,
                    'Transaction Number' => $transaction->transaction_number,
                    'Transaction Type' => class_basename($transaction->transactionable),
                    'Payment Status' => optional($transaction->payment)->midtrans_status ?? 'pending',
                    'Customer Name' => optional($transaction->transactionable)->customer_name ?? 'N/A',
                    'Customer Contact' => optional($transaction->transactionable)->customer_contact ?? 'N/A',
                    'Price' => optional($transaction->transactionable)->price ?? 0,
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
