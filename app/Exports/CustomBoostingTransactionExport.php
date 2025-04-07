<?php

namespace App\Exports;

use App\Models\CustomOrderDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomBoostingTransactionExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CustomOrderDetail::all()->map(function ($transaction) {
            return [
                'ID'                           => $transaction->id,
                'Transaction Number'         => $transaction->transaction->transaction_number,
                'Payment Status'     => optional($transaction->transaction->payment)->midtrans_status,
                'Current Rank Category'        => optional($transaction->currentGameRankCategory)->name,
                'Current Rank Tier'            => optional($transaction->currentGameRankTier)->tier,
                'Current Rank Tier Detail'     => optional($transaction->currentGameRankTierDetail)->star_number,
                'Desired Rank Category'        => optional($transaction->desiredGameRankCategory)->name,
                'Desired Rank Tier'            => optional($transaction->desiredGameRankTier)->tier,
                'Desired Rank Tier Detail'     => optional($transaction->desiredGameRankTierDetail)->star_number,
                'Server'                       => $transaction->server,
                'Login'                        => $transaction->login,
                'Note'                         => $transaction->note,
                'Customer Name'                => $transaction->customer_name,
                'Customer Contact'             => $transaction->customer_contact,
                'Username'                     => $transaction->username,
                'Password'                     => $transaction->password,
                'Price'                        => $transaction->price,
                'Status'                       => ucfirst($transaction->status),
                'Created At'                   => $transaction->created_at->format('Y-m-d H:i:s'),
                'Updated At'                   => $transaction->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Transaction Number',
            'Payment Status',
            'Current Rank Category',
            'Current Rank Tier',
            'Current Rank Tier Detail',
            'Desired Rank Category',
            'Desired Rank Tier',
            'Desired Rank Tier Detail',
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
