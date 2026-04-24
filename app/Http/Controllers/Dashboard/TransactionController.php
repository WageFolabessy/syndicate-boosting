<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\AllTransactionExport;
use App\Exports\CustomBoostingTransactionExport;
use App\Exports\GameAccountTransactionExport;
use App\Exports\PackageBoostingTransactionExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStatusCustomOrderRequest;
use App\Http\Requests\UpdateStatusPackageOrderRequest;
use App\Models\AccountOrderDetail;
use App\Models\CustomOrderDetail;
use App\Models\PackageOrderDetail;
use App\Models\Transaction;
use App\Services\OrderNotificationService;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function __construct(private readonly OrderNotificationService $notificationService)
    {
    }

    public function getAllTransactions()
    {
        $month = request('month');
        $year  = request('year');
        $progressStatus = request('progress_status');

        $transactions = Transaction::with('transactionable')
            ->when($month, fn($q) => $q->whereMonth('created_at', $month))
            ->when($year,  fn($q) => $q->whereYear('created_at',  $year))
            ->when($progressStatus, function ($query) use ($progressStatus) {
                $query->where(function ($progressQuery) use ($progressStatus) {
                    $progressQuery
                        ->where(function ($accountOrderQuery) use ($progressStatus) {
                            $accountOrderQuery
                                ->where('transactionable_type', AccountOrderDetail::class)
                                ->where('status', $progressStatus);
                        })
                        ->orWhereHasMorph(
                            'transactionable',
                            [PackageOrderDetail::class, CustomOrderDetail::class],
                            fn($morphQuery) => $morphQuery->where('status', $progressStatus)
                        );
                });
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->editColumn('transaction_number', function ($transaction) {
                return $transaction->transaction_number;
            })
            ->editColumn('order_type', function ($transaction) {
                if (class_basename($transaction->transactionable) == 'CustomOrderDetail') {
                    return 'CustomOrder';
                }
                if (class_basename($transaction->transactionable) == 'PackageOrderDetail') {
                    return 'PackageOrder';
                }
                if (class_basename($transaction->transactionable) == 'AccountOrderDetail') {
                    return 'AccountOrder';
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
            ->addColumn('action', function ($detail) {
                return view('dashboard.pages.transaction.action-button.all-transaction')->with('detail', $detail);
            })
            ->addColumn('payment_status', function ($transaction) {
                $status = $transaction->payment
                    ? $transaction->payment->midtrans_status
                    : 'pending';

                $statusClass = match ($status) {
                    'settlement' => 'success',
                    'pending' => 'warning',
                    'expire' => 'secondary',
                    'deny', 'cancel' => 'danger',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('progress_status', function ($transaction) {
                $status = match ($transaction->transactionable_type) {
                    AccountOrderDetail::class => $transaction->status ?? 'pending',
                    PackageOrderDetail::class, CustomOrderDetail::class => $transaction->transactionable->status ?? 'pending',
                    default => 'pending',
                };

                $statusClass = match ($status) {
                    'success' => 'success',
                    'failed' => 'danger',
                    'canceled' => 'secondary',
                    'pending' => 'warning',
                    'processed' => 'info',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->rawColumns(['action', 'payment_status', 'progress_status'])
            ->make(true);
    }

    public function getAllCustomBoostingTransaction()
    {
        $month = request('month');
        $year  = request('year');
        $progressStatus = request('progress_status');

        $transactions = CustomOrderDetail::with([
            'transaction',
            'currentGameRankCategory',
            'currentGameRankTier',
            'currentGameRankTierDetail',
            'desiredGameRankCategory',
            'desiredGameRankTier',
            'desiredGameRankTierDetail',
        ])
            ->when($month, fn($q) => $q->whereMonth('created_at', $month))
            ->when($year,  fn($q) => $q->whereYear('created_at',  $year))
            ->when($progressStatus, fn($q) => $q->where('custom_order_details.status', $progressStatus))
            ->orderBy('updated_at', 'desc')
            ->get();

        return DataTables::of($transactions)
            ->addIndexColumn()
            ->addColumn('transaction_number', function ($detail) {
                return $detail->transaction->transaction_number ?? 'N/A';
            })
            ->addColumn('payment_status', function ($detail) {
                $status = $detail->transaction->payment
                    ? $detail->transaction->payment->midtrans_status
                    : 'pending';

                $statusClass = match ($status) {
                    'settlement' => 'success',
                    'pending' => 'warning',
                    'expire' => 'secondary',
                    'deny', 'cancel' => 'danger',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('transaction_status', function ($detail) {
                $status = $detail->transaction->status ?? 'pending';

                $statusClass = match ($status) {
                    'success' => 'success',
                    'failed' => 'danger',
                    'canceled' => 'secondary',
                    'pending' => 'warning',
                    'processed' => 'info',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('progress_status', function ($detail) {
                $status = $detail->status ?? 'pending';

                $statusClass = match ($status) {
                    'success' => 'success',
                    'failed' => 'danger',
                    'canceled' => 'secondary',
                    'pending' => 'warning',
                    'processed' => 'info',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('game', function ($detail) {
                // Misal ambil nama game dari kategori current (atau desired, tergantung logika)
                return $detail->currentGameRankCategory->game->name ?? 'N/A';
            })
            ->addColumn('current_rank', function ($detail) {
                $category = $detail->currentGameRankCategory->name ?? '-';
                $tier = $detail->currentGameRankTier->tier ?? '-';
                $star = $detail->currentGameRankTierDetail->star_number ?? '-';

                return "{$category} - {$tier} ({$star})";
            })
            ->addColumn('desired_rank', function ($detail) {
                $category = $detail->desiredGameRankCategory->name ?? '-';
                $tier = $detail->desiredGameRankTier->tier ?? '-';
                $star = $detail->desiredGameRankTierDetail->star_number ?? '-';

                return "{$category} - {$tier} ({$star})";
            })
            ->editColumn('customer_name', function ($detail) {
                return $detail->customer_name ?? 'N/A';
            })
            ->editColumn('customer_contact', function ($detail) {
                return $detail->customer_contact ?? 'N/A';
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
                return view('dashboard.pages.transaction.action-button.custom-boosting')->with('detail', $detail);
            })
            ->rawColumns(['action', 'payment_status', 'transaction_status', 'progress_status'])
            ->make(true);
    }

    public function getAllpackageBoostingTransaction()
    {
        $month = request('month');
        $year  = request('year');
        $progressStatus = request('progress_status');

        $transactions = PackageOrderDetail::with(['transaction', 'boostingService'])
            ->when($month, fn($q) => $q->whereMonth('created_at', $month))
            ->when($year,  fn($q) => $q->whereYear('created_at',  $year))
            ->when($progressStatus, fn($q) => $q->where('package_order_details.status', $progressStatus))
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
            ->addColumn('action', function ($detail) {
                return view('dashboard.pages.transaction.action-button.package-boosting')->with('detail', $detail);
            })
            ->addColumn('payment_status', function ($detail) {
                $status = $detail->transaction->payment
                    ? $detail->transaction->payment->midtrans_status
                    : 'pending';

                $statusClass = match ($status) {
                    'settlement' => 'success',
                    'pending' => 'warning',
                    'expire' => 'secondary',
                    'deny', 'cancel' => 'danger',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('transaction_status', function ($detail) {
                $status = $detail->transaction->status ?? 'pending';

                $statusClass = match ($status) {
                    'success' => 'success',
                    'failed' => 'danger',
                    'canceled' => 'secondary',
                    'pending' => 'warning',
                    'processed' => 'info',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('progress_status', function ($detail) {
                $status = $detail->status ?? 'pending';

                $statusClass = match ($status) {
                    'success' => 'success',
                    'failed' => 'danger',
                    'canceled' => 'secondary',
                    'pending' => 'warning',
                    'processed' => 'info',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->rawColumns(['action', 'payment_status', 'transaction_status', 'progress_status'])
            ->make(true);
    }

    public function getAllGameAccountTransaction()
    {
        $month = request('month');
        $year  = request('year');
        $progressStatus = request('progress_status');

        $transactions = AccountOrderDetail::with(['transaction', 'gameAccount.game'])
            ->when($month, fn($q) => $q->whereMonth('created_at', $month))
            ->when($year,  fn($q) => $q->whereYear('created_at',  $year))
            ->when(
                $progressStatus,
                fn($q) => $q->whereHas('transaction', fn($query) => $query->where('transactions.status', $progressStatus))
            )
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
            ->addColumn('payment_status', function ($detail) {
                $status = $detail->transaction->payment
                    ? $detail->transaction->payment->midtrans_status
                    : 'pending';

                $statusClass = match ($status) {
                    'settlement' => 'success',
                    'pending' => 'warning',
                    'expire' => 'secondary',
                    'deny', 'cancel' => 'danger',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('progress_status', function ($detail) {
                $status = $detail->transaction->status ?? 'pending';

                $statusClass = match ($status) {
                    'success' => 'success',
                    'failed' => 'danger',
                    'canceled' => 'secondary',
                    'pending' => 'warning',
                    'processed' => 'info',
                    default => 'light text-dark'
                };

                $statusLabel = ucfirst($status);

                return '<span class="badge bg-' . $statusClass . '">' . $statusLabel . '</span>';
            })
            ->addColumn('action', function ($detail) {
                return view('dashboard.pages.transaction.action-button.game-account')->with('detail', $detail);
            })
            ->rawColumns(['action', 'payment_status', 'progress_status'])
            ->make(true);
    }

    public function showPackageBoostingOrder(PackageOrderDetail $package)
    {
        return view('dashboard.pages.transaction.detail.package-boosting', compact('package'));
    }

    public function showCustomBoostingOrder(CustomOrderDetail $custom)
    {
        return view('dashboard.pages.transaction.detail.custom-boosting', compact('custom'));
    }

    public function updatePackageBoostingOrder(UpdateStatusPackageOrderRequest $request, PackageOrderDetail $package)
    {
        $data = $request->validated();
        $previousStatus = $package->status;

        if ($package->update($data)) {
            if (($data['status'] ?? null) && $previousStatus !== $data['status']) {
                $package->refresh();
                $this->notificationService->queueProgressUpdate(
                    transactionNumber: $package->transaction?->transaction_number ?? '',
                    customerName: $package->customer_name,
                    customerEmail: $package->customer_email,
                    progressStatus: $package->status,
                    orderType: 'Package Boosting',
                );
            }

            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }

    public function updateCustomBoostingOrder(UpdateStatusCustomOrderRequest $request, CustomOrderDetail $custom)
    {
        $data = $request->validated();
        $previousStatus = $custom->status;

        if ($custom->update($data)) {
            if (($data['status'] ?? null) && $previousStatus !== $data['status']) {
                $custom->refresh();
                $this->notificationService->queueProgressUpdate(
                    transactionNumber: $custom->transaction?->transaction_number ?? '',
                    customerName: $custom->customer_name,
                    customerEmail: $custom->customer_email,
                    progressStatus: $custom->status,
                    orderType: 'Custom Boosting',
                );
            }

            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }

    public function allTransactionExport()
    {
        return Excel::download(new AllTransactionExport, 'all transaction managements.xlsx');
    }

    public function customBoostingTransactionExport()
    {
        return Excel::download(new CustomBoostingTransactionExport, 'custom boosting transaction managements.xlsx');
    }

    public function packageBoostingTransactionExport()
    {
        return Excel::download(new PackageBoostingTransactionExport, 'package boosting transaction managements.xlsx');
    }

    public function gameAccountTransactionExport()
    {
        return Excel::download(new GameAccountTransactionExport, 'game account transaction managements.xlsx');
    }

    /**
     * Lightweight polling endpoint for real-time new-order detection.
     * Returns the latest transaction id + number so the frontend can compare
     * against the last-seen value stored in localStorage.
     */
    public function getLatestOrderId()
    {
        $latest = Transaction::latest('id')->first();

        return response()->json([
            'latest_id'          => $latest?->id ?? 0,
            'transaction_number' => $latest?->transaction_number ?? null,
        ]);
    }
}
