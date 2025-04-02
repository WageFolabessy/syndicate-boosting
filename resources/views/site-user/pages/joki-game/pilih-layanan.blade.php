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
        /* Consistent with previous design */
        .service-options {
            padding: 4rem 0;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        }

        .service-card {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid rgba(0, 0, 0, 0.075);
            border-radius: 1rem;
            background: #fff;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .service-card:hover .icon-wrapper {
            transform: scale(1.05);
        }

        .btn-service {
            position: relative;
            overflow: hidden;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 0.75rem;
            width: 100%;
            max-width: 240px;
        }

        .btn-service:hover {
            padding-right: 2.5rem;
        }

        .btn-service i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .btn-service:hover i {
            right: 1.5rem;
            opacity: 1;
        }

        /* Consistent typography */
        .service-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .service-card {
                margin-bottom: 1.5rem;
            }

            .icon-wrapper {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 768px) {
            .service-options {
                padding: 3rem 0;
            }

            .card-body {
                padding: 2rem !important;
            }
        }

        @media (max-width: 576px) {
            .icon-wrapper {
                width: 70px;
                height: 70px;
                border-radius: 0.75rem;
            }

            .service-title {
                font-size: 1.5rem;
            }

            .btn-service {
                max-width: 100%;
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
                    <span class="section-tag">Layanan Profesional</span>
                    <h1 class="display-5 fw-bold mt-3 mb-4">Pilih Jenis Layanan</h1>
                    <p class="lead text-muted mb-0">
                        Temukan layanan yang tepat sesuai kebutuhan gaming Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Options -->
    <section class="service-options">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @php
                    // Cek keberadaan layanan paket dan custom
                    $hasPackage = $game->boostingServices->isNotEmpty();
                    $hasCustom = $game->rankCategories->isNotEmpty();
                @endphp

                @if ($hasPackage)
                    <!-- Joki Paket -->
                    <div class="col-12 col-md-10 col-lg-6" data-aos="fade-up" data-aos-delay="50">
                        <article class="service-card h-100">
                            <div class="card-body p-4 text-center d-flex flex-column">
                                <header class="mb-4 px-3">
                                    <div class="icon-wrapper bg-success bg-opacity-10 mx-auto mb-4">
                                        <i class="bi bi-box-seam fs-1 text-success"></i>
                                    </div>
                                    <h3 class="service-title">Joki Paket</h3>
                                    <p class="text-muted mb-0">Layanan lengkap dengan paket harga tetap dan transparan</p>
                                </header>

                                <footer class="mt-auto pt-3">
                                    <a href="{{ route('joki-paket', $game->slug) }}" class="btn btn-success btn-service">
                                        Pilih Paket <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </footer>
                            </div>
                        </article>
                    </div>
                @endif

                @if ($hasCustom)
                    <!-- Joki Custom -->
                    <div class="col-12 col-md-10 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <article class="service-card h-100">
                            <div class="card-body p-4 text-center d-flex flex-column">
                                <header class="mb-4 px-3">
                                    <div class="icon-wrapper bg-primary bg-opacity-10 mx-auto mb-4">
                                        <i class="bi bi-gear fs-1 text-primary"></i>
                                    </div>
                                    <h3 class="service-title">Joki Custom</h3>
                                    <p class="text-muted mb-0">Kustomisasi kebutuhan boosting sesuai preferensi Anda</p>
                                </header>

                                <footer class="mt-auto pt-3">
                                    <a href="{{ route('joki-kostum', $game) }}" class="btn btn-primary btn-service">
                                        Buat Custom <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </footer>
                            </div>
                        </article>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
