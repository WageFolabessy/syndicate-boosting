<?php

namespace App\Console\Commands;

use App\Models\CustomOrderDetail;
use App\Models\PackageOrderDetail;
use App\Services\OrderNotificationService;
use Illuminate\Console\Command;

class SendPendingOrderProgressReminders extends Command
{
    protected $signature = 'orders:send-progress-reminders';

    protected $description = 'Send scheduled reminder emails for pending and processed boosting orders';

    public function handle(OrderNotificationService $notificationService): int
    {
        $this->sendForPackageOrders($notificationService);
        $this->sendForCustomOrders($notificationService);

        $this->info('Order progress reminders have been queued.');

        return self::SUCCESS;
    }

    private function sendForPackageOrders(OrderNotificationService $notificationService): void
    {
        PackageOrderDetail::query()
            ->with('transaction')
            ->whereIn('status', ['pending', 'processed'])
            ->whereNotNull('customer_email')
            ->chunkById(100, function ($rows) use ($notificationService) {
                foreach ($rows as $order) {
                    $notificationService->queueProgressUpdate(
                        transactionNumber: $order->transaction?->transaction_number ?? '',
                        customerName: $order->customer_name,
                        customerEmail: $order->customer_email,
                        progressStatus: $order->status,
                        orderType: 'Package Boosting',
                        isReminder: true,
                    );
                }
            });
    }

    private function sendForCustomOrders(OrderNotificationService $notificationService): void
    {
        CustomOrderDetail::query()
            ->with('transaction')
            ->whereIn('status', ['pending', 'processed'])
            ->whereNotNull('customer_email')
            ->chunkById(100, function ($rows) use ($notificationService) {
                foreach ($rows as $order) {
                    $notificationService->queueProgressUpdate(
                        transactionNumber: $order->transaction?->transaction_number ?? '',
                        customerName: $order->customer_name,
                        customerEmail: $order->customer_email,
                        progressStatus: $order->status,
                        orderType: 'Custom Boosting',
                        isReminder: true,
                    );
                }
            });
    }
}
