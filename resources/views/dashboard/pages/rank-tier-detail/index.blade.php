@extends('dashboard.components.main')
@section('title')
    - Rank Tier Detail
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables/datatables.min.css') }}">
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
                <h1 class="mb-3 mb-md-0 fw-bold">Rank Tier Details Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('dashboard.rank-tier-detail.export') }}" class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </a>
                    <a href="{{ route('dashboard.rank-tier-detail.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Rank Tier Detail
                    </a>
                </div>
            </div>

            <!-- Rank Tier Details Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">All Rank Tier Details</h5>
                </div>
                <div class="table-container">
                    <table id="rankTierDetailTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Game Name</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Tier</th>
                                <th class="text-center">Star Number</th>
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
    <script src="{{ asset('assets/dashboard/js/rank-tier-detail/index.js') }}"></script>
@endsection
