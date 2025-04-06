<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomOrderRequest;
use App\Models\CustomOrderDetail;
use App\Models\GameRankTierDetail;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class CustomOrderController extends Controller
{
    private function initMidtrans()
    {
        Config::$serverKey      = config('midtrans.server_key');
        Config::$isProduction   = config('midtrans.is_production');
        Config::$isSanitized    = config('midtrans.is_sanitized');
        Config::$is3ds          = config('midtrans.is_3ds');
        Config::$appendNotifUrl = env('NGROK_HTTP_8000');
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

        Log::info('Midtrans Notification Payload:', $request->all());
        Payment::updateOrCreate(
            ['midtrans_transaction_id' => $notification->transaction_id],
            [
                'transaction_id'  => $transaction->id,
                'midtrans_status' => $transactionStatus,
                'payload'         => json_encode($request->all())
            ]
        );
        Log::info('Midtrans notification processed for transaction: ' . $transaction->transaction_number);
        return response()->json(['message' => 'Notification processed'], 200);
    }

    public function processPayment(CustomOrderRequest $request)
    {
        $this->initMidtrans();
        $data = $request->validated();

        $currentTier = GameRankTierDetail::with('tier')->find($data['current_game_rank_tier_detail_id']);
        $desiredTier = GameRankTierDetail::with('tier')->find($data['desired_game_rank_tier_detail_id']);

        if (!$currentTier || !$desiredTier) {
            return response()->json(['error' => 'Detail tier tidak valid atau tidak ditemukan.'], 422);
        }

        // Opsional: validasi konsistensi data antara kategori/tier yang dipilih dengan relasi tier_detail
        if (
            $currentTier->tier->game_rank_category_id != $data['current_game_rank_category_id'] ||
            $desiredTier->tier->game_rank_category_id != $data['desired_game_rank_category_id'] ||
            $currentTier->tier->id != $data['current_game_rank_tier_id'] ||
            $desiredTier->tier->id != $data['desired_game_rank_tier_id']
        ) {
            return response()->json(['error' => 'Data kategori atau tier tidak konsisten dengan detail tier yang dipilih.'], 422);
        }

        if ($currentTier->id >= $desiredTier->id) {
            return response()->json(['error' => 'Rank tujuan harus lebih tinggi dari rank saat ini.'], 422);
        }

        $price = $desiredTier->price - $currentTier->price;

        DB::beginTransaction();
        try {
            $transaction = Transaction::create([
                'transaction_number'   => 'CustomBoost-' . strtoupper(uniqid()),
                'transactionable_id'   => 0, // nantinya akan diupdate dengan ID order detail
                'transactionable_type' => CustomOrderDetail::class,
                'status'               => 'pending',
            ]);

            $order = CustomOrderDetail::create([
                'transaction_id'                   => $transaction->id,
                'current_game_rank_category_id'    => $data['current_game_rank_category_id'],
                'current_game_rank_tier_id'          => $data['current_game_rank_tier_id'],
                'current_game_rank_tier_detail_id'   => $data['current_game_rank_tier_detail_id'],
                'desired_game_rank_category_id'      => $data['desired_game_rank_category_id'],
                'desired_game_rank_tier_id'            => $data['desired_game_rank_tier_id'],
                'desired_game_rank_tier_detail_id'     => $data['desired_game_rank_tier_detail_id'],
                'server'                           => $data['server'] ?? null,
                'login'                            => $data['login'] ?? null,
                'note'                             => $data['note'] ?? null,
                'customer_name'                    => $data['customer_name'],
                'customer_contact'                 => $data['customer_contact'],
                'username'                         => $data['username'],
                'password'                         => $data['password'],
                'price'                            => $price,
            ]);

            $transaction->update([
                'transactionable_id' => $order->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating custom boosting order: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating order: ' . $e->getMessage()], 500);
        }

        $params = [
            'transaction_details' => [
                'order_id'     => $transaction->transaction_number,
                'gross_amount' => $order->price,
            ],
            'customer_details'    => [
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
