@extends('dashboard.components.main')
@section('title')
    - Detail Package Boosting
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('dashboard.package-boosting-transaction') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Package Boosting Transaction
                    </a>
                </div>
            </div>

            <!-- Detail Package Boosting -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Detail Package Boosting Information</h5>
                </div>
                <div class="form-container">
                    <div class="row g-4">
                        <div class="col-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Transaction Number</th>
                                            <td>{{ $package->transaction->transaction_number ?? '-' }}</td>
                                        </tr>
                                        <tr
                                            class="{{ optional($package->transaction->payment)->midtrans_status == 'settlement' ? 'table-success' : 'table-danger' }}">
                                            <th>Payment Status</th>
                                            <td>{{ ucfirst(optional($package->transaction->payment)->midtrans_status ?? 'Pending or Failed') }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Game</th>
                                            <td>{{ $package->boostingService->game->name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Boosting Service</th>
                                            <td>{{ $package->boostingService->title ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Customer Name</th>
                                            <td>{{ $package->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Customer Contact</th>
                                            <td>{{ $package->customer_contact }}</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>{{ number_format($package->price, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Server</th>
                                            <td>{{ $package->server ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Login</th>
                                            <td>{{ $package->login ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{ $package->username }}</td>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td>
                                                <span id="passwordText"
                                                    data-password="{{ $package->password }}">******</span>
                                                <button type="button" id="togglePasswordBtn"
                                                    class="btn btn-sm btn-outline-secondary ms-2"
                                                    onclick="togglePassword()">
                                                    Show
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Note</th>
                                            <td>{{ $package->note ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>
                                                {{ $package->created_at ? $package->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s') : '' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
@section('script')
    <script>
        function togglePassword() {
            const passText = document.getElementById('passwordText');
            const toggleBtn = document.getElementById('togglePasswordBtn');
            if (passText.textContent === '******') {
                passText.textContent = passText.getAttribute('data-password');
                toggleBtn.textContent = 'Hide';
            } else {
                passText.textContent = '******';
                toggleBtn.textContent = 'Show';
            }
        }
    </script>
@endsection
