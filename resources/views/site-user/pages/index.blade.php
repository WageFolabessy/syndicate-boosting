@extends('site-user.components.main')
@section('meta')
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Syndicate - Premium Game Boosting & Accounts" />
    <meta property="og:description"
        content="Professional game boosting services and premium game accounts for serious players." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com" />
    <meta property="og:image" content="/images/logo.png" />
@endsection
@section('css')
    <style>
        /* Global Styles */
        .section-tag {
            display: inline-block;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.5rem 1.25rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 6rem 0;
        }

        .hero-image {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Game Cards */
        .game-card {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid rgba(0, 0, 0, 0.075);
            border-radius: 1rem;
            overflow: hidden;
            background: #fff;
        }

        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        /* Account Cards */
        .account-card {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid rgba(0, 0, 0, 0.075);
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .account-card .card-body {
            padding: 1.5rem;
            /* bisa disesuaikan */
            display: flex;
            flex-direction: column;
        }

        /* Batasi tinggi list fitur agar card tidak melebar */
        .account-card .card-body ul {
            max-height: 120px;
            /* sesuaikan sesuai kebutuhan */
            overflow: hidden;
            position: relative;
        }

        /* Opsional: tambahkan efek gradasi di bagian bawah list untuk memberi tahu ada lebih banyak konten */
        .account-card .card-body ul::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2rem;
            background: linear-gradient(transparent, #fff);
            pointer-events: none;
        }

        /* Tetap mempertahankan properti flex agar tombol tetap berada di bawah */
        .account-card .card-body .d-flex {
            margin-top: auto;
        }

        .badge.bg-success {
            background: rgba(25, 135, 84, 0.9);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(25, 135, 84, 0.2);
        }

        /* Tombol Umum */
        .btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* Perbaikan Animasi Tombol dengan menghindari perubahan padding */
        .btn i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%) translateX(0);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        /* btn-primary */
        .btn-primary {
            padding: 1rem 2rem;
        }

        .btn-primary:hover i {
            opacity: 1;
            transform: translateY(-50%) translateX(5px);
        }

        /* btn-outline-primary */
        .btn-outline-primary {
            padding: 1rem 2rem;
        }

        .btn-outline-primary:hover i {
            opacity: 1;
            transform: translateY(-50%) translateX(5px);
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

        /* Responsive Button Layout */
        @media (max-width: 576px) {

            /* Stack tombol secara vertikal dan buat full width */
            .d-flex {
                flex-direction: column !important;
            }

            .d-flex .btn {
                width: 100%;
                margin-bottom: 1rem;
            }

            /* Opsional: Atur ulang ukuran teks atau padding untuk layar kecil */
            .hero-section h1 {
                font-size: 2rem;
            }
        }

        /* Responsive untuk Hero Section */
        @media (max-width: 768px) {
            .hero-section {
                padding: 4rem 0;
            }

            .game-card,
            .account-card {
                margin-bottom: 1.5rem;
            }
        }

        /* Utilities */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Review Section */
        .review-section {
            background: linear-gradient(135deg, #f0f2f5, #e4e7eb);
            padding: 4rem 0;
            overflow: hidden;
        }

        .review-card {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            margin: 1rem;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }

        .review-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.1);
        }

        .review-rating {
            font-size: 1.6rem;
            color: #ffc107;
            margin-bottom: 1rem;
        }

        .review-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #495057;
            margin-bottom: 1.5rem;
            position: relative;
            font-style: italic;
        }

        /* Carousel Controls */
        .carousel-control-prev,
        .carousel-control-next {
            height: 45px;
            width: 45px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
            transition: background 0.3s ease;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: rgba(13, 110, 253, 0.9);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
            width: 1.5rem;
            height: 1.5rem;
        }

        @media (max-width: 768px) {
            .review-section {
                padding: 3rem 0;
            }

            .review-card {
                padding: 1.5rem;
                margin: 0.5rem;
            }

            .carousel-control-prev,
            .carousel-control-next {
                height: 40px;
                width: 40px;
            }
        }
    </style>
