@extends('dashboard.components.main')
@section('title')
    - Reviews
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables/datatables.min.css') }}">
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                <h1 class="mb-3 mb-md-0 fw-bold">Reviews Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard.review.export') }}" class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </a>
                </div>
            </div>

            <!-- Reviews Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">All Reviews</h5>
                </div>
                <div class="table-container">
                    <table id="reviewTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Transaction Number</th>
                                <th class="text-center">Transaction Type</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Created At</th>
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
    <script src="{{ asset('assets/dashboard/js/review/index.js') }}"></script>
@endsection
