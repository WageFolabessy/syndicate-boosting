<?php

namespace App\Services;

use App\Jobs\SendOrderProgressUpdateMailJob;
use App\Jobs\SendTransactionSuccessMailJob;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class OrderNotificationService
{
    public function queueTransactionSuccess(Transaction $transaction, ?string $customerName, ?string $customerEmail): void
    {
        if (!$customerName || !$customerEmail) {
            return;
        }

        try {
            SendTransactionSuccessMailJob::dispatch(
                transactionId: $transaction->id,
                customerName: $customerName,
                customerEmail: $customerEmail,
            );

            Log::info('Transaction success email queued for: ' . $customerEmail);
        } catch (\Throwable $e) {
            Log::error('Failed to queue transaction success email: ' . $e->getMessage());
        }
    }

    public function queueProgressUpdate(
        string $transactionNumber,
        ?string $customerName,
        ?string $customerEmail,
        ?string $progressStatus,
        string $orderType,
        bool $isReminder = false
    ): void {
        if (!$transactionNumber || !$customerName || !$customerEmail || !$progressStatus) {
            return;
        }

        $normalizedStatus = strtolower($progressStatus);

        if (!in_array($normalizedStatus, ['failed', 'canceled', 'pending', 'processed', 'success'], true)) {
            return;
        }

        try {
            SendOrderProgressUpdateMailJob::dispatch(
                transactionNumber: $transactionNumber,
                customerName: $customerName,
                customerEmail: $customerEmail,
                progressStatus: $normalizedStatus,
                orderType: $orderType,
                isReminder: $isReminder,
            );

            Log::info('Order progress email queued for: ' . $customerEmail . ' (' . $normalizedStatus . ')');
        } catch (\Throwable $e) {
            Log::error('Failed to queue order progress email: ' . $e->getMessage());
        }
    }
}
