<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer-about">
                    <h3 class="footer-brand">Syndicate</h3>
                    <p>
                        Layanan gaming premium untuk pemain kompetitif. Misi kami adalah
                        menyediakan layanan boosting berkualitas tinggi dan akun premium
                        untuk gamer di seluruh dunia.
                    </p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="Discord"><i class="bi bi-discord"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
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
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; 2025 Syndicate. Semua Hak Dilindungi.</p>
            </div>
            <div class="footer-bottom-links">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat Layanan</a>
            </div>
        </div>
    </div>
</footer>
