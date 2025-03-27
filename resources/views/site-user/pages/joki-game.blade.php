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
    <!-- Daftar Boosting Service -->
    <section class="game-listing">
        <div class="container">
            <!-- Bar Pencarian & Penyortiran -->
            <div class="search-sort-bar mb-4" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Cari jasa joki..." />
                            <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 game-cards">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 game-item {{ strtolower($service->game->genre) }}" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <a href="{{ route('joki-game.detail', $service->id) }}" class="card game-card">
                            <div class="card-image">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                                    alt="{{ $service->game->name }}" class="card-img-top" />
                                @if (isset($service->is_best_seller) && $service->is_best_seller)
                                    <div class="card-badge">Produk Terlaris</div>
                                @endif
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $service->game->name }}</h3>
                                <div class="game-meta">
                                    <span><i class="bi bi-controller"></i> {{ strtoupper($service->game->genre) }}</span>
                                    {{-- Jika ada rating/reviews, tampilkan di sini --}}
                                    {{-- <span><i class="bi bi-star-fill"></i> {{ number_format($service->rating, 1) }} ({{ $service->reviews_count }} Ulasan)</span> --}}
                                </div>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($service->description, 100, '...') }}
                                </p>
                                <div class="card-meta">
                                    <span class="price">
                                        Mulai dari Rp
                                        {{ number_format($service->sale_price ?? $service->original_price, 0, ',', '.') }}
                                    </span>
                                    <button class="btn btn-sm btn-primary">Lihat Paket</button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
