@extends('site-user.components.main')
@section('meta')
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Professional Game Boosting Services - Syndicate" />
    <meta property="og:description"
        content="Boost your rank, complete achievements, and improve your gaming skills with our professional boosting services." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/joki-game" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Joki Game
@endsection
@section('css')
    <style>
        .package-listing {
            min-height: 60vh;
        }

        .package-image {
            position: relative;
            overflow: hidden;
            background: #f8f9fa;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0.75rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }

        .price-container {
            font-family: 'Arial', sans-serif;
        }

        .btn-primary {
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        @media (max-width: 768px) {
            .card {
                margin-bottom: 1.5rem;
            }

            .card-img-top {
                height: 200px;
            }

            .btn-primary {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Bagian Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-4" data-aos="fade-up">
                    <span class="section-tag">Layanan Profesional</span>
                    <h1>Layanan Joki Game</h1>
                    <p class="lead">
                        Tingkatkan peringkat, capai pencapaian, dan asah kemampuan Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="package-listing py-5 bg-light">
        <div class="container">
            @if ($packages->count())
                <div class="row g-4">
                    @foreach ($packages as $package)
                        <div class="col-12 col-md-6 col-lg-4">
                            <article class="card h-100 shadow-sm border-0 overflow-hidden">
                                <div class="package-image">
                                    <img src="{{ $package->image ? asset('storage/' . $package->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                                        alt="{{ $game->name }}" class="card-img-top"
                                        style="height: 250px; object-fit: cover;">
                                </div>
                                <div class="card-body p-4">
                                    <header class="mb-3">
                                        <h2 class="h5 fw-bold mb-2 text-truncate">{{ $game->name }}</h2>
                                        <h3 class="h6 text-muted mb-3">{{ $package->description }}</h3>
                                    </header>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="price-container">
                                            <span class="text-primary fw-bold fs-4">Rp
                                                {{ number_format($package->sale_price ?? $package->original_price, 0, ',', '.') }}</span>
                                        </div>
                                        <a href="{{ route('joki-game.detail', $package->id) }}"
                                            class="btn btn-primary rounded-pill px-4">
                                            Lihat Detail
                                            <i class="bi bi-arrow-right-short ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center py-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Tidak ada layanan joki paket untuk game ini.
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
@endsection
