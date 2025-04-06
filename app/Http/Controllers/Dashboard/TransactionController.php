<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AccountOrderDetail;
use App\Models\CustomOrderDetail;
use App\Models\PackageOrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function getAllTransactions()
    {
        $transactions = Transaction::with('transactionable')
            ->orderBy('updated_at', 'desc')
            ->get();

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->editColumn('transaction_number', function ($transaction) {
                return $transaction->transaction_number;
            })
            ->editColumn('order_type', function ($transaction) {
                if(class_basename($transaction->transactionable) == "CustomOrderDetail")
                {
                    return "CustomOrder";
                }
                if(class_basename($transaction->transactionable) == "PackageOrderDetail")
                {
                    return "PackageOrder";
                }
                if(class_basename($transaction->transactionable) == "AccountOrderDetail")
                {
                    return "AccountOrder";
                }
            })
            ->editColumn('customer_name', function ($transaction) {
                return $transaction->transactionable->customer_name ?? 'N/A';
            })
            ->editColumn('customer_contact', function ($transaction) {
                return $transaction->transactionable->customer_contact ?? 'N/A';
            })
            ->editColumn('price', function ($transaction) {
                return number_format($transaction->transactionable->price ?? 0, 0, ',', '.');
            })
            ->editColumn('created_at', function ($transaction) {
                return $transaction->created_at
                    ? $transaction->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->editColumn('updated_at', function ($transaction) {
                return $transaction->updated_at
                    ? $transaction->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->addColumn('action', function ($transaction) {
                return '';
            })
            ->addColumn('payment_status', function ($transaction) {
                return $transaction->payment->midtrans_status ?? 'pending or failed';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getAllCustomBoostingTransaction()
    {
        $transactions = CustomOrderDetail::with([
            'transaction',
            'currentGameRankCategory',
            'currentGameRankTier',
            'currentGameRankTierDetail',
            'desiredGameRankCategory',
            'desiredGameRankTier',
            'desiredGameRankTierDetail'
        ])
            ->orderBy('updated_at', 'desc')
            ->get();

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->addColumn('transaction_number', function ($detail) {
                return $detail->transaction->transaction_number ?? 'N/A';
            })
            ->addColumn('payment_status', function ($detail) {
                return $detail->transaction->payment->midtrans_status ?? 'pending or failed';
            })
            ->addColumn('game', function ($detail) {
                // Misal ambil nama game dari kategori current (atau desired, tergantung logika)
                return $detail->currentGameRankCategory->game->name ?? 'N/A';
            })
            ->addColumn('current_rank', function ($detail) {
                $category = $detail->currentGameRankCategory->name ?? '-';
                $tier     = $detail->currentGameRankTier->tier ?? '-';
                $star     = $detail->currentGameRankTierDetail->star_number ?? '-';
                return "{$category} - {$tier} ({$star})";
            })
            ->addColumn('desired_rank', function ($detail) {
                $category = $detail->desiredGameRankCategory->name ?? '-';
                $tier     = $detail->desiredGameRankTier->tier ?? '-';
                $star     = $detail->desiredGameRankTierDetail->star_number ?? '-';
                return "{$category} - {$tier} ({$star})";
            })
            ->editColumn('customer_name', function ($detail) {
                return $detail->customer_name ?? 'N/A';
            })
            ->editColumn('customer_contact', function ($detail) {
                return $detail->customer_contact ?? 'N/A';
            })
            ->editColumn('server', function ($detail) {
                return $detail->server ?? 'N/A';
            })
            ->editColumn('login', function ($detail) {
                return $detail->login ?? 'N/A';
            })
            ->editColumn('password', function ($detail) {
                return $detail->password ?? 'N/A';
            })
            ->editColumn('price', function ($detail) {
                return number_format($detail->price ?? 0, 0, ',', '.');
            })
            ->editColumn('created_at', function ($detail) {
                return $detail->created_at
                    ? $detail->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '-';
            })
            ->editColumn('updated_at', function ($detail) {
                return $detail->updated_at
                    ? $detail->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '-';
            })
            ->addColumn('action', function ($detail) {
                return ''; // Sesuaikan dengan aksi yang diinginkan (misalnya edit/hapus)
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getAllpackageBoostingTransaction()
    {
        $transactions = PackageOrderDetail::with(['transaction', 'boostingService'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->addColumn('transaction_number', function ($detail) {
                return $detail->transaction->transaction_number ?? '-';
            })
            ->addColumn('game', function ($detail) {
                return $detail->boostingService->game->name ?? 'N/A';
            })
            ->addColumn('boosting_service', function ($detail) {
                return $detail->boostingService->title ?? 'N/A';
            })
            ->editColumn('customer_name', function ($detail) {
                return $detail->customer_name ?? '-';
            })
            ->editColumn('customer_contact', function ($detail) {
                return $detail->customer_contact ?? '-';
            })
            ->editColumn('server', function ($detail) {
                return $detail->server ?? '-';
            })
            ->editColumn('login', function ($detail) {
                return $detail->login ?? '-';
            })
            ->editColumn('username', function ($detail) {
                return $detail->username ?? '-';
            })
            ->editColumn('password', function ($detail) {
                return $detail->password ?? '-';
            })
            ->editColumn('price', function ($detail) {
                return number_format($detail->price, 0, ',', '.');
            })
            ->editColumn('created_at', function ($detail) {
                return $detail->created_at
                    ? $detail->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '-';
            })
            ->editColumn('updated_at', function ($detail) {
                return $detail->updated_at
                    ? $detail->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '-';
            })
            ->addColumn('action', function ($transaction) {
                return '';
            })
            ->addColumn('payment_status', function ($detail) {
                return $detail->transaction->payment->midtrans_status ?? 'pending or failed';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function getAllGameAccountTransaction()
    {
        $transactions = AccountOrderDetail::with(['transaction', 'gameAccount.game'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->addColumn('transaction_number', function ($detail) {
                return $detail->transaction->transaction_number ?? '-';
            })
            ->editColumn('customer_name', function ($detail) {
                return $detail->customer_name ?? '-';
            })
            ->editColumn('customer_contact', function ($detail) {
                return $detail->customer_contact ?? '-';
            })
            ->addColumn('game_account_name', function ($detail) {
                return $detail->gameAccount->account_name ?? 'N/A';
            })
            ->addColumn('game_name', function ($detail) {
                return $detail->gameAccount->game->name ?? 'N/A';
            })
            ->editColumn('price', function ($detail) {
                // Menampilkan harga yang dibayar user
                return number_format($detail->price, 0, ',', '.');
            })
            ->editColumn('created_at', function ($detail) {
                return $detail->created_at
                    ? $detail->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '-';
            })
            ->editColumn('updated_at', function ($detail) {
                return $detail->updated_at
                    ? $detail->updated_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '-';
            })
            ->addColumn('action', function ($detail) {
                return view('dashboard.pages.transaction.action-button.game-account')->with('detail', $detail);
            })
            ->addColumn('payment_status', function ($detail) {
                return $detail->transaction->payment->midtrans_status ?? 'pending or failed';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
