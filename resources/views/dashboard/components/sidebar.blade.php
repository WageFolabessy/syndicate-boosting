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
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.rank-category*') || request()->routeIs('dashboard.rank-category.create*') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.rank-category*') || request()->routeIs('dashboard.rank-category.create*') ? 'active' : '' }}">
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

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.rank-tier-detai*') || request()->routeIs('dashboard.rank-tier-detail.create') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.rank-tier-detail') || request()->routeIs('dashboard.rank-tier-detail.create') ? 'active' : '' }}">
                <i class="fas fa-layer-group menu-icon"></i>
                <span class="menu-text">Rank Tier Details</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.rank-tier-detail') || request()->routeIs('dashboard.rank-tier-detail.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.rank-tier-detail') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.rank-tier-detail') ? 'active' : '' }}">All
                    Details</a>
                <a href="{{ route('dashboard.rank-tier-detail.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.rank-tier-detail.create') ? 'active' : '' }}">Add
                    New Detail</a>
            </div>
        </div>

        <div class="menu-category">Services</div>
        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.label*') || request()->routeIs('dashboard.label.create*') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.label*') || request()->routeIs('dashboard.label.create*') ? 'active' : '' }}">
                <i class="fas fa-tag menu-icon"></i>
                <span class="menu-text">Labels</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.label') || request()->routeIs('dashboard.label.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.label') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.label') ? 'active' : '' }}">All Labels</a>
                <a href="{{ route('dashboard.label.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.label.create') ? 'active' : '' }}">Add New
                    Label</a>
            </div>
        </div>

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.boosting-service*') || request()->routeIs('dashboard.boosting-service.create*') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.boosting-service*') || request()->routeIs('dashboard.boosting-service.create*') ? 'active' : '' }}">
                <i class="fas fa-rocket menu-icon"></i>
                <span class="menu-text">Boosting Services</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.boosting-service') || request()->routeIs('dashboard.boosting-service.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.boosting-service') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.boosting-service') ? 'active' : '' }}">All
                    Services</a>
                <a href="{{ route('dashboard.boosting-service.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.boosting-service.create') ? 'active' : '' }}">Add
                    New Service</a>
            </div>
        </div>

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.game-account') || request()->routeIs('dashboard.game-account.create') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.game-account') || request()->routeIs('dashboard.game-account.create') ? 'active' : '' }}">
                <i class="fas fa-user-shield menu-icon"></i>
                <span class="menu-text">Game Accounts</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.game-account') || request()->routeIs('dashboard.game-account.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.game-account') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.game-account') ? 'active' : '' }}">All
                    Accounts</a>
                <a href="{{ route('dashboard.game-account.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.game-account.create') ? 'active' : '' }}">Add
                    New Account</a>
            </div>
        </div>

        <div class="menu-category">Sales</div>
        <div
            class="menu-item has-dropdown 
            {{ ((request()->routeIs('dashboard.all-transactions') || request()->routeIs('dashboard.custom-boosting-transaction')
                        ? 'active'
                        : '' || request()->routeIs('dashboard.package-boosting-transaction'))
                    ? 'active'
                    : '' || request()->routeIs('dashboard.game-account-transaction'))
                ? 'active'
                : '' }}">
            <a href="#"
                class="menu-link 
                {{ ((request()->routeIs('dashboard.all-transactions') || request()->routeIs('dashboard.custom-boosting-transaction*')
                            ? 'active'
                            : '' || request()->routeIs('dashboard.package-boosting-transaction*'))
                        ? 'active'
                        : '' || request()->routeIs('dashboard.game-account-transaction'))
                    ? 'active'
                    : '' }}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-text">Transactions</span>
            </a>
            <div class="submenu {{ ((request()->routeIs('dashboard.all-transactions') || request()->routeIs('dashboard.custom-boosting-transaction*')
                            ? 'open'
                            : '' || request()->routeIs('dashboard.package-boosting-transaction*'))
                        ? 'open'
                        : '' || request()->routeIs('dashboard.game-account-transaction'))
                    ? 'open'
                    : '' }}">
                <a href="{{ route('dashboard.all-transactions') }}" class="submenu-link {{ request()->routeIs('dashboard.all-transactions') ? 'active' : '' }}">All Transactions</a>
                <a href="{{ route('dashboard.custom-boosting-transaction') }}" class="submenu-link {{ request()->routeIs('dashboard.custom-boosting-transaction*') ? 'active' : '' }}">Custom Boosting</a>
                <a href="{{ route('dashboard.package-boosting-transaction') }}" class="submenu-link {{ request()->routeIs('dashboard.package-boosting-transaction*') ? 'active' : '' }}">Package Boosting</a>
                <a href="{{ route('dashboard.game-account-transaction') }}" class="submenu-link {{ request()->routeIs('dashboard.game-account-transaction') ? 'active' : '' }}">Game Account</a>
            </div>
        </div>

        <div class="menu-item">
            <a href="{{ route('dashboard.payment') }}" class="menu-link {{ request()->routeIs('dashboard.payment*') ? 'active' : '' }}">
                <i class="fas fa-credit-card menu-icon"></i>
                <span class="menu-text">Payments</span>
            </a>
        </div>

        <div class="menu-item">
            <a href="{{ route('dashboard.review') }}" class="menu-link {{ request()->routeIs('dashboard.review*') ? 'active' : '' }}">
                <i class="fas fa-star menu-icon"></i>
                <span class="menu-text">Reviews</span>
            </a>
        </div>

        <div class="menu-category">System</div>

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.faq*') || request()->routeIs('dashboard.faq.create*') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.faq*') || request()->routeIs('dashboard.faq.create*') ? 'active' : '' }}">
                <i class="fas fa-question menu-icon"></i>
                <span class="menu-text">FAQ's</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.faq') || request()->routeIs('dashboard.faq.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.faq') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.faq') ? 'active' : '' }}">All FAQ'S</a>
                <a href="{{ route('dashboard.faq.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.faq.create') ? 'active' : '' }}">Add New
                    FAQ</a>
            </div>
        </div>

        <div
            class="menu-item has-dropdown {{ request()->routeIs('dashboard.admin*') || request()->routeIs('dashboard.admin.create*') ? 'active' : '' }}">
            <a href="#"
                class="menu-link {{ request()->routeIs('dashboard.admin*') || request()->routeIs('dashboard.admin.create*') ? 'active' : '' }}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-text">Admins</span>
            </a>
            <div
                class="submenu {{ request()->routeIs('dashboard.admin') || request()->routeIs('dashboard.admin.create') ? 'open' : '' }}">
                <a href="{{ route('dashboard.admin') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">All Admin</a>
                <a href="{{ route('dashboard.admin.create') }}"
                    class="submenu-link {{ request()->routeIs('dashboard.admin.create') ? 'active' : '' }}">Add New
                    Admin</a>
            </div>
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
