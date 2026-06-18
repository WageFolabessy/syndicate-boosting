@extends('site-user.components.main')

@section('meta')
    <meta name="description" content="Kebijakan Privasi Syndicate Booster. Pelajari bagaimana kami melindungi data pribadi, kredensial game, dan informasi transaksi Anda secara aman." />
    <meta name="keywords" content="kebijakan privasi, privacy policy, keamanan akun, data joki, syndicate boosting" />
    <meta name="author" content="Syndicate Booster" />
    <meta property="og:title" content="Kebijakan Privasi - Syndicate Booster" />
    <meta property="og:description" content="Pelajari bagaimana kami mengelola dan melindungi data pribadi serta akun game Anda dengan aman di Syndicate Booster." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('privacy-policy') }}" />
    <meta property="og:image" content="{{ asset('assets/site-user/images/logo.png') }}" />
@endsection

@section('title')
    - Kebijakan Privasi
@endsection

@section('css')
    <style>
        .policy-card {
            border-radius: 1.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        }
        .policy-content h3 {
            font-weight: 700;
            color: #212529;
            font-size: 1.5rem;
        }
        .policy-content p, .policy-content li {
            color: #495057;
            line-height: 1.8;
        }
        .policy-content ul {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .policy-content li {
            margin-bottom: 0.5rem;
        }
        .section-tag {
            display: inline-block;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 0.5rem 1.25rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Page Header -->
        <section class="page-header py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="section-tag">Syndicate Booster</span>
                        <h1 class="fw-bold display-5">Kebijakan Privasi</h1>
                        <p class="lead text-muted">Bagaimana kami mengelola dan melindungi informasi serta akun game Anda</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Policy Content -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card policy-card p-4 p-md-5 bg-white">
                            <div class="policy-content">
                                <p class="text-muted mb-4">Terakhir diperbarui: 18 Juni 2026</p>
                                <hr class="my-4">
                                
                                <h3 class="mb-3">1. Informasi yang Kami Kumpulkan</h3>
                                <p>Kami mengumpulkan beberapa jenis informasi untuk memberikan layanan joki game (boosting) dan penjualan akun premium kepada Anda secara efektif:</p>
                                <ul>
                                    <li><strong>Informasi Kontak Pribadi:</strong> Nama lengkap Anda, alamat email, dan nomor WhatsApp.</li>
                                    <li><strong>Kredensial Akun Game:</strong> Untuk menjalankan layanan joki (boosting), kami membutuhkan kredensial masuk akun game Anda (seperti Username, Email, Password, Server, dan Metode Login).</li>
                                    <li><strong>Detail Transaksi:</strong> Informasi detail pesanan Anda, nomor invoice transaksi, dan riwayat pembayaran melalui payment gateway pihak ketiga (Midtrans). Kami tidak pernah mengumpulkan atau menyimpan kredensial finansial (seperti detail kartu kredit) secara langsung di server kami.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">2. Penggunaan Informasi Anda</h3>
                                <p>Kami menggunakan data yang dikumpulkan untuk tujuan operasional berikut:</p>
                                <ul>
                                    <li>Untuk memproses pesanan, menghitung selisih harga joki, dan menyelesaikan progress joki game Anda.</li>
                                    <li>Untuk mengirimkan notifikasi status pembayaran serta pembaruan progress pengerjaan melalui sistem email otomatis dan dashboard.</li>
                                    <li>Untuk melakukan transaksi pembayaran secara aman menggunakan layanan gerbang pembayaran (Midtrans).</li>
                                    <li>Untuk memverifikasi identitas pengguna dan mencegah manipulasi transaksi finansial yang merugikan.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">3. Keamanan Kredensial Akun Game</h3>
                                <p>Keamanan akun game Anda merupakan prioritas mutlak kami. Kami menerapkan standar perlindungan berikut:</p>
                                <ul>
                                    <li>Kredensial login akun Anda hanya akan diakses secara rahasia oleh joki profesional yang secara khusus menangani orderan Anda.</li>
                                    <li>Seluruh joki terikat dengan aturan privasi yang ketat dan dilarang keras untuk memindahkan barang berharga dalam game, membagikan informasi akun ke pihak lain, atau memodifikasi kredensial akun tanpa persetujuan Anda.</li>
                                    <li>Setelah pengerjaan joki ditandai selesai (<code>success</code>), kami menghapus/menyembunyikan data kredensial Anda dari sistem kami dan kami sangat merekomendasikan Anda untuk langsung memperbarui password akun game Anda demi keamanan tambahan.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">4. Cookie & Teknologi Sesi</h3>
                                <p>Kami menggunakan cookie teknis yang aman (<code>syndicate_boosting_session</code> dan <code>XSRF-TOKEN</code>) untuk mengidentifikasi sesi Anda di browser, mempermudah akses login dashboard, serta mencegah eksploitasi serangan Cross-Site Request Forgery (CSRF). Anda dapat mengatur browser untuk menolak cookie, namun hal ini dapat mengganggu fungsionalitas fungsional dari beberapa fitur web.</p>

                                <h3 class="mt-4 mb-3">5. Hak Pengguna</h3>
                                <p>Anda memiliki hak untuk meminta penghapusan informasi data kontak atau riwayat pesanan Anda dari database kami kapan saja dengan menghubungi kami secara resmi melalui WhatsApp. Namun, data transaksi tertentu akan tetap disimpan sesuai kebutuhan kepatuhan hukum transaksi keuangan.</p>

                                <h3 class="mt-4 mb-3">6. Hubungi Kami</h3>
                                <p>Apabila Anda memiliki pertanyaan, kekhawatiran, atau permintaan terkait Kebijakan Privasi ini, silakan hubungi tim dukungan kami melalui tautan WhatsApp yang tersedia di bagian footer situs ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
