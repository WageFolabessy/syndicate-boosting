<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <h2>Syndicate</h2>
        </a>
    </div>

    <div class="sidebar-menu">
        <div class="menu-category">Dashboard</div>
        <div class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large menu-icon"></i>
                <span class="menu-text">Overview</span>
            </a>
        </div>

        <div class="menu-category">Game Management</div>
        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.game') || request()->routeIs('dashboard.game.create') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.game') || request()->routeIs('dashboard.game.create') ? 'active' : '' }}">
                <i class="fas fa-gamepad menu-icon"></i>
                <span class="menu-text">Games</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.game') || request()->routeIs('dashboard.game.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.game') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.game') ? 'active' : '' }}">All Games</a>
                <a href="{{ route('dashboard.game.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.game.create') ? 'active' : '' }}">Add New
                    Game</a>
            </div>
        </div>

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.rank-category') || request()->routeIs('dashboard.rank-category.create') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.rank-category') || request()->routeIs('dashboard.rank-category.create') ? 'active' : '' }}">
                <i class="fas fa-trophy menu-icon"></i>
                <span class="menu-text">Rank Categories</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.rank-category') || request()->routeIs('dashboard.rank-category.create') ? 'open' : '' }}"">
                <a href="{{ route('dashboard.rank-category') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.rank-category') ? 'active' : '' }}">All
                    Categories</a>
                <a href="{{ route('dashboard.rank-category.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.rank-category.create') ? 'active' : '' }}">Add
                    New Category</a>
            </div>
        </div>

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.rank-tier') || request()->routeIs('dashboard.rank-tier.create') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.rank-tier') || request()->routeIs('dashboard.rank-tier.create') ? 'active' : '' }}">
                <i class="fas fa-medal menu-icon"></i>
                <span class="menu-text">Rank Tiers</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.rank-tier') || request()->routeIs('dashboard.rank-tier.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.rank-tier') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.rank-tier') ? 'active' : '' }}">All
                    Tiers</a>
                <a href="{{ route('dashboard.rank-tier.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.rank-tier.create') ? 'active' : '' }}">Add
                    New Tier</a>
            </div>
        </div>

        <div class="menu-category">Services</div>
        <div class="menu-item has-dropdown">
            <a href="#" class="menu-link">
                <i class="fas fa-rocket menu-icon"></i>
                <span class="menu-text">Boosting Services</span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">All Services</a>
                <a href="#" class="submenu-link">Add New Service</a>
            </div>
        </div>

        <div class="menu-item has-dropdown">
            <a href="#" class="menu-link">
                <i class="fas fa-user-shield menu-icon"></i>
                <span class="menu-text">Game Accounts</span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">All Accounts</a>
                <a href="#" class="submenu-link">Add New Account</a>
            </div>
        </div>

        <div class="menu-item has-dropdown">
            <a href="#" class="menu-link">
                <i class="fas fa-tag menu-icon"></i>
                <span class="menu-text">Labels</span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">All Labels</a>
                <a href="#" class="submenu-link">Add New Label</a>
            </div>
        </div>

        <div class="menu-category">Sales</div>
        <div class="menu-item has-dropdown">
            <a href="#" class="menu-link">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-text">Transactions</span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">All Transactions</a>
                <a href="#" class="submenu-link">Pending</a>
                <a href="#" class="submenu-link">Successful</a>
                <a href="#" class="submenu-link">Failed</a>
            </div>
        </div>

        <div class="menu-item">
            <a href="#" class="menu-link">
                <i class="fas fa-credit-card menu-icon"></i>
                <span class="menu-text">Payments</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="#" class="menu-link">
                <i class="fas fa-star menu-icon"></i>
                <span class="menu-text">Reviews</span>
            </a>
        </div>

        <div class="menu-category">System</div>
        <div class="menu-item">
            <a href="#" class="menu-link">
                <i class="fas fa-cog menu-icon"></i>
                <span class="menu-text">Settings</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="{{ route('dashboard.admin') }}"
                class="menu-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-text">Admins</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="#" class="menu-link">
                <i class="fas fa-sign-out-alt menu-icon"></i>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item"><span class="menu-text">Logout</span></button>
                </form>

            </a>
        </div>
    </div>
</div>

<!-- Overlay for mobile -->
<div class="overlay" id="overlay"></div>
