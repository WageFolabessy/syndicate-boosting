@extends('dashboard.components.main')
@section('title')
    - Detail Custom Boosting
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('dashboard.custom-boosting-transaction') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Custom Boosting Transaction
                    </a>
                </div>
            </div>

            <!-- Detail Custom Boosting -->
            <div class="form-card">
                <div class="form-header">
                    <h5 class="mb-0">Detail Custom Boosting Information</h5>
                </div>
                <div class="form-container">
                    <div class="row g-4">
                        <div class="col-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <!-- Nomor Transaksi -->
                                        <tr>
                                            <th>Transaction Number</th>
                                            <td>{{ $custom->transaction->transaction_number ?? '-' }}</td>
                                        </tr>
                                        <!-- Status Pembayaran -->
                                        <tr
                                            class="{{ optional($custom->transaction->payment)->midtrans_status == 'settlement' ? 'table-success' : 'table-danger' }}">
                                            <th>Payment Status</th>
                                            <td>{{ ucfirst(optional($custom->transaction->payment)->midtrans_status ?? 'Pending or Failed') }}
                                            </td>
                                        </tr>
                                        <!-- Current Rank -->
                                        <tr>
                                            <th>Current Rank</th>
                                            <td>
                                                @if ($custom->currentGameRankCategory || $custom->currentGameRankTier || $custom->currentGameRankTierDetail)
                                                    {{ $custom->currentGameRankCategory->name ?? '-' }} -
                                                    {{ $custom->currentGameRankTier->tier ?? '-' }} -
                                                    {{ $custom->currentGameRankTierDetail->star_number ?? '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Desired Rank -->
                                        <tr>
                                            <th>Desired Rank</th>
                                            <td>
                                                @if ($custom->desiredGameRankCategory || $custom->desiredGameRankTier || $custom->desiredGameRankTierDetail)
                                                    {{ $custom->desiredGameRankCategory->name ?? '-' }} -
                                                    {{ $custom->desiredGameRankTier->tier ?? '-' }} -
                                                    {{ $custom->desiredGameRankTierDetail->star_number ?? '-' }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Informasi Pelanggan -->
                                        <tr>
                                            <th>Customer Name</th>
                                            <td>{{ $custom->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Customer Contact</th>
                                            <td>{{ $custom->customer_contact }}</td>
                                        </tr>
                                        <!-- Harga -->
                                        <tr>
                                            <th>Price</th>
                                            <td>{{ number_format($custom->price, 0, ',', '.') }}</td>
                                        </tr>
                                        <!-- Server & Login -->
                                        <tr>
                                            <th>Server</th>
                                            <td>{{ $custom->server ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Login</th>
                                            <td>{{ $custom->login ?? '-' }}</td>
                                        </tr>
                                        <!-- Username -->
                                        <tr>
                                            <th>Username</th>
                                            <td>{{ $custom->username }}</td>
                                        </tr>
                                        <!-- Password dengan Toggle -->
                                        <tr>
                                            <th>Password</th>
                                            <td>
                                                <span id="passwordText"
                                                    data-password="{{ $custom->password }}">******</span>
                                                <button type="button" id="togglePasswordBtn"
                                                    class="btn btn-sm btn-outline-secondary ms-2"
                                                    onclick="togglePassword()">
                                                    Show
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Note -->
                                        <tr>
                                            <th>Note</th>
                                            <td>{{ $custom->note ?? '-' }}</td>
                                        </tr>
                                        <!-- Tanggal Dibuat -->
                                        <tr>
                                            <th>Created At</th>
                                            <td>
                                                {{ $custom->created_at ? $custom->created_at->locale('id')->translatedFormat('l, d F Y, H:i:s') : '-' }}
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
