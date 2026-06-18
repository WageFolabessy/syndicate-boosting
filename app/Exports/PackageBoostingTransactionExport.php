<?php

namespace App\Exports;

use App\Models\PackageOrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PackageBoostingTransactionExport implements FromCollection, WithHeadings
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

        return PackageOrderDetail::with(['transaction', 'boostingService'])
            ->when($month, fn ($q) => $q->whereMonth('created_at', $month))
            ->when($year, fn ($q) => $q->whereYear('created_at', $year))
            ->when($progressStatus, fn ($q) => $q->where('package_order_details.status', $progressStatus))
            ->get()->map(function ($detail) {
            return [
                'ID' => $detail->id,
                'Transaction Number' => $detail->transaction->transaction_number,
                'Payment Status' => optional($detail->transaction->payment)->midtrans_status,
                'Boosting Service' => optional($detail->boostingService)->title,
                'Server' => $detail->server,
                'Login' => $detail->login,
                'Note' => $detail->note,
                'Customer Name' => $detail->customer_name,
                'Customer Contact' => $detail->customer_contact,
                'Username' => $detail->username,
                'Password' => $detail->password,
                'Price' => $detail->price,
                'Status' => ucfirst($detail->status),
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
            'Boosting Service',
            'Server',
            'Login',
            'Note',
            'Customer Name',
            'Customer Contact',
            'Username',
            'Password',
            'Price',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
