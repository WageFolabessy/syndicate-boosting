@extends('site-user.components.main')
@section('meta')
    <meta name="keywords"
        content="game accounts, jual akun game, premium accounts, mobile legends account, valorant account" />
    <meta name="author" content="Syndicate" />
    <meta property="og:title" content="Premium Game Accounts - Syndicate" />
    <meta property="og:description"
        content="Browse and buy premium game accounts with rare items, high ranks, and exclusive content." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/akun-game" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Akun Game Detail
@endsection
@section('css')
    <style>
        /* Header Section Detail */
        .account-detail-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 3rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        /* Body Detail Section */
        .account-detail-body {
            padding: 4rem 0;
            background: #fff;
        }

        .account-detail-card {
            border: 1px solid rgba(0, 0, 0, 0.075);
            border-radius: 1rem;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .account-detail-images {
            width: 100%;
            height: 100%;
            object-fit: cover;
            max-height: 400px;
        }

        .price-tag .current-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0d6efd;
        }

        .price-tag .original-price {
            font-size: 1rem;
            color: #6c757d;
            text-decoration: line-through;
            margin-left: 0.5rem;
        }
    </style>
@endsection
@section('content')
    <main>
        <!-- Header Section -->
        <section class="account-detail-header">
            <div class="container mt-4">
                <h1 class="display-5 fw-bold">Detail Akun Game</h1>
                <p class="text-muted">Lihat lebih dalam mengenai akun game yang Anda pilih</p>
            </div>
        </section>

        <!-- Account Detail Section -->
        <section class="account-detail-body">
            <div class="container">
                <div class="account-detail-card">
                    <div class="row g-0">
                        <!-- Gambar Akun -->
                        <div class="col-md-5">
                            <img src="{{ asset('storage/' . $account->image) }}" alt="{{ $account->account_name }}"
                                class="img-fluid account-detail-images">
                        </div>
                        <!-- Detail Informasi -->
                        <div class="col-md-7">
                            <div class="p-4">
                                <h2 class="fw-bold">{{ $account->account_name }}</h2>

                                <!-- Informasi Game & Akun -->
                                <div class="d-flex gap-3 text-muted small my-3">
                                    <div class="flex-grow-1 text-start">
                                        <i class="bi bi-controller me-1"></i>
                                        {{ $account->game->name ?? '-' }}
                                    </div>
                                    <div class="text-center">
                                        <i class="bi bi-person me-1"></i>
                                        Level {{ $account->level ?? '-' }}
                                    </div>
                                    <div class="flex-grow-1 text-end">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $account->account_age ?? '-' }}
                                    </div>
                                </div>

                                <!-- Harga -->
                                <div class="mb-4">
                                    <div class="price-tag">
                                        @if (!is_null($account->sale_price))
                                            <span class="current-price">
                                                Rp {{ number_format($account->sale_price, 0, ',', '.') }}
                                            </span>
                                            <del class="original-price">
                                                Rp {{ number_format($account->original_price, 0, ',', '.') }}
                                            </del>
                                        @else
                                            <span class="current-price">
                                                Rp {{ number_format($account->original_price, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Fitur Akun -->
                                <div class="mb-4">
                                    <h5 class="mb-3">Fitur Akun</h5>
                                    <ul class="list-unstyled">
                                        @foreach (explode("\n", $account->features) as $line)
                                            @php
                                                $parts = explode('+', $line);
                                            @endphp
                                            @foreach ($parts as $feature)
                                                <li class="mb-2 d-flex align-items-start">
                                                    <i class="bi bi-check2-circle text-success me-2 mt-1"></i>
                                                    <span>{{ trim($feature) }}</span>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Deskripsi Akun -->
                                <div class="mb-4">
                                    <h5 class="mb-3">Deskripsi Akun</h5>
                                    <p class="text-muted">{{ $account->description ?? '-' }}</p>
                                </div>

                                <!-- Tombol Aksi -->
                                <div>
                                    <a href="#" class="btn btn-primary btn-lg">
                                        Pesan Sekarang <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
