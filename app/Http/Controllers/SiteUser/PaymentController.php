<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
    private function initMidtrans()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');
        Config::$overrideNotifUrl = config('midtrans.notif_url');
    }

    public function paymentNotification(Request $request)
    {
        $this->initMidtrans();
        // Log bahwa endpoint terpanggil
        Log::info('paymentNotification endpoint hit.', $request->all());

        // Inisialisasi konfigurasi Midtrans

        // Coba buat objek Notification dari Midtrans
        $notification = new Notification();

        // Logging payload notifikasi untuk debugging
        Log::info("Midtrans Notification received:", (array) $notification);

        $orderNumber = $notification->order_id;
        if (!$orderNumber) {
            Log::error("Order ID tidak ditemukan dalam notifikasi.");
            return response()->json(['error' => 'Order ID tidak ditemukan'], 400);
        }

        // Cari transaksi berdasarkan transaction_number
        $transaction = Transaction::where('transaction_number', $orderNumber)->first();
        if (!$transaction) {
            Log::error("Transaksi dengan order number {$orderNumber} tidak ditemukan.");
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        $midtransStatus = $notification->transaction_status;
        // Mapping status Midtrans ke status transaksi di database
        switch ($midtransStatus) {
            case 'capture':
            case 'settlement':
                $transactionStatus = 'success'; // atau 'processed' sesuai kebutuhan
                break;
            case 'deny':
            case 'cancel':
            case 'expire':
                $transactionStatus = 'failed'; // atau 'canceled'
                break;
            case 'pending':
            default:
                $transactionStatus = 'pending';
                break;
        }


        $transaction->update(['status' => $transactionStatus]);

        // Simpan atau update data payment
        Payment::updateOrCreate(
            ['transaction_id' => $transaction->id],
            [
                'midtrans_transaction_id' => $notification->transaction_id ?? '',
                'midtrans_status'         => $transactionStatus,
                'payload'                 => json_encode($notification),
            ]
        );

        Log::info('Notifikasi diproses untuk transaksi', ['transaction_id' => $transaction->id]);

        return response()->json(['message' => 'Notifikasi diproses.'], 200);
    }
}
