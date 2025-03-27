<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Apakah akun saya aman selama proses boosting?',
            'answer'   => 'Ya, keamanan akun Anda adalah prioritas utama kami. Semua joki kami adalah profesional terverifikasi yang mengikuti protokol keamanan yang ketat. Kami menggunakan VPN yang aman dan sesuai dengan lokasi Anda untuk mencegah tanda aktivitas mencurigakan. Selain itu, kami tidak pernah meminta informasi yang tidak diperlukan selain yang diperlukan untuk layanan boosting.',
        ]);

        Faq::create([
            'question' => 'Berapa lama waktu penyelesaian pesanan boosting saya?',
            'answer'   => 'Waktu penyelesaian tergantung pada jenis layanan dan tingkat boosting yang diperlukan. Sebagian besar layanan peningkatan peringkat memakan waktu antara 1-7 hari, tergantung pada peringkat awal dan target. Pertandingan penempatan biasanya memakan waktu 1-2 hari. Untuk perkiraan waktu yang lebih spesifik, Anda dapat melihat estimasi penyelesaian pada setiap halaman layanan atau menghubungi dukungan pelanggan kami untuk informasi lebih lanjut.',
        ]);

        Faq::create([
            'question' => 'Apakah saya bisa bermain di akun saya selama proses boosting?',
            'answer'   => 'Kami menyarankan agar Anda tidak bermain di akun Anda selama proses boosting untuk menghindari konflik dan memastikan layanan berjalan dengan efisien. Namun, jika Anda perlu bermain, Anda dapat menggunakan fitur "Pause Boost" pada dashboard Anda untuk menghentikan layanan sementara. Beritahu kami setidaknya 1 jam sebelum Anda ingin bermain, dan layanan dapat dilanjutkan kembali setelah Anda selesai.',
        ]);

        Faq::create([
            'question' => 'Metode pembayaran apa saja yang diterima?',
            'answer'   => 'Kami menerima berbagai metode pembayaran, termasuk kartu kredit/debit (Visa, Mastercard, American Express), PayPal, transfer bank, OVO, GoPay, Dana, serta berbagai opsi cryptocurrency (Bitcoin, Ethereum, USDT). Semua transaksi dilakukan secara aman dan terenkripsi.',
        ]);

        Faq::create([
            'question' => 'Apakah ada kebijakan pengembalian dana jika saya tidak puas?',
            'answer'   => 'Ya, kami menawarkan jaminan uang kembali jika Anda tidak puas dengan layanan kami. Jika kami gagal memenuhi layanan yang telah disepakati atau terdapat masalah yang sah terkait kualitas pekerjaan kami, Anda dapat mengajukan permintaan pengembalian dana dalam waktu 48 jam setelah pesanan selesai. Setiap kasus akan ditinjau secara individual oleh tim dukungan pelanggan kami.',
        ]);
    }
}
