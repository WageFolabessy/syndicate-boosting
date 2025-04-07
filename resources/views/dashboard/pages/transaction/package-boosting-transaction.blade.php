@extends('dashboard.components.main')
@section('title')
    - Package Boosting Transactions
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables/datatables.min.css') }}">
    <style>
        .status-failed {
            background-color: #f8d7da;
        }

        .status-pending {
            background-color: #fff3cd;
        }

        .status-success {
            background-color: #d6efe3;
        }

        .status-badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.875rem;
            font-weight: 600;
            color: #fff;
            border-radius: 0.5rem;
            text-align: center;
            min-width: 80px;
            text-transform: capitalize;
        }

        .status-badge.success {
            background-color: #28a745;
            color: #212529;
        }

        .status-badge.failed {
            background-color: #dc3545;
        }

        .status-badge.canceled {
            background-color: #6c757d;
        }

        .status-badge.pending {
            background-color: #ffc107;
            color: #212529;
        }

        .status-badge.processed {
            background-color: #17a2b8;
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
                <h1 class="mb-3 mb-md-0 fw-bold">Package Boosting Transactions Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard.package-boosting-transaction.export') }}" class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </a>
                </div>
            </div>

            <!-- Package Boosting Transactions Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">Package Boosting Transactions</h5>
                </div>
                <div class="table-container">
                    <table id="packageBoostingTransactionTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Transaction Number</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Game</th>
                                <th class="text-center">Boosting Service</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Customer Contact</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Progress Status</th>
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
    <script src="{{ asset('assets/dashboard/js/transaction/package-boosting-transaction.js') }}"></script>
@endsection
