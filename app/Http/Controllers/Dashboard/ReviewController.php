<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::join('transactions', 'reviews.transaction_id', '=', 'transactions.id')
            ->orderBy('reviews.created_at', 'desc')
            ->select('reviews.*', 'transactions.transaction_number');

        return DataTables::of($reviews)
            ->addIndexColumn()
            ->editColumn('transaction_number', function ($review) {
                return $review->transaction_number ?? '';
            })
            ->editColumn('transaction_id', function ($review) {
                if ($review->transaction) {
                    if (class_basename($review->transaction->transactionable) == "AccountOrderDetail") {
                        return 'Account Order';
                    }
                    if (class_basename($review->transaction->transactionable) == "CustomOrderDetail") {
                        return 'Custom Boosting Order';
                    }
                    if (class_basename($review->transaction->transactionable) == "PackageOrderDetail") {
                        return 'Package Boosting Order';
                    }
                }
                return '';
            })
            ->editColumn('created_at', function ($review) {
                return $review->created_at
                    ? $review->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s')
                    : '';
            })
            ->make(true);
    }
}
