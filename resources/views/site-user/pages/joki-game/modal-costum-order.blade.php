<!-- Modal Custom Order -->
<div class="modal fade" id="orderCustomModal" tabindex="-1" aria-labelledby="orderCustomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 overflow-hidden">
            <!-- Modal Header -->
            <div class="modal-header bg-gradient-primary text-white position-relative">
                <div class="w-100 text-center">
                    <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 50px; height: 50px;">
                        <i class="bi bi-controller fs-4"></i>
                    </div>
                    <h5 class="modal-title fs-4 fw-bold mb-2" id="orderCustomModalLabel">Pemesanan Joki Game</h5>
                    <p class="mb-0 opacity-75">Isi data akun dengan teliti dan akurat</p>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-3 end-3"
                    data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 p-lg-5">
                <form id="orderCustomForm" class="needs-validation" novalidate>
                    <div class="row g-4">
                        <!-- Input Server -->
                        <div class="col-md-12">
                            <div class="form-floating mb-2">
                                <!-- Container error validasi -->
                                <div class="error-message text-danger" id="error-server"></div>
                                <input type="text" class="form-control rounded-3" id="server" name="server"
                                    required placeholder="Server Asia">
                                <label for="server" class="text-muted"><i class="bi bi-globe me-2"></i>Server</label>
                            </div>
                        </div>
                        <!-- Metode Login -->
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <div class="error-message text-danger" id="error-login_method"></div>
                                <input type="text" class="form-control rounded-3" id="login_method"
                                    name="login_method" required placeholder="Contoh: Login via Google">
                                <label for="login_method" class="text-muted"><i class="bi bi-key me-2"></i>Metode
                                    Login</label>
                            </div>
                        </div>
                        <!-- Catatan -->
                        <div class="col-md-12">
                            <div class="form-floating mb-2">
                                <div class="error-message text-danger" id="error-note"></div>
                                <textarea class="form-control rounded-3" name="note" id="note" rows="20"
                                    placeholder="Catatan untuk penjoki"></textarea>
                                <label for="note" class="text-muted"><i class="bi bi-pen me-2"></i>Catatan untuk
                                    Penjoki</label>
                            </div>
                        </div>
                        <!-- Nama Panggilan -->
                        <div class="col-md-12">
                            <div class="form-floating mb-2">
                                <div class="error-message text-danger" id="error-customer_name"></div>
                                <input type="text" class="form-control rounded-3" id="customer_name"
                                    name="customer_name" required placeholder="Nama panggilan Anda">
                                <label for="customer_name" class="text-muted"><i class="bi bi-person me-2"></i>Nama
                                    Panggilan Anda <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <!-- Kontak WhatsApp -->
                        <div class="col-md-12">
                            <div class="form-floating mb-2">
                                <div class="error-message text-danger" id="error-customer_contact"></div>
                                <input type="number" class="form-control rounded-3" id="customer_contact"
                                    name="customer_contact" required placeholder="+628123456789">
                                <label for="customer_contact" class="text-muted"><i
                                        class="bi bi-whatsapp me-2"></i>Nomor WhatsApp <span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <!-- Username/ID Akun -->
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <div class="error-message text-danger" id="error-username"></div>
                                <input type="text" class="form-control rounded-3" id="username" name="username"
                                    required placeholder="Username/ID Akun">
                                <label for="username" class="text-muted"><i
                                        class="bi bi-person-circle me-2"></i>Username/ID/email Game <span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <!-- Password Akun -->
                        <div class="col-md-6">
                            <div class="form-floating position-relative mb-2">
                                <div class="error-message text-danger" id="error-password"></div>
                                <input type="password" class="form-control rounded-3" id="password" name="password"
                                    required placeholder="Password Akun">
                                <label for="password" class="text-muted"><i class="bi bi-lock me-2"></i>Password
                                    <span class="text-danger">*</span></label>
                                <button type="button"
                                    class="btn btn-link position-absolute end-0 top-50 translate-middle-y me-3"
                                    onclick="togglePasswordVisibility()">
                                    <i id="togglePasswordIcon" class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <input id="game_rank_category_id" name="game_rank_category_id" type="hidden" value="">
                    <input id="game_rank_tier_id" name="game_rank_tier_id" type="hidden" value="">
                    <input id="current_game_rank_category_id" name="current_game_rank_category_id" type="hidden"
                        value="">
                    <input id="current_game_rank_tier_id" name="current_game_rank_tier_id" type="hidden"
                        value="">
                    <input id="current_game_rank_tier_detail_id" name="current_game_rank_tier_detail_id"
                        type="hidden" value="">
                    <input id="desired_game_rank_category_id" name="desired_game_rank_category_id" type="hidden"
                        value="">
                    <input id="desired_game_rank_tier_id" name="desired_game_rank_tier_id" type="hidden"
                        value="">
                    <input id="desired_game_rank_tier_detail_id" name="desired_game_rank_tier_detail_id"
                        type="hidden" value="">
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light justify-content-center border-0">
                <div class="w-100 d-grid gap-2">
                    <!-- Posisi Rank -->
                    <div class="col-12">
                        <div class="row g-2">
                            <!-- Posisi Saat Ini -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="currentPosition"
                                        name="currentPosition" readonly>
                                    <label for="currentPosition" class="text-muted"><i
                                            class="bi bi-trophy me-2"></i>Posisi Rank Saat Ini</label>
                                </div>
                            </div>
                            <!-- Posisi Yang Diinginkan -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="desiredPosition"
                                        name="desiredPosition" readonly>
                                    <label for="desiredPosition" class="text-muted"><i
                                            class="bi bi-graph-up me-2"></i>Posisi Rank yang Diinginkan</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="button" class="btn btn-primary btn-lg order-button confirm-payment-button">
                        Bayar <span id="price-confirm"></span>
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                    <button type="button" class="btn btn-link text-muted" data-bs-dismiss="modal">Batalkan
                        Pemesanan</button>
                </div>
            </div>
        </div>
    </div>
</div>
