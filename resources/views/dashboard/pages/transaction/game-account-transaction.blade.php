@extends('dashboard.components.main')
@section('title')
    - Game Account Transactions
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
                <h1 class="mb-3 mb-md-0 fw-bold">Game Account Transactions Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard.boosting-service.export') }}" class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </a>
                </div>
            </div>

            <!-- Game Account Transactions Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">Game Account Transactions</h5>
                </div>
                <div class="table-container">
                    <table id="gameAccountTransactionTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Transaction Number</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Customer Contact</th>
                                <th class="text-center">Game Account</th>
                                <th class="text-center">Game Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Updated At</th>
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
    <script src="{{ asset('assets/dashboard/js/transaction/game-account-transaction.js') }}"></script>
@endsection
