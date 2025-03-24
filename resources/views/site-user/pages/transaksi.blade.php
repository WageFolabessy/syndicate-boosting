@extends('site-user.components.main')
@section('meta')
    <meta name="description"
        content="Lihat riwayat transaksi boosting game Anda di Syndicate. Temukan detail order, tanggal transaksi, status, dan nominal dengan mudah." />
    <meta name="keywords" content="transaksi, riwayat transaksi, game boosting, joki game, boosting game, order history" />
    <meta name="author" content="Syndicate" />
    <link rel="canonical" href="https://syndicate-gaming.com/transaksi.html" />
    <meta property="og:title" content="Riwayat Transaksi Boosting Game - Syndicate" />
    <meta property="og:description"
        content="Cek dan cari riwayat transaksi boosting game Anda dengan mudah di Syndicate." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/transaksi.html" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Transaksi
@endsection
@section('content')
    <main>
        <!-- Bagian Header -->
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-4" data-aos="fade-up">
                        <span class="section-tag">Transaksi</span>
                        <h1>Cari Transaksi</h1>
                        <p class="lead">Cari riwayat transaksi Anda dengan mudah</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Daftar Transaksi -->
        <section class="transaction-listing py-5">
            <div class="container">
                <!-- Bar Pencarian -->
                <div class="search-sort-bar mb-4" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="position-relative">
                                <input type="text" id="searchTransaction" class="form-control"
                                    placeholder="Masukan nomor transaksi..." />
                                <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabel Riwayat Transaksi -->
            </div>
        </section>
    </main>
@endsection
