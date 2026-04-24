<?php

namespace App\Services;

use App\Models\AccountOrderDetail;
use App\Models\CustomOrderDetail;
use App\Models\PackageOrderDetail;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

class TransactionSequentialSearchService
{
    /**
     * Sequential Search (Linear Search):
     * - Scan one-by-one from the first transaction record.
     * - Stop as soon as the matching transaction number is found.
     */
    public function searchByTransactionNumber(string $transactionNumber): Collection
    {
        $needle = trim($transactionNumber);

        if ($needle === '') {
            return new Collection();
        }

        $matchedTransactionId = null;

        $scanQuery = Transaction::query()
            ->select(['id', 'transaction_number'])
            ->whereIn('transactionable_type', [
                AccountOrderDetail::class,
                PackageOrderDetail::class,
                CustomOrderDetail::class,
            ])
            ->orderBy('id');

        foreach ($scanQuery->cursor() as $transaction) {
            if (strcasecmp($transaction->transaction_number, $needle) === 0) {
                $matchedTransactionId = $transaction->id;
                break;
            }
        }

        if (!$matchedTransactionId) {
            return new Collection();
        }

        return Transaction::query()
            ->whereKey($matchedTransactionId)
            ->with([
                'transactionable' => function ($morphTo) {
                    $morphTo->morphWith([
                        AccountOrderDetail::class => ['gameAccount'],
                        PackageOrderDetail::class => ['boostingService'],
                        CustomOrderDetail::class => [
                            'currentGameRankCategory',
                            'currentGameRankTier',
                            'currentGameRankTierDetail',
                            'desiredGameRankCategory',
                            'desiredGameRankTier',
                            'desiredGameRankTierDetail',
                        ],
                    ]);
                },
                'review',
            ])
            ->get();
    }
}
