@extends('dashboard.components.main')
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0 fw-bold">Dashboard</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <div class="stat-title">Total Games</div>
                        <div class="stat-value">24</div>
                        <div class="stat-description">
                            <span class="positive"><i class="fas fa-arrow-up me-1"></i>12%</span> since last month
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="stat-title">Boosting Services</div>
                        <div class="stat-value">105</div>
                        <div class="stat-description">
                            <span class="positive"><i class="fas fa-arrow-up me-1"></i>8%</span> since last month
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-title">Total Sales</div>
                        <div class="stat-value">$12,580</div>
                        <div class="stat-description">
                            <span class="positive"><i class="fas fa-arrow-up me-1"></i>24%</span> since last month
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-title">Total Customers</div>
                        <div class="stat-value">392</div>
                        <div class="stat-description">
                            <span class="positive"><i class="fas fa-arrow-up me-1"></i>18%</span> since last month
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">Recent Transactions</h5>
                    <div class="table-actions">
                        <button class="btn btn-sm btn-outline-primary">View All</button>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>boost-1001</td>
                                <td>John Doe</td>
                                <td>Mobile Legends Boosting</td>
                                <td>$45.00</td>
                                <td>2023-07-10</td>
                                <td><span class="status-badge success">Success</span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>acc-1002</td>
                                <td>Jane Smith</td>
                                <td>Valorant Account</td>
                                <td>$120.00</td>
                                <td>2023-07-09</td>
                                <td><span class="status-badge success">Success</span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>boost-1003</td>
                                <td>Mike Johnson</td>
                                <td>PUBG Boosting</td>
                                <td>$67.50</td>
                                <td>2023-07-08</td>
                                <td><span class="status-badge pending">Pending</span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>boost-1004</td>
                                <td>Sarah Williams</td>
                                <td>League of Legends Boosting</td>
                                <td>$89.00</td>
                                <td>2023-07-07</td>
                                <td><span class="status-badge failed">Failed</span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>acc-1005</td>
                                <td>David Brown</td>
                                <td>Genshin Impact Account</td>
                                <td>$250.00</td>
                                <td>2023-07-06</td>
                                <td><span class="status-badge success">Success</span></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div>Showing 1 to 5 of 100 entries</div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Recent Game Accounts Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">Recent Game Accounts</h5>
                    <div class="table-actions">
                        <button class="btn btn-sm btn-outline-primary">View All</button>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Game</th>
                                <th>Account Name</th>
                                <th>Level</th>
                                <th>Age</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Genshin Impact</td>
                                <td>Ultimate Whale Account</td>
                                <td>60</td>
                                <td>2+ Years</td>
                                <td>$850.00</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                        <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mobile Legends</td>
                                <td>Mythical Glory Account</td>
                                <td>85</td>
                                <td>3+ Years</td>
                                <td>$400.00</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                        <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Valorant</td>
                                <td>Radiant Rank Account</td>
                                <td>120</td>
                                <td>1+ Year</td>
                                <td>$300.00</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                        <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>League of Legends</td>
                                <td>Challenger Account</td>
                                <td>150</td>
                                <td>4+ Years</td>
                                <td>$550.00</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view"><i class="fas fa-eye"></i></button>
                                        <button class="action-btn edit"><i class="fas fa-edit"></i></button>
                                        <button class="action-btn delete"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div>Showing 1 to 4 of 24 entries</div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
@endsection
