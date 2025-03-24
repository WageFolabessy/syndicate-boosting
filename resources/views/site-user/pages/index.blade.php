@extends('site-user.components.main')
@section('meta')
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Syndicate - Premium Game Boosting & Accounts" />
    <meta property="og:description"
        content="Professional game boosting services and premium game accounts for serious players." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com" />
    <meta property="og:image" content="/images/logo.png" />
@endsection
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up">
                            <span class="subtitle">Layanan Gaming Premium</span>
                            <h1>Tingkatkan Pengalaman Gaming Anda</h1>
                            <p>
                                Layanan peningkatan game profesional dan akun premium untuk
                                para pemain serius.
                            </p>
                            <div class="hero-buttons">
                                <a href="{{ route('joki-game') }}" class="btn btn-primary">Joki Game</a>
                                <a href="{{ route('akun-game') }}" class="btn btn-outline">Akun Game</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="fade-left">
                            <img src="{{ asset('assets/site_users/images/logo.png') }}"
                                alt="Setup gaming dengan pengalaman gaming premium" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Games Section -->
        <section class="featured-section">
            <div class="container">
                <div class="section-header text-center" data-aos="fade-up">
                    <span class="section-tag">Layanan Unggulan</span>
                    <h2>Jasa Joki Game Terpopuler</h2>
                    <p>Layanan joki profesional untuk game kompetitif terpopuler</p>
                </div>

                <div class="row game-cards">
                    <!-- Kartu Game 1 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <a href="#" class="card game-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/ml2.jpg') }}" alt="Mobile Legends"
                                    class="img-thumbnail card-img-top" />
                                <div class="relative card-badge z-3">Trending</div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Mobile Legends</h3>
                                <p class="card-text">
                                    Peningkatan peringkat, pencapaian medali & pelatihan
                                    profesional
                                </p>
                                <div class="card-meta">
                                    <span class="price">Mulai dari Rp 50.000</span>
                                    <span class="rating"><i class="bi bi-star-fill"></i> 4.9</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Kartu Game 2 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <a href="#" class="card game-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/valorant.webp') }}" alt="Valorant"
                                    class="card-img-top" />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Valorant</h3>
                                <p class="card-text">
                                    Peningkatan peringkat, penempatan akun & pelatihan
                                    kompetitif
                                </p>
                                <div class="card-meta">
                                    <span class="price">Mulai dari Rp 100.000</span>
                                    <span class="rating"><i class="bi bi-star-fill"></i> 4.8</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Kartu Game 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="card game-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/apex-legend.jpg') }}" alt="Apex Legend"
                                    class="card-img-top" />
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Apex Legend</h3>
                                <p class="card-text">
                                    Pembersihan zona, pertempuran bos, farming gear &
                                    pembangunan akun
                                </p>
                                <div class="card-meta">
                                    <span class="price">Mulai dari Rp 75.000</span>
                                    <span class="rating"><i class="bi bi-star-fill"></i> 4.9</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('joki-game') }}" class="btn btn-outline-dark">Lihat Semua Game</a>
                </div>
            </div>
        </section>

        <!-- Premium Accounts Section -->
        <section class="accounts-section">
            <div class="container">
                <div class="section-header text-center" data-aos="fade-up">
                    <span class="section-tag">Akun Premium</span>
                    <h2>Akun Game Unggulan</h2>
                    <p>
                        Akun yang telah dibangun dengan item langka, peringkat tinggi, dan
                        konten eksklusif
                    </p>
                </div>

                <div class="row account-cards">
                    <!-- Kartu Akun 1 -->
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card account-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/ml2.jpg') }}" alt="Akun Mobile Legends Mythic"
                                    class="card-img-top" />
                                <div class="card-badge verified">Terverifikasi</div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Mobile Legends</h3>
                                <p class="card-subtitle">Mythical Glory</p>
                                <ul class="account-features">
                                    <li>
                                        <i class="bi bi-check-circle"></i> Lebih dari 80 Hero
                                        Terbuka
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> 50+ Skin Epic & Spesial
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> Set Lambang Maksimal
                                    </li>
                                </ul>
                                <div class="account-price">
                                    <span class="current-price">Rp 3.200.000</span>
                                    <a href="#" class="btn btn-sm btn-view">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kartu Akun 2 -->
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="card account-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/valorant.webp') }}"
                                    alt="Akun Valorant Radiant" class="card-img-top" />
                                <div class="card-badge verified">Terverifikasi</div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Valorant</h3>
                                <p class="card-subtitle">Peringkat Radiant</p>
                                <ul class="account-features">
                                    <li>
                                        <i class="bi bi-check-circle"></i> Semua Agen Terbuka
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> Koleksi Skin Premium
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> Battle Pass Selesai
                                    </li>
                                </ul>
                                <div class="account-price">
                                    <span class="current-price">Rp 5.000.000</span>
                                    <a href="#" class="btn btn-sm btn-view">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kartu Akun 3 -->
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="card account-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/apex-legend.jpg') }}"
                                    alt="Akun Apex Legend AR60" class="card-img-top" />
                                <div class="card-badge verified">Terverifikasi</div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Apex Legend</h3>
                                <p class="card-subtitle">Akun AR 60 Whale</p>
                                <ul class="account-features">
                                    <li>
                                        <i class="bi bi-check-circle"></i> 30+ Karakter Bintang 5
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> 15+ Senjata Bintang 5
                                        (R5)
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> Semua Area Selesai 100%
                                    </li>
                                </ul>
                                <div class="account-price">
                                    <span class="current-price">Rp 8.500.000</span>
                                    <a href="#" class="btn btn-sm btn-view">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kartu Akun 4 -->
                    <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="card account-card">
                            <div class="card-image">
                                <img src="{{ asset('assets/site_users/images/pb.jpg') }}" alt="Akun Point Blank Conqueror"
                                    class="card-img-top" />
                                <div class="card-badge verified">Terverifikasi</div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Point Blank</h3>
                                <p class="card-subtitle">Akun Conqueror</p>
                                <ul class="account-features">
                                    <li>
                                        <i class="bi bi-check-circle"></i> 200+ Outfit Langka
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> Skin Senjata Mythic &
                                        Legendary
                                    </li>
                                    <li>
                                        <i class="bi bi-check-circle"></i> RP Hadiah Season 1-20
                                    </li>
                                </ul>
                                <div class="account-price">
                                    <span class="current-price">Rp 4.800.000</span>
                                    <a href="#" class="btn btn-sm btn-view">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="{{ route('akun-game') }}" class="btn btn-outline-dark">Lihat Semua Akun</a>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="why-us-section">
            <div class="container">
                <div class="section-header text-center" data-aos="fade-up">
                    <span class="section-tag">Mengapa Memilih Kami</span>
                    <h2>Keunggulan The Syndicate</h2>
                    <p>
                        Kami menyediakan layanan gaming premium dengan fokus pada
                        kualitas, keamanan, dan kepuasan pelanggan
                    </p>
                </div>

                <div class="row features">
                    <!-- Fitur 1 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h3>Aman & Terpercaya</h3>
                            <p>
                                Semua transaksi dienkripsi dan aman. Kami melindungi data
                                serta akun game Anda dengan standar keamanan industri.
                            </p>
                        </div>
                    </div>

                    <!-- Fitur 2 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <h3>Joki Profesional</h3>
                            <p>
                                Tim joki kami terdiri dari pemain profesional dengan rekam
                                jejak yang terbukti di dunia game kompetitif.
                            </p>
                        </div>
                    </div>

                    <!-- Fitur 3 -->
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h3>Dukungan 24/7</h3>
                            <p>
                                Tim dukungan pelanggan kami siap membantu 24 jam sehari untuk
                                menjawab pertanyaan atau mengatasi masalah Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bagian Cara Kerja -->
        @include('site-user.components.how-it-works')

        <!-- Bagian FAQ -->
        @include('site-user.components.faq')
    </main>
@endsection
