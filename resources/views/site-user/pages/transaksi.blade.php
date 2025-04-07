@extends('site-user.components.main')
@section('meta')
    <meta name="description"
        content="Lihat riwayat transaksi boosting game Anda di Syndicate. Temukan detail order, tanggal transaksi, status, dan nominal dengan mudah." />
    <meta name="keywords" content="transaksi, riwayat transaksi, game boosting, joki game, boosting game, order history" />
    <meta name="author" content="Syndicate" />
    <link rel="canonical" href="https://syndicate-gaming.com/transaksi.html" />
    <meta property="og:title" content="Riwayat Transaksi Boosting Game - Syndicate" />
    <meta property="og:description"
        content="Cek dan cari riwayat transaksi boosting game Anda dengan mudah di Syndicate." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/transaksi.html" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Transaksi
@endsection

@section('css')
    <style>
        .search-sort-bar .form-control {
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            border: 2px solid rgba(13, 110, 253, 0.2);
            transition: all 0.3s ease;
        }

        .search-sort-bar .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
        }

        .transaction-results table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .star-rating {
            direction: rtl;
            display: inline-block;
            font-size: 2rem;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            font-size: 2rem;
            padding: 0 0.1rem;
            cursor: pointer;
        }

        .star-rating input[type="radio"]:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
        }
    </style>
@endsection

