<?php

namespace App\Http\Controllers\SiteUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddReviewRequest;
use App\Models\Review;
use App\Services\TransactionSequentialSearchService;
use Illuminate\Http\Request;

class TransactionPageController extends Controller
{
    public function __construct(private readonly TransactionSequentialSearchService $sequentialSearchService)
    {
    }

    public function index(Request $request)
    {
        $transactions = [];

        if ($request->has('search') && $request->search != '') {
            $transactions = $this->sequentialSearchService->searchByTransactionNumber($request->search);
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
