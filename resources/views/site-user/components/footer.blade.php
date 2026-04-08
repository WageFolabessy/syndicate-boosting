<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-about">
                    <h3 class="footer-brand">Syndicate Booster</h3>
                    <p>
                        Layanan gaming premium untuk pemain kompetitif. Misi kami adalah
                        menyediakan layanan boosting berkualitas tinggi dan akun premium
                        untuk gamer di seluruh dunia.
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Discord"><i class="bi bi-discord"></i></a>
                        <a href="https://wa.me/6282156309436" aria-label="WhatsApp" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="footer-links">
                    <h4>Tautan Cepat</h4>
                    <ul>
                        <li><a href="{{ route('index') }}">Beranda</a></li>
                        <li><a href="{{ route('joki-game') }}">Joki Game</a></li>
                        <li><a href="{{ route('akun-game') }}">Akun Game</a></li>
                        <li><a href="{{ route('transaksi') }}">Transaksi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="footer-links">
                    <h4>Joki Game</h4>
                    <ul>
                        @foreach ($games as $game)
                            <li><a href="{{ route('pilih-layanan', $game->id) }}">{{ $game->name }}</a></li>
                        @endforeach
                        <li><a href="{{ route('joki-game') }}">Semua Game</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="footer-links">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li>
                            <a href="https://wa.me/6282156309436" target="_blank" class="d-flex align-items-center">
                                <i class="bi bi-whatsapp me-2 fs-5 text-success"></i> 
                                +62 821-5630-9436
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; 2025 Syndicate Booster. Semua Hak Dilindungi.</p>
            </div>
            <div class="footer-bottom-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat Layanan</a>
            </div>
        </div>
    </div>
</footer>
