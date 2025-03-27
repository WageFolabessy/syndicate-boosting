@extends('dashboard.components.main')
@section('title')
    - Boosting Services
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
                <h1 class="mb-3 mb-md-0 fw-bold">Boosting Services Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <a href="{{ route('dashboard.boosting-service.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Boosting Service
                    </a>
                </div>
            </div>

            <!-- Boosting Services Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">All Boosting Services</h5>
                </div>
                <div class="table-container">
                    <table id="boostingServiceTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Service Type</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Original Price</th>
                                <th class="text-center">Sale Price</th>
                                <th class="text-center">Game Name</th>
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
    <script src="{{ asset('assets/dashboard/js/boosting-service/index.js') }}"></script>
@endsection
