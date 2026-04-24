<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderProgressUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $transactionNumber,
        public string $customerName,
        public string $customerEmail,
        public string $progressStatus,
        public string $orderType,
        public bool $isReminder = false,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ($this->isReminder ? '[Pengingat] ' : '') . 'Update Progres Pesanan - ' . $this->transactionNumber,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-progress-updated',
            with: [
                'transactionNumber' => $this->transactionNumber,
                'customerName'      => $this->customerName,
                'customerEmail'     => $this->customerEmail,
                'progressStatus'    => $this->progressStatus,
                'orderType'         => $this->orderType,
                'isReminder'        => $this->isReminder,
                'statusLabel'       => $this->statusLabel($this->progressStatus),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    private function statusLabel(string $status): string
    {
        return match ($status) {
            'failed' => 'Gagal',
            'canceled' => 'Dibatalkan',
            'pending' => 'Menunggu',
            'processed' => 'Sedang dikerjakan',
            'success' => 'Selesai',
            default => ucfirst($status),
        };
    }
}
