<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageOrderRequest;
use App\Models\BoostingService;
use App\Models\PackageOrderDetail;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class PackageOrderController extends Controller
{
    private function initMidtrans()
    {
        Config::$serverKey       = config('midtrans.server_key');
        Config::$isProduction    = config('midtrans.is_production');
        Config::$isSanitized     = config('midtrans.is_sanitized');
        Config::$is3ds           = config('midtrans.is_3ds');
        Config::$appendNotifUrl  = env('NGROK_HTTP_8000');
    }

    public function handleNotification(Request $request)
    {
        Log::info('Midtrans Notification Received:', $request->all());
        $this->initMidtrans();

        try {
            $notification = new Notification();
        } catch (\Exception $e) {
            Log::error('Error processing Midtrans notification: ' . $e->getMessage());
            return response()->json(['message' => 'Error processing notification'], 500);
        }

        $transaction = Transaction::where('transaction_number', $notification->order_id)->first();
        if (!$transaction) {
            Log::error('Transaction not found: ' . $notification->order_id);
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transactionStatus = $notification->transaction_status;
        if ($transactionStatus === 'capture') {
            $fraudStatus = $notification->fraud_status;
            if ($fraudStatus === 'accept') {
                $transaction->status = 'success';
            } elseif ($fraudStatus === 'challenge') {
                $transaction->status = 'pending';
            } else {
                $transaction->status = 'failed';
            }
        } elseif ($transactionStatus === 'settlement') {
            $transaction->status = 'success';
        } elseif ($transactionStatus === 'pending') {
            $transaction->status = 'pending';
        } elseif (in_array($transactionStatus, ['deny', 'expired', 'cancel'])) {
            $transaction->status = 'canceled';
        }
        $transaction->save();

        Payment::updateOrCreate(
            ['midtrans_transaction_id' => $notification->transaction_id],
            [
                'transaction_id'  => $transaction->id,
                'midtrans_status' => $transactionStatus,
                'payload'         => json_encode($notification)
            ]
        );

        Log::info('Midtrans notification processed for transaction: ' . $transaction->transaction_number);

        return response()->json(['message' => 'Notification processed'], 200);
    }

    public function processPayment(PackageOrderRequest $request)
    {
        $this->initMidtrans();

        $data = $request->validated();

        $service = BoostingService::findOrFail($data['boosting_service_id']);
        $price = $service->sale_price ?? $service->original_price;

        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'transaction_number'   => 'JokiPaket-' . strtoupper(uniqid()),
                'transactionable_id'   => 0, // akan diupdate setelah order dibuat
                'transactionable_type' => PackageOrderDetail::class,
                'status'               => 'pending',
            ]);

            $order = PackageOrderDetail::create([
                'transaction_id'      => $transaction->id,
                'boosting_service_id' => $data['boosting_service_id'],
                'server'              => $data['server'] ?? null,
                'login'               => $data['login'] ?? null,
                'note'                => $data['note'] ?? null,
                'customer_name'       => $data['customer_name'],
                'customer_contact'    => $data['customer_contact'],
                'username'            => $data['username'],
                'password'            => $data['password'],
                'price'               => $price,
            ]);

            $transaction->update([
                'transactionable_id' => $order->id,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating package boosting order: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating order: ' . $e->getMessage()], 500);
        }

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
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json(['error' => 'Midtrans Error: ' . $e->getMessage()], 500);
        }

        return response()->json([
            'snap_token'         => $snapToken,
            'transaction_number' => $transaction->transaction_number,
        ]);
    }
}
