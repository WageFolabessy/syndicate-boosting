<!-- Modal Order -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 overflow-hidden">
            <!-- Modal Header -->
            <div class="modal-header bg-gradient-primary text-white position-relative">
                <div class="w-100 text-center">
                    <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 50px; height: 50px;">
                        <i class="bi bi-controller fs-4"></i>
                    </div>
                    <h5 class="modal-title fs-4 fw-bold mb-2" id="orderModalLabel">Pemesanan Joki Game</h5>
                    <p class="mb-0 opacity-75">Isi data akun dengan teliti dan akurat</p>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-3 end-3"
                    data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 p-lg-5">
                <form id="orderForm" class="needs-validation" novalidate>
                    <div class="row g-4">
                        <!-- Input Server -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-3" id="server" name="server"
                                    required placeholder="Server Asia">
                                <label for="server" class="text-muted">
                                    <i class="bi bi-globe me-2"></i>Server
                                </label>
                            </div>
                        </div>
                        <!-- Metode Login -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-3" id="login" name="login"
                                    required placeholder="Contoh: Login via Google">
                                <label for="login" class="text-muted">
                                    <i class="bi bi-key me-2"></i>Metode Login
                                </label>
                            </div>
                        </div>
                        <!-- Catatan -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control rounded-3" name="catatan" id="catatan" rows="20"
                                    placeholder="Catatan untuk penjoki"></textarea>
                                <label for="catatan" class="text-muted">
                                    <i class="bi bi-pen me-2"></i>Catatan untuk Penjoki
                                </label>
                            </div>
                        </div>
                        <!-- Kontak WhatsApp -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="tel" class="form-control rounded-3" id="kontak" name="kontak"
                                    pattern="^\+62\d+" required placeholder="+628123456789">
                                <label for="kontak" class="text-muted">
                                    <i class="bi bi-whatsapp me-2"></i>Nomor WhatsApp <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                        <!-- Username/ID Akun -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-3" id="username" name="username"
                                    required placeholder="Username/ID Akun">
                                <label for="username" class="text-muted">
                                    <i class="bi bi-person-circle me-2"></i>Username/ID/email Game <span
                                        class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                        <!-- Password Akun -->
                        <div class="col-md-6">
                            <div class="form-floating position-relative">
                                <input type="password" class="form-control rounded-3" id="password" name="password"
                                    required placeholder="Password Akun">
                                <label for="password" class="text-muted">
                                    <i class="bi bi-lock me-2"></i>Password <span class="text-danger">*</span>
                                </label>
                                <button type="button"
                                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y me-3"
                                    onclick="togglePasswordVisibility()">
                                    <i id="togglePasswordIcon" class="bi bi-eye"></i>
                                </button>
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
