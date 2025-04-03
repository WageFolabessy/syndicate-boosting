<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\AccountOrderDetail;
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
                ->where('transactionable_type', AccountOrderDetail::class)
                ->with(['transactionable.gameAccount'])
                ->get();
        }

        return view('site-user.pages.transaksi', compact('transactions'));
    }
}
