@extends('dashboard.components.main')
@section('title')
    - Game
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <div class="content-container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
                <h1 class="mb-3 mb-md-0 fw-bold">Games Management</h1>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-download me-2"></i>Export
                    </button>
                    <a href="{{ route('dashboard.game.add') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Game
                    </a>
                </div>
            </div>

            <!-- Games Table -->
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">All Games</h5>
                    <div class="table-actions">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Search games..." />
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <button class="btn btn-sm btn-outline-primary ms-2">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Genre</th>
                                <th>Rank Categories</th>
                                <th>Services</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <img src="https://placehold.co/40" class="rounded" alt="Mobile Legends" />
                                </td>
                                <td>Mobile Legends</td>
                                <td>MOBA</td>
                                <td>5</td>
                                <td>12</td>
                                <td>2023-07-15</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <img src="https://placehold.co/40" class="rounded" alt="Valorant" />
                                </td>
                                <td>Valorant</td>
                                <td>FPS</td>
                                <td>8</td>
                                <td>15</td>
                                <td>2023-07-10</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <img src="https://placehold.co/40" class="rounded" alt="Genshin Impact" />
                                </td>
                                <td>Genshin Impact</td>
                                <td>RPG</td>
                                <td>0</td>
                                <td>8</td>
                                <td>2023-07-05</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <img src="https://placehold.co/40" class="rounded" alt="PUBG Mobile" />
                                </td>
                                <td>PUBG Mobile</td>
                                <td>Battle Royale</td>
                                <td>4</td>
                                <td>10</td>
                                <td>2023-07-01</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <img src="https://placehold.co/40" class="rounded" alt="League of Legends" />
                                </td>
                                <td>League of Legends</td>
                                <td>MOBA</td>
                                <td>7</td>
                                <td>18</td>
                                <td>2023-06-28</td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn view">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="action-btn edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <div>Showing 1 to 5 of 24 entries</div>
                    <nav>
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
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
