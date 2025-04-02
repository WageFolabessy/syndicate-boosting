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
    - Joki Game Detail
@endsection
@section('css')
    <style>
        /* Style Umum */
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

        /* Improved Modal Styles */
        .modal-content {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .modal-header.bg-gradient-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            padding: 2.5rem 2rem;
            border-bottom: none;
        }

        .modal-header.bg-gradient-primary .icon-wrapper {
            background: rgba(255, 255, 255, 0.15);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .modal-title {
            font-size: 1.75rem;
            margin-bottom: 0.25rem;
        }

        .modal-header p {
            font-size: 0.9rem;
            opacity: 0.85;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            background: #f8f9fa;
            padding: 1.5rem 2rem;
            border-top: none;
        }

        .modal-footer .btn-primary {
            font-size: 1rem;
            font-weight: 600;
            padding: 1rem 2rem;
        }

        /* Floating Labels Custom */
        .form-floating label {
            transition: all 0.3s ease;
            padding-left: 2.5rem;
        }

        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            transform: scale(0.85) translateY(-0.8rem) translateX(0.5rem);
            opacity: 0.8;
        }

        .form-control {
            border: 2px solid #e9ecef;
            padding-left: 2.5rem !important;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
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
                            <span class="service-type-badge" style="background-color: {{ $label->color ?? '#0d6efd' }}; color: #fff;">{{ $label->name }}</span>
                        @endforeach
                        <h1 class="display-5 fw-bold mb-4">{{ $service->title }}</h1>
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

                            <!-- Description -->
                            <div class="mb-4">
                                <h5 class="h6 fw-bold mb-3 text-uppercase text-muted">Deskripsi</h5>
                                <p class="text-muted mb-0">{{ $service->description ?? '-' }}</p>
                            </div>

                            <button class="btn btn-primary btn-lg order-button" data-bs-toggle="modal"
                                data-bs-target="#orderModal">
                                Pesan Sekarang
                                <i class="bi bi-arrow-right-short"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian Modal -->
    @include('site-user.pages.joki-game.modal-order')

    <!-- Bagian Cara Kerja -->
    @include('site-user.components.how-it-works')

    <!-- Bagian FAQ -->
    @include('site-user.components.faq')
@endsection
@section('script')
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
@endsection
