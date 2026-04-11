@extends('dashboard.components.main')
@section('title')
    - All Transactions
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables/datatables.min.css') }}">
    <style>
        .status-failed {
            background-color: #f8d7da;
            /* background merah muda */
        }

        .status-pending {
            background-color: #fff3cd;
            /* background kuning muda */
        }

        .status-success {
            background-color: #d6efe3;
            /* background kuning muda */
        }
    </style>
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                <h1 class="mb-3 mb-md-0 fw-bold">All Transactions Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard.all-transaction.export') }}" class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </a>
                </div>
            </div>

            <!-- All Transactions Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">All Transactions</h5>
                </div>

                <!-- Filter Bulan & Tahun -->
                <div class="d-flex flex-wrap align-items-end gap-3 px-3 pt-3">
                    <div>
                        <label class="form-label fw-semibold mb-1">Month</label>
                        <select id="filterMonth" class="form-select form-select-sm" style="min-width:140px;">
                            <option value="">-- All Month --</option>
                            @foreach(['January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12] as $label => $num)
                                <option value="{{ $num }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label fw-semibold mb-1">Tahun</label>
                        <select id="filterYear" class="form-select form-select-sm" style="min-width:110px;">
                            <option value="">-- Semua Tahun --</option>
                            @for($y = now()->year; $y >= 2024; $y--)
                                <option value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <button id="btnResetFilter" class="btn btn-outline-secondary btn-sm">Reset</button>
                    </div>
                </div>

                <div class="table-container">
                    <table id="allTransactionTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Transaction Number</th>
                                <th class="text-center">Transaction Status</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Order Type</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Customer Contact</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <!-- jQuery -->
    <script src="{{ asset('assets/dashboard/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/transaction/all-transaction.js') }}"></script>
@endsection
