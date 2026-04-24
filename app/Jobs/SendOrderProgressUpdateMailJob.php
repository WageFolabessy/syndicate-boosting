<?php

namespace App\Jobs;

use App\Mail\OrderProgressUpdatedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderProgressUpdateMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 60;

    public function __construct(
        public string $transactionNumber,
        public string $customerName,
        public string $customerEmail,
        public string $progressStatus,
        public string $orderType,
        public bool $isReminder = false,
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->customerEmail)->send(
            new OrderProgressUpdatedMail(
                transactionNumber: $this->transactionNumber,
                customerName: $this->customerName,
                customerEmail: $this->customerEmail,
                progressStatus: $this->progressStatus,
                orderType: $this->orderType,
                isReminder: $this->isReminder,
            )
        );
    }
}
