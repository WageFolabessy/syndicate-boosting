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
    - Akun Game
@endsection
@section('css')
    <style>
        .page-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0 3rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .account-listings {
            padding: 4rem 0;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        }

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

        .premium-account-card {
            border: 1px solid rgba(0, 0, 0, 0.075);
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            background: #fff;
            margin-bottom: 1.5rem;
        }

        .premium-account-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .account-images {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .account-images img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .premium-account-card:hover img {
            transform: scale(1.03);
        }

        .account-badges {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
        }

        /* Badge styles untuk kejelasan */
        .badge-verified {
            background-color: #d4edda;
            color: #155724;
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.25rem;
        }

        .badge-premium {
            background-color: #cce5ff;
            color: #004085;
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.25rem;
        }

        .account-details {
            padding: 1.5rem;
        }

        .price-tag .current-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0d6efd;
        }

        .price-tag .original-price {
            font-size: 0.875rem;
            color: #6c757d;
            text-decoration: line-through;
            margin-left: 0.5rem;
        }

        .btn-detail {
            position: relative;
            overflow: hidden;
            padding: 0.5rem 1.5rem;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-detail:hover {
            padding-right: 2.5rem;
        }

        .btn-detail i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .btn-detail:hover i {
            opacity: 1;
            right: 1.5rem;
        }

        @media (max-width: 768px) {
            .account-images {
                height: 200px;
            }

            .page-header {
                padding: 3rem 0;
            }
        }

        @media (max-width: 576px) {
            .account-grid {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Header Section -->
        <section class="page-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center" data-aos="fade-up">
                        <span class="section-tag">Akun Premium</span>
                        <h1 class="display-5 fw-bold mt-3 mb-4">Marketplace Akun Game</h1>
                        <p class="lead text-muted mb-0">
                            Jelajahi dan beli akun game premium terverifikasi dengan item langka dan peringkat tinggi
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Account Listings -->
        <section class="account-listings">
            <div class="container">
                <!-- Search Bar -->
                <div class="search-sort-bar mb-5" data-aos="fade-up">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Cari akun game..."
                                    aria-label="Search accounts">
                                <i
                                    class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Grid -->
                <div class="row g-4">
                    @foreach ($gameAccounts as $gameAccount)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <article class="premium-account-card h-100">
                                <div class="account-images">
                                    <img src="{{ asset('storage/' . $gameAccount->image) }}"
                                        alt="{{ $gameAccount->account_name }}" class="img-fluid">
                                    <div class="account-badges">
                                        @if ($gameAccount->labels->count())
                                            @foreach ($gameAccount->labels as $label)
                                                <span class="badge"
                                                    style="background-color: {{ $label->color ?? '#0d6efd' }}; color: #fff;">
                                                    <i class="bi bi-check-circle me-2"></i>{{ $label->name }}
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="account-details">
                                    <h5 class="fw-bold mb-3">{{ $gameAccount->account_name }}</h5>

                                    <!-- Baris detail: Genre, Level & Umur Akun -->
                                    <div class="row text-muted small mb-4">
                                        <div class="col-4 text-start">
                                            <i class="bi bi-controller me-1"></i>
                                            {{ $gameAccount->game->genre ?? '-' }}
                                        </div>
                                        <div class="col-4 text-center">
                                            <i class="bi bi-person me-1"></i>
                                            Level {{ $gameAccount->level ?? '-' }}
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="bi bi-clock me-1"></i>
                                            {{ $gameAccount->account_age ?? '-' }}
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-4">
                                        @foreach (explode("\n", $gameAccount->features) as $line)
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

                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <div class="price-tag">
                                            @if (!is_null($gameAccount->sale_price))
                                                <span class="current-price">
                                                    Rp {{ number_format($gameAccount->sale_price, 0, ',', '.') }}
                                                </span>
                                                <del class="original-price">
                                                    Rp {{ number_format($gameAccount->original_price, 0, ',', '.') }}
                                                </del>
                                            @else
                                                <span class="current-price">
                                                    Rp {{ number_format($gameAccount->original_price, 0, ',', '.') }}
                                                </span>
                                            @endif
                                        </div>
                                        <a href="#" class="btn btn-primary btn-detail">
                                            Detail
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
