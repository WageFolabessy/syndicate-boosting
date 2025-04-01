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

    <div class="container">
        @if ($packages->count())
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $package->image ? asset('storage/' . $package->image) : asset('assets/site-user/images/placeholder.jpg') }}"
                                alt="{{ $game->name }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $game->name }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($package->description, 100, '...') }}
                                </p>
                                <p>Mulai dari: Rp
                                    {{ number_format($package->sale_price ?? $package->original_price, 0, ',', '.') }}</p>
                                <a href="{{ route('joki-game.detail', $package->id) }}" class="btn btn-info">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Tidak ada layanan joki paket untuk game ini.</p>
        @endif
    </div>
@endsection
@section('script')
@endsection
