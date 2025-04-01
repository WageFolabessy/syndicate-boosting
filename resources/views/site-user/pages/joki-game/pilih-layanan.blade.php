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
            <!-- Joki Paket -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Joki Paket</h3>
                        <p>Layanan boosting dengan paket harga tetap</p>
                        <a href="{{ route('joki-paket', $game->id) }}" class="btn btn-success">Pilih Joki Paket</a>
                    </div>
                </div>
            </div>
            <!-- Joki Custom -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Joki Custom</h3>
                        <p>Layanan boosting custom dengan pilihan rank & tier</p>
                        <a href="{{ route('joki-kostum', $game->id) }}" class="btn btn-primary">Pilih Joki Custom</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
