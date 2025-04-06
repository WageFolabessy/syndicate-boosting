<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddReviewRequest;
use App\Models\AccountOrderDetail;
use App\Models\CustomOrderDetail;
use App\Models\PackageOrderDetail;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionPageController extends Controller
{
    public function index(Request $request)
    {
        $transactions = [];

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $transactions = Transaction::where('transaction_number', $search)
                ->whereIn('transactionable_type', [
                    AccountOrderDetail::class,
                    PackageOrderDetail::class,
                    CustomOrderDetail::class,
                ])
                ->with([
                    'transactionable' => function ($morphTo) {
                        $morphTo->morphWith([
                            AccountOrderDetail::class => ['gameAccount'],
                            PackageOrderDetail::class => ['boostingService'],
                            CustomOrderDetail::class => []
                        ]);
                    }
                ])
                ->get();
        }

        return view('site-user.pages.transaksi', compact('transactions'));
    }

    public function storeReview(AddReviewRequest $request)
    {
        $data = $request->validated();
        Review::create($data);
        return redirect()->back()->with('success', 'Review berhasil dikirim.');
    }
}
