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
                    @foreach ($boostingServices as $service)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <article class="game-card h-100">
                                <div class="card-img-top ratio ratio-16x9">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                        class="img-fluid object-fit-cover">
                                </div>
                                <div class="card-body p-4">
                                    <div class="d-flex flex-column h-100">
                                        <header class="mb-3">
                                            <h3 class="h5 fw-bold mb-3">{{ $service->name }}</h3>
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                {{ $service->genre }}
                                            </span>
                                        </header>
                                        <p class="text-muted line-clamp-3 mb-4">{{ $service->description }}</p>
                                        <a href="{{ route('pilih-layanan', $service->id) }}"
                                            class="btn btn-primary mt-auto">
                                            Pilih Layanan
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
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
                                        <div class="d-flex flex-column justify-content-between align-items-center mt-auto mb-4">
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
                                            <a href="{{ route('akun-game.detail', $account->id) }}" class="btn btn-primary btn-detail mt-4">
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

        <!-- Why Choose Us Section -->
        <section class="why-us-section py-6 bg-light">
            <div class="container">
                <div class="section-header text-center mb-5" data-aos="fade-up">
                    <span class="section-tag">Mengapa Memilih Kami</span>
                    <h2 class="display-5 fw-bold mb-3">Keunggulan The Syndicate</h2>
                    <p class="text-muted">
                        Kami menyediakan layanan gaming premium dengan fokus pada kualitas, keamanan, dan kepuasan pelanggan
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-card h-100 p-4 rounded-3 bg-white shadow-sm">
                            <div class="icon-wrapper d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-3 mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-shield-check fs-3 text-primary"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Aman & Terpercaya</h3>
                            <p class="text-muted mb-0">
                                Semua transaksi dienkripsi dan aman. Kami melindungi data serta akun game Anda dengan
                                standar keamanan industri.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-card h-100 p-4 rounded-3 bg-white shadow-sm">
                            <div class="icon-wrapper d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-3 mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-trophy fs-3 text-primary"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Joki Profesional</h3>
                            <p class="text-muted mb-0">
                                Tim joki kami terdiri dari pemain profesional dengan rekam jejak yang terbukti di dunia game
                                kompetitif.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-card h-100 p-4 rounded-3 bg-white shadow-sm">
                            <div class="icon-wrapper d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-3 mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-headset fs-3 text-primary"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Dukungan 24/7</h3>
                            <p class="text-muted mb-0">
                                Tim dukungan pelanggan kami siap membantu 24 jam sehari untuk menjawab pertanyaan atau
                                mengatasi masalah Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bagian Cara Kerja -->
        @include('site-user.components.how-it-works')

        <!-- Bagian FAQ -->
        @include('site-user.components.faq')
    </main>
@endsection
