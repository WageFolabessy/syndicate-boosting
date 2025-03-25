<!-- Header -->
<header class="header" id="header">
    <button class="toggle-sidebar" id="toggle-sidebar">
        <i class="fas fa-bars"></i>
    </button>

    <div class="user-menu dropdown">
        <a class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" href="#"
            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-profile d-flex align-items-center">
                <div class="user-info me-2">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
                <a class="dropdown-item" href="{{ route("dashboard.admin.show", Auth::user()->id) }}">Profile</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</header>
