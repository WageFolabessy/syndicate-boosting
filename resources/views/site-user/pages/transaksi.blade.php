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
    </style>
@endsection

@section('content')
    <main>
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <span class="section-tag">Transaksi</span>
                        <h1>Cari Transaksi</h1>
                        <p class="lead">Cari riwayat transaksi Anda dengan mudah</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="transaction-listing py-5">
            <div class="container">
                <!-- Flash Message dari query search -->
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor Transaksi</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal</th>
                                        <th>Progress Pekerjaan</th>
                                        <th>Detail Transaksi</th>
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
                                                            <li>Level: {{ $gameAccount->level ?? '-' }}</li>
                                                            <li>Usia Akun: {{ $gameAccount->account_age ?? '-' }}</li>
                                                            <li>Harga: Rp
                                                                {{ number_format($orderDetail->price, 0, ',', '.') }}</li>
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
                                                                {{ number_format($orderDetail->price, 0, ',', '.') }}</li>
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
                                                                {{ $orderDetail->currentGameRankCategory->name ?? '-' }} -
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
                                                                {{ $orderDetail->desiredGameRankCategory->name ?? '-' }} -
                                                                {{ $orderDetail->desiredGameRankTier->tier ?? '-' }} -
                                                                {{ $orderDetail->desiredGameRankTierDetail->star_number ?? '-' }}
                                                            @else
                                                                -
                                                            @endif
                                                        </li>
                                                        <li>Harga: Rp {{ number_format($orderDetail->price, 0, ',', '.') }}
                                                        </li>
                                                    </ul>
                                                @else
                                                    <span class="text-muted">Tipe transaksi tidak dikenal.</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
