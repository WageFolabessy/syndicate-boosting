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
        /* Custom Styles */
        .page-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0 3rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

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

        .game-listing {
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
            padding: 4rem 0;
        }

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

        .card-body {
            padding: 1.75rem !important;
        }

        .genre-badge .badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.5rem 1rem;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
            color: #6c757d;
            min-height: 4.5em;
        }

        .btn-joki {
            position: relative;
            overflow: hidden;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 0.75rem;
        }

        .btn-joki:hover {
            padding-right: 2.5rem;
        }

        .btn-joki i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .btn-joki:hover i {
            right: 1.5rem;
            opacity: 1;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .page-header {
                padding: 4rem 0 2rem;
            }

            .game-thumbnail img {
                height: 200px;
            }
        }

        @media (max-width: 768px) {
            .game-card {
                margin-bottom: 1.5rem;
            }

            .package-image {
                padding-top: 70%;
            }

            .card-body {
                padding: 1.5rem !important;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 3rem 0 1.5rem;
            }

            .package-image {
                padding-top: 80%;
            }

            .section-tag {
                font-size: 0.75rem;
            }

            h1 {
                font-size: 2rem;
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
                    <h1 class="display-5 fw-bold mt-3 mb-4">Layanan Joki Game</h1>
                    <p class="lead text-muted mb-0">
                        Tingkatkan peringkat, capai pencapaian, dan asah kemampuan Anda dengan layanan profesional kami
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Game Listing Section -->
    <section class="game-listing">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach ($games as $game)
                    <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <article class="game-card h-100">
                            <div class="package-image">
                                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}"
                                    class="img-fluid">
                                </div>

                            <div class="card-body">
                                <header class="mb-3">
                                    <h3 class="h5 fw-bold mb-3">{{ $game->name }}</h3>
                                    <div class="genre-badge">
                                        <span class="badge">{{ $game->genre }}</span>
                                    </div>
                                </header>

                                <div class="game-description mb-4">
                                    <p class="line-clamp-3">{{ $game->description }}</p>
                                </div>

                                <footer class="mt-auto">
                                    <a href="{{ route('pilih-layanan', $game->id) }}"
                                        class="btn btn-primary btn-joki w-100">
                                        Pilih Layanan
                                        <i class="bi bi-arrow-right-short"></i>
                                    </a>
                                </footer>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
