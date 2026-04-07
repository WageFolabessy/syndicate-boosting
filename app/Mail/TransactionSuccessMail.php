<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TransactionSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public Transaction $transaction;
    public string $customerName;
    public string $customerEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(Transaction $transaction, string $customerName, string $customerEmail)
    {
        $this->transaction   = $transaction;
        $this->customerName  = $customerName;
        $this->customerEmail = $customerEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Transaksi Berhasil – ' . $this->transaction->transaction_number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.transaction-success',
            with: [
                'transaction'   => $this->transaction,
                'customerName'  => $this->customerName,
                'customerEmail' => $this->customerEmail,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