@section('content')
    <main>
        <section class="page-header py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="section-tag">Transaksi</span>
                        <h1>Cari Transaksi</h1>
                        <p class="lead">Cari riwayat transaksi Anda dengan mudah</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="transaction-listing py-5">
            <div class="container">
                @if (request('search'))
                    <div class="alert alert-success">
                        Catat nomor transaksi Anda: <strong>{{ request('search') }}</strong>
                    </div>
                @endif

                <!-- Search Bar -->
                <div class="search-sort-bar mb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <form action="{{ route('transaksi') }}" method="GET">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Masukan nomor transaksi Anda..." value="{{ request('search') }}">
                            </form>
                        </div>
                    </div>
                </div>

                @if (request('search'))
                    <div class="transaction-results">
                        @if ($transactions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nomor Transaksi</th>
                                            <th>Status Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Progress Pekerjaan</th>
                                            <th>Detail Transaksi</th>
                                            <th>Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            @php
                                                $orderDetail = $transaction->transactionable;
                                                $transactionType = class_basename($transaction->transactionable_type);
                                            @endphp
                                            <tr>
                                                <td>{{ $transaction->transaction_number }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $transaction->status == 'success' ? 'success' : 'warning' }}">
                                                        {{ ucfirst($transaction->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                                                <td>
                                                    @if (in_array($transactionType, ['PackageOrderDetail', 'CustomOrderDetail']))
                                                        @php
                                                            $progressStatus = $orderDetail->status ?? null;
                                                        @endphp
                                                        @if ($progressStatus)
                                                            @switch($progressStatus)
                                                                @case('failed')
                                                                    <span class="badge bg-danger">Gagal</span>
                                                                @break

                                                                @case('canceled')
                                                                    <span class="badge bg-secondary">Dibatalkan</span>
                                                                @break

                                                                @case('pending')
                                                                    <span class="badge bg-warning">Belum dikerjakan</span>
                                                                @break

                                                                @case('processed')
                                                                    <span class="badge bg-info">Sedang dikerjakan</span>
                                                                @break

                                                                @case('success')
                                                                    <span class="badge bg-success">Selesai</span>
                                                                @break

                                                                @default
                                                                    <span class="badge bg-light text-dark">-</span>
                                                            @endswitch
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transactionType == 'AccountOrderDetail')
                                                        @php
                                                            $gameAccount = $orderDetail->gameAccount;
                                                        @endphp
                                                        @if ($gameAccount)
                                                            <ul class="list-unstyled mb-0">
                                                                <li><strong>{{ $gameAccount->account_name }}</strong></li>
                                                                <li>Game: {{ $gameAccount->game->name ?? '-' }}</li>
                                                                <li>
                                                                    ID Akun:
                                                                    <span
                                                                        id="username-{{ $transaction->id }}">********</span>
                                                                    <i class="fa fa-eye"
                                                                        style="cursor: pointer; margin-left: 5px;"
                                                                        onclick="toggleVisibility('username-{{ $transaction->id }}', '{{ $gameAccount->username }}', this)"></i>
                                                                </li>
                                                                <li>
                                                                    Password Akun:
                                                                    <span
                                                                        id="password-{{ $transaction->id }}">********</span>
                                                                    <i class="fa fa-eye"
                                                                        style="cursor: pointer; margin-left: 5px;"
                                                                        onclick="toggleVisibility('password-{{ $transaction->id }}', '{{ $gameAccount->password }}', this)"></i>
                                                                </li>
                                                                <li>Harga: Rp
                                                                    {{ number_format($orderDetail->price, 0, ',', '.') }}
                                                                </li>
                                                                <li>Deskirpsi:
                                                                    {{ $gameAccount->game->description ?? '-' }}
                                                                </li>
                                                            </ul>
                                                        @else
                                                            <span class="text-muted">Data akun tidak tersedia.</span>
                                                        @endif
                                                    @elseif ($transactionType == 'PackageOrderDetail')
                                                        @php
                                                            $boostingService = $orderDetail->boostingService;
                                                        @endphp
                                                        @if ($boostingService)
                                                            <ul class="list-unstyled mb-0">
                                                                <li><strong>{{ $boostingService->title }}</strong></li>
                                                                <li>Game: {{ $boostingService->game->name ?? '-' }}</li>
                                                                <li>Harga: Rp
                                                                    {{ number_format($orderDetail->price, 0, ',', '.') }}
                                                                </li>
                                                                <li>Server: {{ $orderDetail->server ?? '-' }}</li>
                                                                <li>Login: {{ $orderDetail->login ?? '-' }}</li>
                                                            </ul>
                                                        @else
                                                            <span class="text-muted">Data boosting tidak tersedia.</span>
                                                        @endif
                                                    @elseif ($transactionType == 'CustomOrderDetail')
                                                        <ul class="list-unstyled mb-0">
                                                            <li><strong>Custom Boosting Order</strong></li>
                                                            <li>Customer: {{ $orderDetail->customer_name }}</li>
                                                            <li>
                                                                Current Rank:
                                                                @if (
                                                                    $orderDetail->currentGameRankCategory ||
                                                                        $orderDetail->currentGameRankTier ||
                                                                        $orderDetail->currentGameRankTierDetail)
                                                                    {{ $orderDetail->currentGameRankCategory->name ?? '-' }}
                                                                    -
                                                                    {{ $orderDetail->currentGameRankTier->tier ?? '-' }} -
                                                                    {{ $orderDetail->currentGameRankTierDetail->star_number ?? '-' }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </li>
                                                            <li>
                                                                Desired Rank:
                                                                @if (
                                                                    $orderDetail->desiredGameRankCategory ||
                                                                        $orderDetail->desiredGameRankTier ||
                                                                        $orderDetail->desiredGameRankTierDetail)
                                                                    {{ $orderDetail->desiredGameRankCategory->name ?? '-' }}
                                                                    -
                                                                    {{ $orderDetail->desiredGameRankTier->tier ?? '-' }} -
                                                                    {{ $orderDetail->desiredGameRankTierDetail->star_number ?? '-' }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </li>
                                                            <li>Harga: Rp
                                                                {{ number_format($orderDetail->price, 0, ',', '.') }}</li>
                                                        </ul>
                                                    @else
                                                        <span class="text-muted">Tipe transaksi tidak dikenal.</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($transaction->status == 'success')
                                                        @if ($transaction->review)
                                                            <!-- Tampilkan review jika sudah ada -->
                                                            <div class="review-display">
                                                                <div class="star-rating" style="direction: ltr;">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $transaction->review->rating)
                                                                            <span style="color: #ffc107;">&#9733;</span>
                                                                        @else
                                                                            <span style="color: #ddd;">&#9733;</span>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                                <p>{{ $transaction->review->comment }}</p>
                                                            </div>
                                                        @else
                                                            <!-- Tombol toggle form review -->
                                                            <button class="btn btn-sm btn-primary review-toggle-btn"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#reviewForm-{{ $transaction->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="reviewForm-{{ $transaction->id }}">
                                                                Beri Review
                                                            </button>
                                                            <div class="collapse mt-2 {{ $errors->has('rating') || $errors->has('comment') ? 'show' : '' }}"
                                                                id="reviewForm-{{ $transaction->id }}">
                                                                <form action="{{ route('review.store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="transaction_id"
                                                                        value="{{ $transaction->id }}">

                                                                    <div class="star-rating" style="direction: rtl;">
                                                                        @for ($i = 5; $i >= 1; $i--)
                                                                            <input type="radio"
                                                                                id="star{{ $i }}-{{ $transaction->id }}"
                                                                                name="rating" value="{{ $i }}"
                                                                                {{ old('rating') == $i ? 'checked' : '' }}>
                                                                            <label
                                                                                for="star{{ $i }}-{{ $transaction->id }}">&#9733;</label>
                                                                        @endfor
                                                                    </div>
                                                                    @error('rating')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror

                                                                    <div class="mb-2 mt-2">
                                                                        <textarea name="comment" class="form-control" rows="2" placeholder="Tulis komentar review...">{{ old('comment') }}</textarea>
                                                                    </div>
                                                                    @error('comment')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror

                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-success">Kirim Review</button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-center">Transaksi dengan nomor <strong>{{ request('search') }}</strong> tidak
                                ditemukan.</p>
                        @endif
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var reviewToggleButtons = document.querySelectorAll('.review-toggle-btn');

            reviewToggleButtons.forEach(function(button) {
                var targetSelector = button.getAttribute('data-bs-target');
                var collapseEl = document.querySelector(targetSelector);

                collapseEl.addEventListener('shown.bs.collapse', function() {
                    button.textContent = 'Tutup Review';
                });
                collapseEl.addEventListener('hidden.bs.collapse', function() {
                    button.textContent = 'Beri Review';
                });
            });
        });

        function toggleVisibility(elementId, realText, iconEl) {
            var spanEl = document.getElementById(elementId);
            if (spanEl.getAttribute('data-visible') === 'true') {
                // Sembunyikan data
                spanEl.textContent = '********';
                spanEl.setAttribute('data-visible', 'false');
                iconEl.classList.remove('fa-eye-slash');
                iconEl.classList.add('fa-eye');
            } else {
                // Tampilkan data asli
                spanEl.textContent = realText;
                spanEl.setAttribute('data-visible', 'true');
                iconEl.classList.remove('fa-eye');
                iconEl.classList.add('fa-eye-slash');
            }
        }
    </script>
@endsection
