<!-- Modal Order -->
<div class="modal fade" id="orderAccountModal" tabindex="-1" aria-labelledby="orderAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 overflow-hidden">
            <!-- Modal Header -->
            <div class="modal-header bg-gradient-primary text-white position-relative">
                <div class="w-100 text-center">
                    <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 50px; height: 50px;">
                        <i class="bi bi-controller fs-4"></i>
                    </div>
                    <h5 class="modal-title fs-4 fw-bold mb-2" id="orderAccountModalLabel">Pemesanan Akun Game</h5>
                    <p class="mb-0 opacity-75">Isi data dengan teliti dan akurat</p>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-3 end-3"
                    data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 p-lg-5">
                <form id="orderAccountForm" class="needs-validation" novalidate>
                    <div class="row g-4">
                        <!-- Nama Panggilan -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-3" id="customer_name" name="customer_name"
                                 required placeholder="08123456789">
                                <label for="customer_name" class="text-muted">
                                    <i class="bi bi-person me-2"></i>Nama Panggilan Anda <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                        <!-- Kontak WhatsApp -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="tel" class="form-control rounded-3" id="kontak" name="kontak"
                                    required placeholder="+628123456789">
                                <label for="kontak" class="text-muted">
                                    <i class="bi bi-whatsapp me-2"></i>Nomor WhatsApp <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light justify-content-center border-0">
                <div class="w-100 d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg order-button">
                        Konfirmasi Pembayaran Rp.
                        {{ number_format($account->sale_price ?? $account->original_price, 0, ',', '.') }}
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                    <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">
                        Batalkan Pemesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
