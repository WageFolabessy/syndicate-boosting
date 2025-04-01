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
        .game-listing {
            background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%);
        }

        .game-card {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .hover-effect:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .game-thumbnail {
            background: #f8f9fa;
        }

        .genre-badge .badge {
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn-hover {
            transition: all 0.3s ease;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
        }

        @media (max-width: 992px) {
            .game-card {
                max-width: 320px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media (max-width: 768px) {
            .game-thumbnail img {
                height: 160px;
            }

            .card-body {
                padding: 1.5rem !important;
            }
        }

        @media (max-width: 576px) {
            .game-thumbnail img {
                height: 140px;
            }

            .genre-badge .badge {
                font-size: 0.65rem;
                padding: 0.25rem 0.75rem;
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

    <section class="game-listing py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($games as $game)
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="card h-100 shadow-sm border-0 overflow-hidden game-card">
                            <div class="game-thumbnail">
                                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}"
                                    class="card-img-top" style="height: 200px; object-fit: cover;">
                            </div>

                            <div class="card-body d-flex flex-column p-4">
                                <header class="mb-3">
                                    <h3 class="h5 fw-bold mb-2">{{ $game->name }}</h3>
                                    <span class="badge bg-primary mb-2">{{ $game->genre }}</span>
                                </header>

                                <div class="game-description mb-3 flex-grow-1">
                                    <p class="text-muted line-clamp-3">{{ $game->description }}</p>
                                </div>

                                <footer class="mt-auto">
                                    <a href="{{ route('pilih-layanan', $game->id) }}" class="btn btn-primary w-100 py-2">
                                        Pilih Layanan Joki
                                        <i class="bi bi-chevron-right ms-2"></i>
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
