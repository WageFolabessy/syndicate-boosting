<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <span class="brand-text">Syndicate</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}"
                            aria-current="{{ request()->routeIs('index') ? 'page' : '' }}"
                            href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('joki-game') ? 'active' : '' }}"
                            href="{{ route('joki-game') }}">Joki Game</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('akun-game') ? 'active' : '' }}"
                            href="{{ route('akun-game') }}">Akun Game</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('transaksi') ? 'active' : '' }}"
                            href="{{ route('transaksi') }}">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
