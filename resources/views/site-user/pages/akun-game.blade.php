@extends('site-user.components.main')
@section('meta')
    <meta name="keywords"
        content="game accounts, jual akun game, premium accounts, mobile legends account, valorant account" />
    <meta name="author" content="Syndicate" />
    <meta property="og:title" content="Premium Game Accounts - Syndicate" />
    <meta property="og:description"
        content="Browse and buy premium game accounts with rare items, high ranks, and exclusive content." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/akun-game" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Akun Game
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/site_users/css/akun-game.css') }}">
@endsection
@section('content')
    <main>
        <!-- Bagian Header -->
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-4" data-aos="fade-up">
                        <span class="section-tag">Akun Premium</span>
                        <h1>Marketplace Akun Game</h1>
                        <p class="lead">
                            Jelajahi dan beli akun game premium terverifikasi dengan item
                            langka dan peringkat tinggi
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Daftar Akun -->
        <section class="account-listings">
            <div class="container">
                <!-- Bar Pencarian & Penyortiran -->
                <div class="search-sort-bar mb-4" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Cari akun..." />
                                <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Grid Akun -->
                <div class="row account-grid">
                    <!-- Kartu Akun 1 -->
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="premium-account-card position-relative">
                            <div class="account-images position-relative">
                                <!-- Ganti carousel dengan satu gambar statis -->
                                <div class="single-account-image">
                                    <img src="{{ asset('assets/site_users/images/ml2.jpg') }}"
                                        alt="Screenshot Akun Mobile Legends" class="img-fluid w-100" />
                                </div>
                                <div class="account-badges">
                                    <span class="badge bg-success">Terverifikasi</span>
                                    <span class="badge bg-primary">Premium</span>
                                </div>
                            </div>
                            <div class="account-details">
                                <h5>Mobile Legends Mythical Glory</h5>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small><i class="bi bi-controller"></i> MOBA</small>
                                    <small><i class="bi bi-person"></i> Level 85</small>
                                    <small><i class="bi bi-clock"></i> 2+ Tahun</small>
                                </div>
                                <ul class="list-unstyled mb-3">
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> 80+ Hero Terbuka
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> 50+ Skin Epic &amp; Spesial
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> Semua Set Lambang Maks Level
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> Season 18-25 Mythical Glory
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price-tag">
                                        <span class="current-price">Rp 3,200,000</span>
                                        <span class="original-price">Rp 4,000,000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Kartu Akun 2 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="premium-account-card position-relative">
                            <div class="account-images position-relative">
                                <div class="single-account-image">
                                    <img src="{{ asset('assets/site_users/images/pb.jpg') }}" alt="Screenshot Akun Valorant"
                                        class="img-fluid w-100" />
                                </div>
                                <div class="account-badges">
                                    <span class="badge bg-success">Terverifikasi</span>
                                    <span class="badge bg-warning">Unggulan</span>
                                </div>
                            </div>
                            <div class="account-details">
                                <h5>Point Blank</h5>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small><i class="bi bi-controller"></i> FPS</small>
                                    <small><i class="bi bi-person"></i> Level 178</small>
                                    <small><i class="bi bi-clock"></i> 1.5 Tahun</small>
                                </div>
                                <ul class="list-unstyled mb-3">
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> Semua Agen Terbuka
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> Koleksi Skin Premium
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> Battle Pass Lengkap (E1-E7)
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle-fill text-success"></i> Radiant Rank 3 Act Terakhir
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price-tag">
                                        <span class="current-price">Rp 5,000,000</span>
                                        <span class="original-price">Rp 6,500,000</span>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
@endsection
