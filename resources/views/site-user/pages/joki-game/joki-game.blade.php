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
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->name }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->name }}</h5>
                            <p class="card-text">{{ $game->genre }}</p>
                            <a href="{{ route('pilih-layanan', $game->id) }}" class="btn btn-primary">Pilih Layanan
                                Joki</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
@endsection
