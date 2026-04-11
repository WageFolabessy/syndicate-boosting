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
                    <h5 class="modal-title fs-4 fw-bold mb-2" id="orderModalLabel">Pemesanan Package Boosting</h5>
                    <p class="mb-0 opacity-75">Isi data dengan teliti dan akurat</p>
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
                            <label for="server" class="form-label fw-semibold">
                                <i class="bi bi-globe me-2"></i>Server
                            </label>
                            <input type="text" class="form-control rounded-3" id="server" name="server"
                                required
                                placeholder="Contoh: Asia, Europe"
                                maxlength="50">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Metode Login -->
                        <div class="col-12">
                            <label for="login_method" class="form-label fw-semibold">
                                <i class="bi bi-key me-2"></i>Metode Login
                            </label>
                            <input type="text" class="form-control rounded-3" id="login_method"
                                name="login" required
                                placeholder="Contoh: Login via Google, Facebook, atau Email"
                                maxlength="100">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Catatan -->
                        <div class="col-md-12">
                            <label for="note" class="form-label fw-semibold">
                                <i class="bi bi-pen me-2"></i>Catatan untuk Penjoki
                                <span class="text-muted fw-normal">(opsional)</span>
                            </label>
                            <textarea class="form-control rounded-3" name="note" id="note" rows="4"
                                placeholder="Contoh: Tolong push rank sebelum Senin, akun sudah berada di rank Platinum"
                                maxlength="500"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Nama Panggilan -->
                        <div class="col-md-12">
                            <label for="customer_name" class="form-label fw-semibold">
                                <i class="bi bi-person me-2"></i>Nama Panggilan Anda <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control rounded-3" id="customer_name"
                                name="customer_name" required
                                placeholder="Contoh: Budi Santoso"
                                maxlength="100">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Kontak WhatsApp -->
                        <div class="col-md-12">
                            <label for="customer_contact" class="form-label fw-semibold">
                                <i class="bi bi-whatsapp me-2"></i>Nomor WhatsApp <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control rounded-3" id="customer_contact"
                                name="customer_contact" required
                                placeholder="Contoh: 081234567890"
                                maxlength="15" pattern="[0-9]+" inputmode="numeric">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Email Pelanggan -->
                        <div class="col-md-12">
                            <label for="customer_email" class="form-label fw-semibold">
                                <i class="bi bi-envelope me-2"></i>Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control rounded-3" id="customer_email"
                                name="customer_email" required
                                placeholder="Contoh: budi@gmail.com"
                                maxlength="255">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Username/ID Akun -->
                        <div class="col-md-6">
                            <label for="username" class="form-label fw-semibold">
                                <i class="bi bi-person-circle me-2"></i>Username/ID/Email Game <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control rounded-3" id="username" name="username"
                                required
                                placeholder="Contoh: BudiGamer#1234"
                                maxlength="100">
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- Password Akun -->
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock me-2"></i>Password Akun <span class="text-danger">*</span>
                            </label>
                            <div class="position-relative">
                                <input type="password" class="form-control rounded-3" id="password" name="password"
                                    required
                                    placeholder="Masukkan password akun game Anda"
                                    maxlength="255">
                                <button type="button"
                                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y me-1"
                                    onclick="togglePasswordVisibility()">
                                    <i id="togglePasswordIcon" class="bi bi-eye"></i>
                                </button>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <!-- Hidden Field: Boosting Service ID -->
                        <input type="hidden" id="boosting_service_id" name="boosting_service_id"
                            value="{{ $service->id }}">
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light justify-content-center border-0">
                <div class="w-100 d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg confirm-payment-button">
                        Bayar Rp. {{ number_format($service->sale_price ?? $service->original_price, 0, ',', '.') }}
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
