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
        .service-options {
            position: relative;
            overflow: hidden;
        }

        .service-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
        }

        .hover-effect:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-hover {
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
        }

        .btn-hover::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.5s ease;
        }

        .btn-hover:hover::after {
            left: 120%;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 2rem !important;
            }

            h3.display-6 {
                font-size: 1.75rem;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .icon-wrapper {
                width: 60px;
                height: 60px;
            }

            .bi {
                font-size: 1.5rem !important;
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
    <section class="service-options py-5 bg-light">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <!-- Joki Paket -->
                <div class="col-12 col-md-10 col-lg-6">
                    <article class="card service-card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body p-5 text-center d-flex flex-column">
                            <header class="mb-4">
                                <div class="icon-wrapper bg-success bg-opacity-10 mx-auto mb-4">
                                    <i class="bi bi-box-seam fs-1 text-success"></i>
                                </div>
                                <h3 class="display-6 fw-bold mb-3">Joki Paket</h3>
                                <p class="text-muted mb-0">Layanan boosting dengan paket harga tetap</p>
                            </header>

                            <footer class="mt-auto">
                                <a href="{{ route('joki-paket', $game->id) }}" class="btn btn-success px-4 py-3 btn-hover">
                                    Pilih Joki Paket
                                    <i class="bi bi-chevron-right ms-2"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                </div>

                <!-- Joki Custom -->
                <div class="col-12 col-md-10 col-lg-6">
                    <article class="card service-card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body p-5 text-center d-flex flex-column">
                            <header class="mb-4">
                                <div class="icon-wrapper bg-primary bg-opacity-10 mx-auto mb-4">
                                    <i class="bi bi-gear fs-1 text-primary"></i>
                                </div>
                                <h3 class="display-6 fw-bold mb-3">Joki Custom</h3>
                                <p class="text-muted mb-0">Layanan boosting custom dengan pilihan rank & tier</p>
                            </header>

                            <footer class="mt-auto">
                                <a href="{{ route('joki-kostum', $game->id) }}" class="btn btn-primary px-4 py-3 btn-hover">
                                    Pilih Joki Custom
                                    <i class="bi bi-chevron-right ms-2"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
