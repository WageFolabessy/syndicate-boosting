{{-- Modal Notifikasi Pembayaran (Success / Pending / Error / Cancelled / Gagal Token) --}}
<div class="modal fade" id="paymentNotifModal" tabindex="-1" aria-labelledby="paymentNotifModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">

            {{-- Header --}}
            <div class="modal-header border-0 pb-0 justify-content-center pt-4">
                <div class="text-center w-100">
                    <div id="notifIcon" class="mb-3" style="font-size: 4rem; line-height: 1;"></div>
                    <h5 class="modal-title fw-bold fs-4" id="paymentNotifModalLabel"></h5>
                    <p class="text-muted small mb-0" id="notifSubtitle"></p>
                </div>
            </div>

            {{-- Body --}}
            <div class="modal-body px-4 py-3" id="notifBody"></div>

            {{-- Footer --}}
            <div class="modal-footer border-0 px-4 pb-4 pt-2 d-grid gap-2" id="notifFooter"></div>
        </div>
    </div>
</div>

<script>
    /**
     * Tampilkan modal notifikasi pembayaran.
     *
     * @param {string} type        - 'success' | 'pending' | 'error' | 'cancelled' | 'snap_failed'
     * @param {string} [txNumber]  - Nomor transaksi (hanya untuk state 'success')
     * @param {string} [email]     - Email pelanggan (hanya untuk state 'success')
     */
    function showPaymentNotif(type, txNumber = null, email = '') {
        const icon     = document.getElementById('notifIcon');
        const title    = document.getElementById('paymentNotifModalLabel');
        const subtitle = document.getElementById('notifSubtitle');
        const body     = document.getElementById('notifBody');
        const footer   = document.getElementById('notifFooter');

        // Reset
        body.innerHTML   = '';
        footer.innerHTML = '';

        const closeBtn = `<button type="button" class="btn btn-outline-secondary rounded-3"
            data-bs-dismiss="modal" onclick="window.location.reload()">Tutup</button>`;

        // For the success state the page (e.g. a now-deactivated game account) may
        // be invalid after payment, so we redirect to the transaction list instead of reloading.
        const successCloseBtn = (txNum) => `<button type="button" class="btn btn-outline-secondary rounded-3"
            data-bs-dismiss="modal"
            onclick="window.location.href='/transaksi${txNum ? '?search=' + txNum : ''}'">
            Tutup
        </button>`;

        if (type === 'success') {
            icon.innerHTML   = '<i class="bi bi-check-circle-fill text-success"></i>';
            title.textContent = 'Pembayaran Berhasil!';
            subtitle.textContent = 'Terima kasih telah melakukan pemesanan';

            body.innerHTML = `
                <div class="bg-light rounded-3 p-3 mb-3">
                    <p class="text-muted small mb-1 fw-semibold text-uppercase">
                        <i class="bi bi-hash me-1"></i>Nomor Transaksi
                    </p>
                    <div class="d-flex align-items-center justify-content-between gap-2">
                        <span id="notifTxNumber" class="fw-bold fs-6 text-primary font-monospace">${txNumber}</span>
                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill"
                            onclick="copyTxNumber()" title="Salin nomor transaksi">
                            <i class="bi bi-clipboard" id="copyIcon"></i>
                        </button>
                    </div>
                </div>
                <div class="alert d-flex align-items-start gap-2 py-2 px-3 rounded-3 border-0 mb-3"
                    style="background-color:#e8f4fd;">
                    <i class="bi bi-envelope-check-fill text-primary mt-1 flex-shrink-0"></i>
                    <div class="small">
                        Nomor transaksi juga telah dikirim ke <strong>${email || 'email Anda'}</strong>.
                        Simpan nomor ini untuk memantau status pesanan.
                    </div>
                </div>
                <div class="d-flex align-items-start gap-2 text-muted small">
                    <i class="bi bi-info-circle flex-shrink-0 mt-1"></i>
                    <span>Pesanan sedang diproses. Tim kami akan segera menghubungi Anda melalui WhatsApp yang telah didaftarkan.</span>
                </div>`;

            footer.innerHTML = `
                <button type="button" class="btn btn-primary btn-lg rounded-3 fw-semibold"
                    onclick="window.location.href='/transaksi?search=${txNumber}'">
                    <i class="bi bi-receipt me-2"></i>Lihat Transaksi Saya
                </button>
                ${successCloseBtn(txNumber)}`;

        } else if (type === 'pending') {
            icon.innerHTML   = '<i class="bi bi-hourglass-split text-warning"></i>';
            title.textContent = 'Pembayaran Pending';
            subtitle.textContent = 'Transaksi Anda sedang menunggu konfirmasi';

            body.innerHTML = `
                <div class="alert alert-warning d-flex align-items-start gap-2 py-2 px-3 rounded-3 border-0 mb-3">
                    <i class="bi bi-clock-history flex-shrink-0 mt-1"></i>
                    <div class="small">
                        Pembayaran Anda masih <strong>pending</strong>. Silakan selesaikan pembayaran
                        sesuai metode yang dipilih atau cek status pembayaran di halaman transaksi.
                    </div>
                </div>`;

            footer.innerHTML = `
                <button type="button" class="btn btn-warning btn-lg rounded-3 fw-semibold text-white"
                    onclick="window.location.href='/transaksi'">
                    <i class="bi bi-receipt me-2"></i>Cek Status Transaksi
                </button>
                ${closeBtn}`;

        } else if (type === 'error') {
            icon.innerHTML   = '<i class="bi bi-x-circle-fill text-danger"></i>';
            title.textContent = 'Pembayaran Gagal';
            subtitle.textContent = 'Terjadi kesalahan saat memproses pembayaran';

            body.innerHTML = `
                <div class="alert alert-danger d-flex align-items-start gap-2 py-2 px-3 rounded-3 border-0 mb-3">
                    <i class="bi bi-exclamation-triangle-fill flex-shrink-0 mt-1"></i>
                    <div class="small">
                        Terjadi kesalahan dalam proses pembayaran. Silakan coba lagi atau
                        hubungi tim kami jika masalah berlanjut.
                    </div>
                </div>`;

            footer.innerHTML = `
                <button type="button" class="btn btn-danger btn-lg rounded-3 fw-semibold"
                    data-bs-dismiss="modal" onclick="window.location.reload()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Coba Lagi
                </button>`;

        } else if (type === 'cancelled') {
            icon.innerHTML   = '<i class="bi bi-slash-circle text-secondary"></i>';
            title.textContent = 'Pembayaran Dibatalkan';
            subtitle.textContent = 'Anda menutup jendela pembayaran';

            body.innerHTML = `
                <div class="alert alert-secondary d-flex align-items-start gap-2 py-2 px-3 rounded-3 border-0 mb-3">
                    <i class="bi bi-info-circle flex-shrink-0 mt-1"></i>
                    <div class="small">
                        Pembayaran dibatalkan. Pesanan Anda belum diproses.
                        Anda bisa mencoba memesan kembali kapan saja.
                    </div>
                </div>`;

            footer.innerHTML = `
                <button type="button" class="btn btn-secondary btn-lg rounded-3 fw-semibold"
                    data-bs-dismiss="modal">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </button>`;

        } else if (type === 'snap_failed') {
            icon.innerHTML   = '<i class="bi bi-wifi-off text-danger"></i>';
            title.textContent = 'Gagal Memuat Pembayaran';
            subtitle.textContent = 'Tidak dapat terhubung ke layanan pembayaran';

            body.innerHTML = `
                <div class="alert alert-danger d-flex align-items-start gap-2 py-2 px-3 rounded-3 border-0 mb-3">
                    <i class="bi bi-exclamation-triangle-fill flex-shrink-0 mt-1"></i>
                    <div class="small">
                        Gagal mendapatkan token pembayaran dari server. Periksa koneksi internet Anda
                        dan coba lagi. Jika masalah berlanjut, silakan hubungi tim kami.
                    </div>
                </div>`;

            footer.innerHTML = `
                <button type="button" class="btn btn-danger btn-lg rounded-3 fw-semibold"
                    data-bs-dismiss="modal" onclick="window.location.reload()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Coba Lagi
                </button>`;

        } else if (type === 'session_expired') {
            icon.innerHTML   = '<i class="bi bi-clock-fill text-warning"></i>';
            title.textContent = 'Sesi Berakhir';
            subtitle.textContent = 'Sesi Anda telah kedaluwarsa';

            body.innerHTML = `
                <div class="alert alert-warning d-flex align-items-start gap-2 py-2 px-3 rounded-3 border-0 mb-3">
                    <i class="bi bi-info-circle flex-shrink-0 mt-1"></i>
                    <div class="small">
                        Sesi Anda telah berakhir. Halaman akan dimuat ulang secara otomatis.
                    </div>
                </div>`;

            footer.innerHTML = `
                <button type="button" class="btn btn-warning btn-lg rounded-3 fw-semibold text-white"
                    onclick="window.location.reload()">
                    <i class="bi bi-arrow-clockwise me-2"></i>Muat Ulang
                </button>`;
        }

        const modal = new bootstrap.Modal(document.getElementById('paymentNotifModal'));
        modal.show();

        // Auto-reload untuk session_expired setelah 3 detik
        if (type === 'session_expired') {
            setTimeout(() => window.location.reload(), 3000);
        }
    }

    function copyTxNumber() {
        const text = document.getElementById('notifTxNumber').textContent;
        navigator.clipboard.writeText(text).then(function() {
            const icon = document.getElementById('copyIcon');
            icon.className = 'bi bi-clipboard-check text-success';
            setTimeout(() => { icon.className = 'bi bi-clipboard'; }, 2000);
        });
    }
</script>
