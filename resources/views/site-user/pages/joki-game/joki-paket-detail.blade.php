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
        .service-detail {
            padding: 6rem 0;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        }

        .service-image {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .service-image:hover {
            transform: scale(1.02);
        }

        .service-type-badge {
            display: inline-block;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.5rem 1.25rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .price-container {
            background: rgba(13, 110, 253, 0.05);
            padding: 1.5rem;
            border-radius: 1rem;
            border: 2px solid rgba(13, 110, 253, 0.1);
        }

        .order-button {
            position: relative;
            overflow: hidden;
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .order-button i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .order-button:hover {
            padding-right: 3.5rem;
        }

        .order-button:hover i {
            right: 1.5rem;
            opacity: 1;
        }

        .page-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0 3rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 992px) {
            .service-detail {
                padding: 4rem 0;
            }

            .service-image {
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 768px) {
            h1.display-5 {
                font-size: 2.25rem;
            }

            .price-container {
                padding: 1.25rem;
            }
        }

        @media (max-width: 576px) {
            .order-button {
                width: 100%;
                padding: 1rem;
            }

            .service-type-badge {
                font-size: 0.75rem;
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
                    <h1 class="display-5 fw-bold mt-3 mb-4">{{ $service->game->name }}</h1>
                    <p class="lead text-muted mb-0">
                        Pilih paket layanan boosting yang sesuai dengan kebutuhan Anda
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Detail Boosting Service -->
    <section class="service-detail">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Gambar Layanan -->
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                    <div class="service-image">
                        <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                            alt="{{ $service->game->name }}" class="img-fluid w-100"
                            style="object-fit: cover; height: 500px;">
                    </div>
                </div>

                <!-- Detail Informasi -->
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
                    <header class="mb-4">
                        @foreach ($service->labels as $label)
                            <span class="service-type-badge">{{ $label->name }}</span>
                        @endforeach
                        <h1 class="display-5 fw-bold mb-4">{{ $service->description }}</h1>
                    </header>

                    <div class="service-body">
                        <h2 class="lead fs-4 text-muted mb-5">
                            {{ $service->game->name }}
                        </h2>

                        <div class="d-flex flex-column gap-4">
                            <div class="price-container">
                                <div class="d-flex align-items-baseline gap-2">
                                    <h2 class="text-primary fw-bold mb-0 display-6">
                                        Rp
                                        {{ number_format($service->sale_price ?? $service->original_price, 0, ',', '.') }}
                                    </h2>
                                    @if ($service->sale_price)
                                        <del class="text-muted small">Rp
                                            {{ number_format($service->original_price, 0, ',', '.') }}</del>
                                    @endif
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg order-button">
                                Pesan Sekarang
                                <i class="bi bi-arrow-right-short"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian Cara Kerja -->
    @include('site-user.components.how-it-works')

    <!-- Bagian FAQ -->
    @include('site-user.components.faq')
@endsection
@section('script')
@endsection
