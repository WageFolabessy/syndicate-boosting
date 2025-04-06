@extends('dashboard.components.main')
@section('title')
    - Detail Payment
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('dashboard.payment') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Payments
                    </a>
                </div>
            </div>

            <!-- Detail Payment -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Detail Payment Information</h5>
                </div>
                <div class="form-container">
                    <div class="row g-4">
                        <div class="col-12 col-md-12">
                            <div class="table-responsive">

                                @if ($data)
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $value)
                                                <tr>
                                                    <td>{{ ucfirst($key) }}</td>
                                                    <td>
                                                        @if (is_array($value))
                                                            <pre>{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                                                        @else
                                                            {{ $value }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-muted">Tidak ada data payload yang tersedia.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-footer d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary"
                            onclick="window.history.back();">Cancel</button>
                    </div>
                </div>
            </div>
    </main>
@endsection
