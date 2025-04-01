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
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .service-type-badge {
            background-color: #cfe2ff;
            color: #084298;
            font-size: 1rem;
            padding: 0.5em 1em;
            border-radius: 50px;
        }

        .price-container {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.5rem;
            border: 1px solid #e9ecef;
        }

        .order-button {
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .order-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        @media (max-width: 768px) {
            .service-detail {
                padding: 2rem 0;
            }

            h1.display-5 {
                font-size: 2.5rem;
            }

            .order-button {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Detail Boosting Service -->
    <section class="service-detail py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-start">
                <!-- Gambar Layanan -->
                <article class="col-lg-6">
                    <div class="service-image">
                        <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                            alt="{{ $service->game->name }}" class="img-fluid rounded-3 shadow-lg w-100">
                    </div>
                </article>

                <!-- Detail Informasi -->
                <article class="col-lg-6">
                    <header class="mb-4">
                        <h1 class="display-5 fw-bold mb-3">{{ $service->game->name }}</h1>
                        <span class="badge service-type-badge">Tipe Layanan</span>
                    </header>

                    <div class="service-body">
                        <h2 class="lead fw-bold mb-4">
                            {{ $service->description }}
                        </h2>

                        <div class="d-flex flex-column gap-4">
                            <div class="price-container">
                                <h2 class="text-primary fw-bold mb-0">
                                    Rp. {{ number_format($service->sale_price ?? $service->original_price, 0, ',', '.') }}
                                </h2>
                            </div>

                            <button class="btn btn-primary btn-lg py-3 px-5 order-button">
                                Pesan Sekarang
                                <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </article>
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
