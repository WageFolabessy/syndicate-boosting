@extends('site-user.components.main')

@section('meta')
    <meta name="description" content="Syarat Layanan Syndicate Booster. Pahami hak, kewajiban, ketentuan pembayaran Midtrans, serta aturan joki game sebelum Anda melakukan pemesanan." />
    <meta name="keywords" content="syarat layanan, terms of service, aturan joki, ketentuan pembayaran, refund, syndicate boosting" />
    <meta name="author" content="Syndicate Booster" />
    <meta property="og:title" content="Syarat Layanan - Syndicate Booster" />
    <meta property="og:description" content="Pahami aturan, ketentuan pemesanan joki, dan regulasi transaksi aman di Syndicate Booster." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('terms-of-service') }}" />
    <meta property="og:image" content="{{ asset('assets/site-user/images/logo.png') }}" />
@endsection

@section('title')
    - Syarat Layanan
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
                        <h1 class="fw-bold display-5">Syarat Layanan</h1>
                        <p class="lead text-muted">Ketentuan dan aturan penggunaan jasa joki serta pembelian akun game</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="py-5 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card policy-card p-4 p-md-5 bg-white">
                            <div class="policy-content">
                                <p class="text-muted mb-4">Terakhir diperbarui: 18 Juni 2026</p>
                                <hr class="my-4">
                                
                                <h3 class="mb-3">1. Penerimaan Ketentuan</h3>
                                <p>Dengan mengakses situs web ini dan/atau melakukan pemesanan layanan joki game (boosting) atau membeli akun game di Syndicate Booster, Anda menyatakan setuju untuk terikat oleh Syarat Layanan ini, semua hukum yang berlaku, serta bertanggung jawab atas kepatuhan terhadap hukum setempat.</p>

                                <h3 class="mt-4 mb-3">2. Deskripsi Layanan</h3>
                                <p>Syndicate Booster menyediakan dua layanan utama:</p>
                                <ul>
                                    <li><strong>Jasa Joki (Boosting Services):</strong> Meningkatkan peringkat (rank), level, atau status akun game Anda melalui pengerjaan manual oleh pemain profesional (joki).</li>
                                    <li><strong>Penjualan Akun Game:</strong> Menjual kepemilikan akun game premium yang siap pakai dengan spesifikasi tertentu sesuai deskripsi produk.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">3. Tanggung Jawab Pelanggan (Khusus Layanan Joki)</h3>
                                <p>Untuk memastikan proses boosting berjalan lancar dan aman, Pelanggan wajib menaati ketentuan berikut:</p>
                                <ul>
                                    <li>Memberikan data kredensial login akun game yang valid dan akurat (Username, Password, Server, Metode Login).</li>
                                    <li><strong>Dilarang keras melakukan login</strong> ke dalam game selama proses pengerjaan joki berlangsung. Tindakan menabrak login (multi-login) dapat mengganggu pengerjaan joki, memicu proteksi keamanan game, dan membatalkan garansi order.</li>
                                    <li>Memastikan rank awal akun game yang dimasukkan pada form pemesanan sesuai dengan kondisi asli akun. Jika terdapat selisih rank awal, joki berhak menangguhkan pengerjaan hingga biaya selisih diselesaikan oleh pelanggan.</li>
                                    <li>Menonaktifkan proteksi otentikasi ganda (seperti 2FA/OTP) sementara waktu atau siap siaga memberikan kode OTP kepada admin/joki saat diperlukan untuk login pertama kali.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">4. Pembayaran & Pembatalan Order</h3>
                                <ul>
                                    <li>Semua pembayaran diselesaikan di muka secara penuh melalui gateway pembayaran resmi kami (Midtrans).</li>
                                    <li>Pesanan yang sudah diproses dan sedang dalam pengerjaan oleh joki **tidak dapat dibatalkan** atau di-refund secara sepihak oleh pelanggan.</li>
                                    <li>Refund (pengembalian dana) penuh atau sebagian hanya akan diproses apabila tim kami tidak dapat memulai pengerjaan pesanan Anda dalam waktu 3x24 jam atau joki kami tidak sanggup menyelesaikan target pesanan karena alasan teknis internal.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">5. Batasan Tanggung Jawab</h3>
                                <p>Layanan kami sepenuhnya dilakukan secara manual oleh pemain ahli tanpa menggunakan cheat, program ilegal, maupun bot. Namun, Anda memahami dan menyetujui bahwa:</p>
                                <ul>
                                    <li>Tindakan membagikan akun game atau menggunakan jasa boosting (joki) berpotensi melanggar Syarat dan Ketentuan (EULA) pengembang game yang bersangkutan.</li>
                                    <li>Syndicate Booster tidak bertanggung jawab atas tindakan disipliner yang dijatuhkan oleh pengembang game terhadap akun Anda (seperti pembekuan akun/ban, penurunan rank secara paksa, dll). Kami meminimalkan risiko ini dengan menerapkan opsi VPN wilayah asal pelanggan selama pengerjaan.</li>
                                </ul>

                                <h3 class="mt-4 mb-3">6. Perubahan Ketentuan Layanan</h3>
                                <p>Syndicate Booster berhak untuk merevisi syarat layanan ini untuk situs webnya kapan saja tanpa pemberitahuan sebelumnya. Dengan terus menggunakan situs web ini setelah revisi dipasang, Anda menyetujui versi terbaru dari Syarat Layanan tersebut.</p>

                                <h3 class="mt-4 mb-3">7. Kontak Dukungan</h3>
                                <p>Apabila terdapat perselisihan atau pertanyaan mengenai Syarat Layanan ini, silakan hubungi tim dukungan kami melalui tautan tombol WhatsApp resmi yang tertera di bagian bawah (footer) situs web.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
