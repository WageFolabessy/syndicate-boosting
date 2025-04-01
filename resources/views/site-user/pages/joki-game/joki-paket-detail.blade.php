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

    <!-- Detail Boosting Service -->
    <section class="service-detail py-5">
        <div class="container">
            <div class="mb-4">
                <a href="{{ route('joki-game') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Joki
                </a>
            </div>
            <div class="row">
                <!-- Gambar Layanan -->
                <div class="col-md-6 mb-4">
                    <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                        alt="{{ $service->game->name }}" class="img-fluid rounded">
                </div>
                <!-- Detail Informasi -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{ $service->game->name }}</h2>
                    <div class="mb-3">
                        <span class="badge bg-info text-dark">{{ ucfirst($service->service_type) }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Genre:</strong> {{ $service->game->genre }} <br>
                        <strong>Developer:</strong> {{ $service->game->developer }}
                    </div>
                    <p class="mb-4">
                        {{ $service->description }}
                    </p>
                    <div class="mb-4">
                        <h4>
                            Mulai dari Rp {{ number_format($service->sale_price ?? $service->original_price, 0, ',', '.') }}
                        </h4>
                    </div>
                    <button class="btn btn-primary btn-lg">Pesan Sekarang</button>
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
