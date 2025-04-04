<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AccountOrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function getAllPayments()
    {
        $payments = Payment::with(['transaction.transactionable'])
            ->orderBy('created_at', 'desc');

        return DataTables::of($payments)
            ->addIndexColumn()
            ->addColumn('transaction_number', function ($payment) {
                return $payment->transaction->transaction_number ?? '-';
            })
            ->addColumn('transaction_type', function ($payment) {
                if(class_basename($payment->transaction->transactionable) == "AccountOrderDetail"){
                    return 'Account Order';
                }
                if(class_basename($payment->transaction->transactionable) == "CustomOrderDetail"){
                    return 'Custom Boosting Order';
                } 
                if(class_basename($payment->transaction->transactionable) == "PackageOrderDetail"){
                    return 'Package Boosting Order';
                } 
            })
            ->editColumn('midtrans_status', function ($payment) {
                return ucfirst(str_replace('_', ' ', $payment->midtrans_status));
            })
            ->editColumn('created_at', function ($payment) {
                return $payment->created_at->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function ($payment) {
                return $payment->updated_at->format('d-m-Y H:i:s');
            })
            ->addColumn('action', function ($payment) {
                return '<a href="#" class="btn btn-sm btn-primary">Detail</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