@endsection
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 order-lg-1 order-2">
                        <div class="hero-content" data-aos="fade-right">
                            <span class="section-tag mb-3">Layanan Gaming Premium</span>
                            <h1 class="display-4 fw-bold mb-4">Tingkatkan Pengalaman Gaming Anda</h1>
                            <p class="lead text-muted mb-5">
                                Layanan peningkatan game profesional dan akun premium untuk para pemain serius.
                            </p>
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="{{ route('joki-game') }}" class="btn btn-primary btn-lg px-5 py-3">
                                    Joki Game
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                                <a href="{{ route('akun-game') }}" class="btn btn-outline-primary btn-lg px-5 py-3">
                                    Akun Game
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-left">
                        <div class="hero-image">
                            <img src="{{ asset('assets/site-user/images/logo.png') }}"
                                alt="Setup gaming dengan pengalaman gaming premium" class="img-fluid w-100"
                                style="height: 500px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Games Section -->
        <section class="py-6 bg-light">
            <div class="container">
                <div class="section-header text-center" data-aos="fade-up">
                    <span class="section-tag">Layanan Unggulan</span>
                    <h2>Jasa Joki Game Terpopuler</h2>
                    <p>Layanan joki profesional untuk game kompetitif terpopuler</p>
                </div>
                <div class="row g-4">
                    @foreach ($games as $game)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <article class="game-card h-100">
                                <div class="card-img-top ratio ratio-16x9">
                                    <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}"
                                        class="img-fluid object-fit-cover">
                                </div>
                                <div class="card-body p-4">
                                    <div class="d-flex flex-column h-100">
                                        <header class="mb-3">
                                            <h3 class="h5 fw-bold mb-3">{{ $game->name }}</h3>
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                {{ $game->genre }}
                                            </span>
                                        </header>
                                        <p class="text-muted line-clamp-3 mb-4">{{ $game->description }}</p>
                                        <a href="{{ route('pilih-layanan', $game) }}" class="btn btn-primary mt-auto">
                                            Pilih Layanan
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
                                        <div class="mt-2">
                                            @if ($game->boostingServices->count())
                                                <span class="badge bg-info">Joki Paket</span>
                                            @endif
                                            @if ($game->rankCategories->count())
                                                <span class="badge bg-success">Joki Kostum</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5" data-aos="fade-right">
                    <a href="{{ route('joki-game') }}" class="btn btn-outline-primary btn-lg px-5 py-3">
                        Lihat Semua Game
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Premium Accounts Section -->
        <section class="py-6">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="section-tag">Akun Premium</span>
                    <h2 class="display-5 fw-bold mb-3">Akun Game Unggulan</h2>
                    <p class="text-muted">Akun dengan item langka dan peringkat tinggi</p>
                </div>

                <div class="row g-4">
                    @foreach ($gameAccounts as $account)
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="account-card">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $account->image) }}" alt="{{ $account->game->name }}"
                                        class="img-fluid card-img-top object-fit-cover"
                                        style="height: 200px; width: 100%; object-fit: cover;">
                                    @if ($account->labels->count())
                                        <div class="position-absolute top-0 end-0 m-3">
                                            @foreach ($account->labels as $label)
                                                <span class="badge"
                                                    style="background-color: {{ $label->color ?? '#0d6efd' }}; color: #fff;">
                                                    <i class="bi bi-check-circle me-2"></i>{{ $label->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column h-100">
                                        <h3 class="h5 fw-bold mb-3">{{ $account->account_name }}</h3>
                                        <p class="text-muted small mb-4">{{ $account->game->name }}</p>
                                        <ul class="list-unstyled mb-4">
                                            @foreach (explode("\n", $account->features) as $line)
                                                @php
                                                    $parts = explode('+', $line);
                                                @endphp
                                                @foreach ($parts as $feature)
                                                    <li class="mb-2">
                                                        <i class="bi bi-check-circle text-primary me-2"></i>
                                                        {{ trim($feature) }}
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                        <div
                                            class="d-flex flex-column justify-content-between align-items-center mt-auto mb-4">
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
                                            <a href="{{ route('akun-game.detail', [$game, $account->id]) }}"
                                                class="btn btn-primary btn-detail mt-4">
                                                Detail
                                                <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('akun-game') }}" class="btn btn-outline-primary btn-lg px-5 py-3">
                        Lihat Semua Akun
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Review Section -->
        @if ($reviews->isNotEmpty())
            <section class="review-section">
                <div class="container">
                    <div class="text-center mb-5" data-aos="fade-up">
                        <span class="badge bg-primary rounded-pill fs-6 px-4 py-2 mb-3">Testimonials</span>
                        <h2 class="display-5 fw-bold mb-3">Apa Yang Dikatakan Oleh Pelanggan Kami</h2>
                        <p class="lead text-muted">Temukan apa yang membuat banyak gamer menggunakan layanan kami</p>
                    </div>

                    <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner text-center">
                            @foreach ($reviews as $review)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="review-card">
                                                <div class="review-rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i
                                                            class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                                    @endfor
                                                </div>
                                                <p class="review-text">
                                                    "{{ $review->comment }}"
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>
        @endif

        <!-- Why Choose Us Section -->
        @include('site-user.components.why-choose-us')

        <!-- Bagian Cara Kerja -->
        @include('site-user.components.how-it-works')

        <!-- Bagian FAQ -->
        @include('site-user.components.faq')
    </main>
@endsection
