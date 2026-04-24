<?php

namespace App\Jobs;

use App\Mail\TransactionSuccessMail;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendTransactionSuccessMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 60;

    public function __construct(
        public int $transactionId,
        public string $customerName,
        public string $customerEmail,
    ) {
    }

    public function handle(): void
    {
        $transaction = Transaction::find($this->transactionId);

        if (!$transaction) {
            Log::warning('Transaction not found while sending success email. ID: ' . $this->transactionId);
            return;
        }

        Mail::to($this->customerEmail)->send(
            new TransactionSuccessMail($transaction, $this->customerName, $this->customerEmail)
        );
    }
}
