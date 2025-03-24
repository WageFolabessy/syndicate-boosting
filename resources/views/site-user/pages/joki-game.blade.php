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
    <!-- Daftar Game -->
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
                <div class="col-lg-4 col-md-6 game-item moba" data-aos="fade-up" data-aos-delay="100">
                    <a href="#" class="card game-card">
                        <div class="card-image">
                            <img src="{{ asset('assets/site-user/images/ml2.jpg') }}" alt="Mobile Legends"
                                class="card-img-top" />
                            <div class="card-badge">Produk Terlaris</div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Mobile Legends</h3>
                            <div class="game-meta">
                                <span><i class="bi bi-controller"></i> MOBA</span>
                                <span><i class="bi bi-star-fill"></i> 4.9 (120 Ulasan)</span>
                            </div>
                            <p class="card-text">
                                Peningkatan peringkat dari Warrior ke Mythical Glory,
                                pencapaian medali kustom, pelatihan profesional
                            </p>
                            <div class="card-meta">
                                <span class="price">Mulai dari Rp 50.000</span>
                                <button class="btn btn-sm btn-primary">Lihat Paket</button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 game-item moba" data-aos="fade-up" data-aos-delay="200">
                    <a href="#" class="card game-card">
                        <div class="card-image">
                            <img src="{{ asset('assets/site-user/images/valorant.webp') }}" alt="Valorant"
                                class="card-img-top" />
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Valorant</h3>
                            <div class="game-meta">
                                <span><i class="bi bi-controller"></i> MOBA</span>
                                <span><i class="bi bi-star-fill"></i> 4.8 (95 Ulasan)</span>
                            </div>
                            <p class="card-text">
                                Peningkatan MMR, pertandingan kalibrasi, peningkatan skor
                                perilaku, pelatihan profesional
                            </p>
                            <div class="card-meta">
                                <span class="price">Mulai dari Rp 120.000</span>
                                <button class="btn btn-sm btn-primary">Lihat Paket</button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 game-item moba" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="card game-card">
                        <div class="card-image">
                            <img src="{{ asset('assets/site-user/images/pb.jpg') }}" alt="Point Blank"
                                class="card-img-top" />
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Point Blank</h3>
                            <div class="game-meta">
                                <span><i class="bi bi-controller"></i> MOBA</span>
                                <span><i class="bi bi-star-fill"></i> 4.7 (88 Ulasan)</span>
                            </div>
                            <p class="card-text">
                                Peningkatan peringkat dari Iron ke Challenger, penempatan,
                                penguasaan champion, pelatihan
                            </p>
                            <div class="card-meta">
                                <span class="price">Mulai dari Rp 150.000</span>
                                <button class="btn btn-sm btn-primary">Lihat Paket</button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 game-item moba" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="card game-card">
                        <div class="card-image">
                            <img src="{{ asset('assets/site-user/images/apex-legend.jpg') }}" alt="Apex Legend"
                                class="card-img-top" />
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Apex Legend</h3>
                            <div class="game-meta">
                                <span><i class="bi bi-controller"></i> MOBA</span>
                                <span><i class="bi bi-star-fill"></i> 4.7 (88 Ulasan)</span>
                            </div>
                            <p class="card-text">
                                Peningkatan peringkat dari Iron ke Challenger, penempatan,
                                penguasaan champion, pelatihan
                            </p>
                            <div class="card-meta">
                                <span class="price">Mulai dari Rp 150.000</span>
                                <button class="btn btn-sm btn-primary">Lihat Paket</button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 game-item moba" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="card game-card">
                        <div class="card-image">
                            <img src="{{ asset('assets/site-user/images/so.webp') }}" alt="Seal Online"
                                class="card-img-top" />
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Seal Online</h3>
                            <div class="game-meta">
                                <span><i class="bi bi-controller"></i> MOBA</span>
                                <span><i class="bi bi-star-fill"></i> 4.7 (88 Ulasan)</span>
                            </div>
                            <p class="card-text">
                                Peningkatan peringkat dari Iron ke Challenger, penempatan,
                                penguasaan champion, pelatihan
                            </p>
                            <div class="card-meta">
                                <span class="price">Mulai dari Rp 150.000</span>
                                <button class="btn btn-sm btn-primary">Lihat Paket</button>
                            </div>
                        </div>
                    </a>
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
