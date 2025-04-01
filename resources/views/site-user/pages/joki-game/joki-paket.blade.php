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
            padding: 4rem 0;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        }

        .package-card {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid rgba(0, 0, 0, 0.075);
            border-radius: 1rem;
            overflow: hidden;
            background: #fff;
        }

        .package-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .package-image {
            position: relative;
            overflow: hidden;
            background: #f8f9fa;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio */
        }

        .package-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .package-card:hover img {
            transform: scale(1.03);
        }

        .price-tag {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0d6efd;
        }

        .btn-detail {
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-detail i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .btn-detail:hover {
            padding-right: 2.5rem;
        }

        .btn-detail:hover i {
            right: 1.5rem;
            opacity: 1;
        }

        /* Consistent with previous design */
        .page-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0 3rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .package-listing {
                padding: 3rem 0;
            }

            .package-image {
                padding-top: 70%;
                /* Adjust aspect ratio for mobile */
            }

            .price-tag {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .package-card {
                margin-bottom: 1.5rem;
            }

            .btn-detail {
                width: 100%;
                padding: 0.75rem;
            }

            .package-image {
                padding-top: 80%;
                /* More square aspect ratio for mobile */
            }
        }
    </style>
@endsection

@section('content')
    <!-- Header Section -->
    <section class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-duration="800">
                    <span class="section-tag">Paket Layanan</span>
                    <h1 class="display-5 fw-bold mt-3 mb-4">{{ $game->name }}</h1>
                    <p class="lead text-muted mb-0">
                        Pilih paket layanan boosting yang sesuai dengan kebutuhan Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Package Listing -->
    <section class="package-listing">
        <div class="container">
            @if ($packages->count())
                <div class="row g-4 justify-content-center">
                    @foreach ($packages as $package)
                        <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <article class="package-card h-100">
                                <div class="package-image">
                                    <img src="{{ $package->image ? asset('storage/' . $package->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                                        alt="{{ $package->title }}" class="img-fluid">
                                </div>

                                <div class="card-body p-4">
                                    <header class="mb-3">
                                        <h2 class="h5 fw-bold mb-2">{{ $package->title }}</h2>
                                        <p class="text-muted small mb-0">{{ $game->name }}</p>
                                    </header>

                                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start">
                                        <div class="mb-3 mb-sm-0">
                                            <span class="price-tag">
                                                Rp
                                                {{ number_format($package->sale_price ?? $package->original_price, 0, ',', '.') }}
                                            </span>
                                            @if ($package->sale_price)
                                                <del class="text-muted small ms-2">Rp
                                                    {{ number_format($package->original_price, 0, ',', '.') }}</del>
                                            @endif
                                        </div>
                                        <a href="{{ route('joki-game.detail', $package->id) }}"
                                            class="btn btn-primary btn-detail">
                                            Detail
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center py-4" data-aos="fade-up">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Belum tersedia paket untuk game ini
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
@endsection
