<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\AccountOrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class AccountOrderController extends Controller
{
    public function processPayment(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'game_account_id' => 'required|exists:game_accounts,id',
            'customer_name'   => 'required|string|max:255',
            'kontak'          => 'required|string|max:255',
            'price'           => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            // Buat record transaksi dengan nilai sementara untuk transactionable_id
            $transaction = Transaction::create([
                'transaction_number'   => 'TX-' . strtoupper(uniqid()),
                'transactionable_id'   => 0, // akan diupdate nanti
                'transactionable_type' => AccountOrderDetail::class,
                'status'               => 'pending', // pastikan nilai ini sesuai dengan enum pada database
            ]);

            // Buat order detail untuk akun game
            $order = AccountOrderDetail::create([
                'transaction_id'   => $transaction->id,
                'game_account_id'  => $data['game_account_id'],
                'customer_name'    => $data['customer_name'],
                'customer_contact' => $data['kontak'],
                'price'            => $data['price'],
            ]);

            // Update field transactionable_id dengan id order detail yang baru dibuat
            $transaction->update([
                'transactionable_id' => $order->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error saat membuat order: ' . $e->getMessage()], 500);
        }

        // Konfigurasi Midtrans
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');

        // Parameter transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id'     => $transaction->transaction_number,
                'gross_amount' => $order->price,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'phone'      => $order->customer_contact,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Midtrans Error: ' . $e->getMessage()], 500);
        }

        return response()->json(['snap_token' => $snapToken]);
    }
}
