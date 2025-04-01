@extends('dashboard.components.main')
@section('title')
    - Game Accounts
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
                <h1 class="mb-3 mb-md-0 fw-bold">Game Accounts Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <a href="{{ route('dashboard.game-account.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Game Account
                    </a>
                </div>
            </div>

            <!-- Game Accounts Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">All Game Accounts</h5>
                </div>
                <div class="table-container">
                    <table id="gameAccountTable" class="custom-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Game</th>
                                <th class="text-center">Account Name</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Account Age</th>
                                <th class="text-center">Original Price</th>
                                <th class="text-center">Sale Price</th>
                                <th class="text-center">Labels</th>
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
    <script src="{{ asset('assets/dashboard/js/game-account/index.js') }}"></script>
@endsection
