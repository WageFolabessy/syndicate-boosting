@extends('site-user.components.main')
@section('meta')
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Professional Game Boosting Services - Syndicate" />
    <meta property="og:description"
        content="Boost your rank, complete achievements, and improve your gaming skills with our professional boosting services." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/joki-game" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Joki Game
@endsection
@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Global Styles */
        body {
            font-family: "Inter", sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .page-header {
            padding-top: 4rem;
            padding-bottom: 2rem;
            text-align: center;
        }

        .page-header .section-tag {
            display: inline-block;
            background-color: #0d6efd;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }

        .page-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .page-header p.lead {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Rank Grid */
        .rank-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .rank-grid .rank-item {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            width: 100px;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: #fff;
        }

        .rank-grid .rank-item:hover {
            border-color: #0d6efd;
        }

        .rank-grid .rank-item img {
            width: 100%;
            height: 80px;
            object-fit: contain;
            display: block;
            background: #fff;
        }

        .rank-grid .rank-item .rank-name {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.65);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .rank-grid .rank-item:hover .rank-name {
            opacity: 1;
        }

        .rank-grid .rank-item.selected {
            border-color: #0d6efd;
        }

        /* Legend Rank */
        .legend-rank {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            padding: 10px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .legend-rank img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .legend-rank h4 {
            margin: 0;
            font-size: 1.1rem;
            color: #333;
        }

        /* Subdivision Options */
        .subdivision-options {
            margin-top: 15px;
        }

        /* RP Option */
        .rp-option {
            margin-top: 15px;
            text-align: center;
        }

        /* Star Rating */
        .star-rating {
            margin-top: 15px;
            text-align: center;
        }

        .star-rating label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .star-display {
            display: inline-block;
        }

        .star-display i {
            font-size: 1.5rem;
            cursor: pointer;
            margin: 0 2px;
            color: #ccc;
            transition: color 0.3s ease;
        }

        .star-display i.selected {
            color: #f7c02c;
        }

        /* Card Custom */
        .card-custom {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: none;
            border-radius: 8px;
            margin-bottom: 20px;
            background: #fff;
        }

        .card-custom .card-header {
            padding: 0.75rem 1.25rem;
            border-bottom: none;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-custom .card-body {
            padding: 1.5rem;
        }

        /* Checkout Section */
        .checkout h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .checkout .card-custom {
            margin-bottom: 0;
        }

        .checkout .card-body {
            padding: 1.5rem;
        }

        .checkout .list-group-item {
            border: none;
            padding: 0.5rem 0;
            font-size: 0.95rem;
        }

        .checkout .list-group-item strong {
            color: #333;
        }

        .checkout button.btn-success {
            margin-top: 1rem;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 8px;
        }

        .order-button {
            position: relative;
            overflow: hidden;
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .order-button i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .order-button:hover {
            padding-right: 3.5rem;
        }

        .order-button:hover i {
            right: 1.5rem;
            opacity: 1;
        }

        /* Improved Modal Styles */
        .modal-content {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .modal-header.bg-gradient-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0b5ed7 100%);
            padding: 2.5rem 2rem;
            border-bottom: none;
        }

        .modal-header.bg-gradient-primary .icon-wrapper {
            background: rgba(255, 255, 255, 0.15);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }

        .modal-title {
            font-size: 1.75rem;
            margin-bottom: 0.25rem;
        }

        .modal-header p {
            font-size: 0.9rem;
            opacity: 0.85;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            background: #f8f9fa;
            padding: 1.5rem 2rem;
            border-top: none;
        }

        .modal-footer .btn-primary {
            font-size: 1rem;
            font-weight: 600;
            padding: 1rem 2rem;
        }

        /* Floating Labels Custom */
        .form-floating label {
            transition: all 0.3s ease;
            padding-left: 2.5rem;
        }

        .form-floating>.form-control:focus~label,
        .form-floating>.form-control:not(:placeholder-shown)~label {
            transform: scale(0.85) translateY(-0.8rem) translateX(0.5rem);
            opacity: 0.8;
        }

        .form-control {
            border: 2px solid #e9ecef;
            padding-left: 2.5rem !important;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .rank-grid .rank-item {
                width: 80px;
            }

            .legend-rank h4 {
                font-size: 1rem;
            }

            .page-header h1 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 576px) {
            .legend-rank {
                flex-direction: column;
                gap: 5px;
            }

            .legend-rank img {
                width: 40px;
                height: 40px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <main>
        <!-- Header Halaman -->
        <section class="mt-5 page-header pt-5" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <span class="section-tag">{{ $game->name }}</span>
                        <h1>Pilih Opsi Rank Boost</h1>
                        <p class="lead">Pilih Rank yang diinginkan dan akan kami jokikan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 rank-boost">
            <div class="container">
                <div class="row g-4">
                    <!-- Form Boosting -->
                    <div class="col-lg-8">
                        <form>
                            <!-- Card: Rank Saat Ini -->
                            <div class="card card-custom" data-aos="fade-up">
                                <div class="card-header text-white bg-primary">
                                    <h5 class="mb-0">Rank Saat Ini</h5>
                                </div>
                                <div class="card-body">
                                    <div class="legend-rank" id="current-legend">
                                        <img alt="Selected Current Rank" src="{{ asset('storage/' . $defaultRank->image) }}"
                                            id="current-selected-img">
                                        <h4 id="current-selected-text">Rank saat ini: {{ $defaultRank->name }}</h4>
                                    </div>
                                    <div class="rank-grid" id="current-rank-grid">
                                        @foreach ($game->rankCategories->sortBy('display_order') as $category)
                                            @php
                                                $rankCode =
                                                    $category->display_order . '-' . strtolower($category->name);
                                            @endphp
                                            <div class="rank-item {{ $category->id === $defaultRank->id ? 'selected' : '' }}"
                                                data-rank="{{ $rankCode }}" data-id="{{ $category->id }}"
                                                data-system="{{ $category->system_type }}"
                                                onclick="selectRank('current', this)">
                                                <img alt="{{ $category->name }}"
                                                    src="{{ asset('storage/' . $category->image) }}">
                                                <div class="rank-name">{{ $category->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3" id="current-options">
                                        <!-- Subdivisi: Pilih Tier akan di-update secara dinamis -->
                                        <div class="subdivision-options d-flex justify-content-center"
                                            id="current-subdivisions-container">
                                            <div class="btn-group" role="group" aria-label="Current Tier">
                                                @foreach ($defaultRank->rankTiers->sortBy('display_order') as $tier)
                                                    <input type="radio" class="btn-check" name="current-tier"
                                                        id="current-tier-{{ $tier->id }}" value="{{ $tier->id }}"
                                                        data-progress-target="{{ $tier->progress_target }}"
                                                        {{ $loop->first ? 'checked' : '' }}
                                                        onclick="selectTier('current', {{ $tier->id }})">
                                                    <label for="current-tier-{{ $tier->id }}"
                                                        class="btn btn-outline-primary">{{ $tier->tier }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Pilihan Bintang untuk sistem star -->
                                        @if ($defaultRank->system_type === 'star')
                                            <div class="star-rating" id="current-stars-input">
                                                <label class="form-label">Bintang Saat Ini</label>
                                                <div class="star-display">
                                                    @for ($i = 1; $i <= $defaultTier->progress_target; $i++)
                                                        <i class="fa fa-star star-option"
                                                            data-value="{{ $i }}"></i>
                                                    @endfor
                                                </div>
                                                <!-- Ubah value default menjadi 0 -->
                                                <input type="hidden" id="current-stars" name="current-stars"
                                                    value="0">
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="clearStarSelection('current')">Hapus Bintang</button>
                                            </div>
                                        @else
                                            <div class="rp-option" id="current-rp-dropdown">
                                                <label class="form-label" for="current-rp">RP saat ini</label>
                                                <select class="form-select" id="current-rp" name="current-rp">
                                                    @foreach ($defaultTier->tierDetails->sortBy('display_order') as $detail)
                                                        <option value="{{ $detail->price }}">
                                                            {{ $detail->star_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Card: Rank yang Diinginkan -->
                            <div class="card card-custom" data-aos="fade-up" data-aos-delay="200">
                                <div class="card-header text-white bg-success">
                                    <h5 class="mb-0">Rank yang Diinginkan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="legend-rank" id="desired-legend">
                                        <img alt="Selected Desired Rank"
                                            src="{{ asset('storage/' . $defaultRank->image) }}" id="desired-selected-img">
                                        <h4 id="desired-selected-text">Rank yang diinginkan: {{ $defaultRank->name }}</h4>
                                    </div>
                                    <div class="rank-grid" id="desired-rank-grid">
                                        @foreach ($game->rankCategories->sortBy('display_order') as $category)
                                            @php
                                                $rankCode =
                                                    $category->display_order . '-' . strtolower($category->name);
                                            @endphp
                                            <div class="rank-item {{ $category->id === $defaultRank->id ? 'selected' : '' }}"
                                                data-rank="{{ $rankCode }}" data-id="{{ $category->id }}"
                                                data-system="{{ $category->system_type }}"
                                                onclick="selectRank('desired', this)">
                                                <img alt="{{ $category->name }}"
                                                    src="{{ asset('storage/' . $category->image) }}">
                                                <div class="rank-name">{{ $category->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3" id="desired-options">
                                        <!-- Subdivisi: Pilih Tier akan di-update secara dinamis -->
                                        <div class="subdivision-options d-flex justify-content-center"
                                            id="desired-subdivisions-container">
                                            <div class="btn-group" role="group" aria-label="Desired Tier">
                                                @foreach ($defaultRank->rankTiers->sortBy('display_order') as $tier)
                                                    <input type="radio" class="btn-check" name="desired-tier"
                                                        id="desired-tier-{{ $tier->id }}"
                                                        value="{{ $tier->id }}"
                                                        data-progress-target="{{ $tier->progress_target }}"
                                                        {{ $loop->first ? 'checked' : '' }}
                                                        onclick="selectTier('desired', {{ $tier->id }})">
                                                    <label for="desired-tier-{{ $tier->id }}"
                                                        class="btn btn-outline-primary">{{ $tier->tier }}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- Pilihan Bintang untuk sistem star -->
                                        @if ($defaultRank->system_type === 'star')
                                            <div class="star-rating" id="desired-stars-input">
                                                <label class="form-label">Bintang yang diinginkan</label>
                                                <div class="star-display">
                                                    @for ($i = 1; $i <= $defaultTier->progress_target; $i++)
                                                        <i class="fa fa-star star-option"
                                                            data-value="{{ $i }}"></i>
                                                    @endfor
                                                </div>
                                                <!-- Ubah value default menjadi 0 -->
                                                <input type="hidden" id="desired-stars" name="desired-stars"
                                                    value="0">
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="clearStarSelection('desired')">Hapus Bintang</button>
                                            </div>
                                        @else
                                            <div class="rp-option" id="desired-rp-dropdown">
                                                <label class="form-label" for="desired-rp">RP yang diinginkan</label>
                                                <select class="form-select" id="desired-rp" name="desired-rp">
                                                    @foreach ($defaultTier->tierDetails->sortBy('display_order') as $detail)
                                                        <option value="{{ $detail->price }}">
                                                            {{ $detail->star_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Checkout Summary -->
                    <div class="col-lg-4">
                        <div class="checkout" data-aos="fade-up" data-aos-delay="500">
                            <h4 class="mb-3">Checkout</h4>
                            <div class="card card-custom">
                                <div class="card-body">
                                    <p class="mb-2">Ringkasan Pesanan</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <strong>Rank Saat Ini:</strong>
                                            <span id="checkout-current-rank">
                                                <span id="checkout-current-rank-name">{{ $defaultRank->name }}</span> -
                                                <span id="checkout-current-tier">{{ $defaultTier->tier }}</span>
                                                @if ($defaultRank->system_type === 'star')
                                                    (Bintang: <span id="checkout-current-stars">0</span>)
                                                @else
                                                    (RP: <span id="checkout-current-rp"></span>)
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Rank yang Diinginkan:</strong>
                                            <span id="checkout-desired-rank">
                                                <span id="checkout-desired-rank-name">{{ $defaultRank->name }}</span> -
                                                <span id="checkout-desired-tier">{{ $defaultTier->tier }}</span>
                                                @if ($defaultRank->system_type === 'star')
                                                    (Bintang: <span id="checkout-desired-stars">0</span>)
                                                @else
                                                    (RP: <span id="checkout-desired-rp"></span>)
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Subtotal</strong> <span id="checkout-subtotal">Rp. 0</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Total</strong> <span id="checkout-total">Rp. 0</span>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-lg order-button w-100" data-bs-toggle="modal"
                                        data-bs-target="#orderCustomModal">
                                        Pesan Sekarang
                                        <i class="bi bi-arrow-right-short"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('site-user.pages.joki-game.modal-costum-order')
@endsection

@section('script')
    <script>
        // Global variables untuk menyimpan pilihan harga dan tier id
        let currentTierId = null,
            desiredTierId = null,
            currentSelectedPrice = 0,
            desiredSelectedPrice = 0;

        // Ambil tipe sistem dari server ('star' atau 'point')
        const systemType = '{{ $defaultRank->system_type }}';

        // Mapping: rank category id ke array tier (dengan id, label, progress)
        const rankTiersMap = {
            @foreach ($game->rankCategories as $category)
                "{{ $category->id }}": [
                    @foreach ($category->rankTiers->sortBy('display_order') as $tier)
                        {
                            id: "{{ $tier->id }}",
                            label: "{{ $tier->tier }}",
                            progress: {{ (int) $tier->progress_target }}
                        },
                    @endforeach
                ],
            @endforeach
        };

        // Mapping tier id ke progress_target (jika diperlukan)
        const tierProgressMap = {
            @foreach ($defaultRank->rankTiers as $tier)
                "{{ $tier->id }}": "{{ $tier->progress_target }}",
            @endforeach
        };

        // Mapping untuk harga: setiap tier id ke array detail (harga dan star_number / point)
        const rpOptionsMap = {
            @foreach ($game->rankCategories as $category)
                @foreach ($category->rankTiers as $tier)
                    "{{ $tier->id }}": [
                        @foreach ($tier->tierDetails->sortBy('display_order') as $detail)
                            {
                                price: parseInt("{{ $detail->price }}"),
                                star_number: "{{ $detail->star_number }}"
                            },
                        @endforeach
                    ],
                @endforeach
            @endforeach
        };

        // Fungsi untuk mengatur tampilan bintang (hanya digunakan jika sistem star)
        const setStarSelection = (type, starValue) => {
            const container = document.getElementById(`${type}-stars-input`)?.querySelector('.star-display');
            if (!container) return;
            container.querySelectorAll('.star-option').forEach(star => {
                if (parseInt(star.getAttribute('data-value')) <= parseInt(starValue)) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        };

        // Fungsi untuk reset pilihan tier dan bintang/dropdown ketika rank baru dipilih
        const resetTierAndStar = (type) => {
            // Reset container sesuai sistem
            if (systemType === 'star') {
                document.getElementById(`${type}-subdivisions-container`).innerHTML = '';
                document.getElementById(`${type}-stars-input`).querySelector('.star-display').innerHTML = '';
                document.getElementById(`${type}-stars`).value = 0;
            } else {
                // Untuk sistem point, kosongkan container dropdown RP
                document.getElementById(`${type}-subdivisions-container`).innerHTML = '';
                document.getElementById(`${type}-rp-dropdown`).innerHTML = '';
            }
            // Reset nilai harga dan tier id
            if (type === 'current') {
                currentSelectedPrice = 0;
                currentTierId = null;
                const tierEl = document.getElementById('checkout-current-tier');
                if (tierEl) tierEl.innerText = '';
                // Update summary untuk star atau point
                if (systemType === 'star') {
                    const starEl = document.getElementById('checkout-current-stars');
                    if (starEl) starEl.innerText = 0;
                } else {
                    const rpEl = document.getElementById('checkout-current-rp');
                    if (rpEl) rpEl.innerText = '';
                }
            } else {
                desiredSelectedPrice = 0;
                desiredTierId = null;
                const tierEl = document.getElementById('checkout-desired-tier');
                if (tierEl) tierEl.innerText = '';
                if (systemType === 'star') {
                    const starEl = document.getElementById('checkout-desired-stars');
                    if (starEl) starEl.innerText = 0;
                } else {
                    const rpEl = document.getElementById('checkout-desired-rp');
                    if (rpEl) rpEl.innerText = '';
                }
            }
            updatePriceDifference();
        };

        // Saat halaman dimuat, set nilai awal tanpa memilih rank/tier
        document.addEventListener("DOMContentLoaded", () => {
            if (systemType === 'star') {
                document.getElementById("current-stars").value = 0;
                document.getElementById("desired-stars").value = 0;
                setStarSelection('current', 0);
                setStarSelection('desired', 0);
            } else {
                // Untuk sistem point, pastikan container dropdown RP dalam keadaan kosong sebelum inisialisasi
                document.getElementById("current-rp-dropdown").innerHTML = '';
                document.getElementById("desired-rp-dropdown").innerHTML = '';
            }
            updatePriceDifference();

            // Inisialisasi default tier berdasarkan data server
            const defaultTierId = "{{ $defaultTier->id }}";
            if (systemType === 'star') {
                selectTier('current', defaultTierId);
                selectTier('desired', defaultTierId);
            } else {
                updateRPDropdown('current', defaultTierId);
                updateRPDropdown('desired', defaultTierId);
            }
        });

        // Fungsi untuk update subdivisi (tier) secara dinamis ketika rank dipilih
        const updateSubdivisions = (type, rankId) => {
            const container = document.getElementById(`${type}-subdivisions-container`);
            const tiers = rankTiersMap[rankId] || [];
            let html = `<div class="btn-group" role="group" aria-label="${type} Tier">`;
            tiers.forEach((tier, index) => {
                html +=
                    `<input type="radio" class="btn-check" name="${type}-tier" id="${type}-tier-${tier.id}" value="${tier.id}" data-progress-target="${tier.progress}" ${index === 0 ? 'checked' : ''} onclick="selectTier('${type}', ${tier.id})">`;
                html +=
                    `<label for="${type}-tier-${tier.id}" class="btn btn-outline-primary">${tier.label}</label>`;
            });
            html += '</div>';
            container.innerHTML = html;
            // Jika ada setidaknya satu tier, otomatis pilih tier pertama
            if (tiers.length > 0) {
                selectTier(type, tiers[0].id);
            }
        };

        // Fungsi untuk memilih rank (current atau desired)
        const selectRank = (type, element) => {
            document.querySelectorAll(`#${type}-rank-grid .rank-item`).forEach(item => {
                item.classList.remove('selected');
            });
            element.classList.add('selected');
            const selectedImgSrc = element.querySelector('img').src;
            const selectedName = element.querySelector('.rank-name').innerText;
            document.getElementById(`${type}-selected-img`).src = selectedImgSrc;
            document.getElementById(`${type}-selected-text`).innerText = (type === 'current' ? 'Rank saat ini: ' :
                'Rank yang diinginkan: ') + selectedName;
            const rankId = element.getAttribute('data-id');
            // Reset pilihan tier dan terkait (bintang atau dropdown RP)
            resetTierAndStar(type);
            // Update daftar tier untuk rank yang baru dipilih
            updateSubdivisions(type, rankId);
            const summaryRankEl = document.getElementById(`checkout-${type}-rank-name`);
            if (summaryRankEl) {
                summaryRankEl.innerText = selectedName;
            }
        };

        // Fungsi untuk render star rating (digunakan jika sistem star)
        const renderStarRating = (type, tierId) => {
            const container = document.getElementById(`${type}-stars-input`).querySelector('.star-display');
            const radio = document.querySelector(`input[name="${type}-tier"][value="${tierId}"]`);
            const progressTarget = parseInt(radio.getAttribute('data-progress-target')) || 0;
            let html = '';
            for (let i = 1; i <= progressTarget; i++) {
                html += `<i class="fa fa-star star-option" data-value="${i}"></i>`;
            }
            container.innerHTML = html;

            // Ambil input tersembunyi untuk menyimpan nilai bintang
            const hiddenInput = container.parentElement.querySelector('input[type="hidden"]');

            if (type === 'desired') {
                const options = rpOptionsMap[tierId] || [];
                const optionForOne = options.find(opt => parseInt(opt.star_number) === 1);
                if (optionForOne) {
                    hiddenInput.value = optionForOne.star_number;
                    setStarSelection(type, optionForOne.star_number);
                    desiredSelectedPrice = optionForOne.price;
                    const summaryEl = document.getElementById('checkout-desired-stars');
                    if (summaryEl) summaryEl.innerText = optionForOne.star_number;
                } else {
                    hiddenInput.value = 0;
                    setStarSelection(type, 0);
                    desiredSelectedPrice = 0;
                    const summaryEl = document.getElementById('checkout-desired-stars');
                    if (summaryEl) summaryEl.innerText = 0;
                }
            } else {
                hiddenInput.value = 0;
                setStarSelection(type, 0);
                const options = rpOptionsMap[tierId] || [];
                const optionForZero = options.find(opt => parseInt(opt.star_number) === 0);
                currentSelectedPrice = optionForZero ? optionForZero.price : 0;
                const summaryEl = document.getElementById('checkout-current-stars');
                if (summaryEl) summaryEl.innerText = 0;
            }

            updateSelectedPrice(type, tierId, hiddenInput.value);
            updatePriceDifference();

            // Pasang event listener pada tiap bintang agar setiap klik memperbarui harga
            container.querySelectorAll('.star-option').forEach(star => {
                star.addEventListener('click', () => {
                    const value = star.getAttribute('data-value');
                    hiddenInput.value = value;
                    setStarSelection(type, value);
                    updateSelectedPrice(type, tierId, value);
                    const summaryEl = document.getElementById(`checkout-${type}-stars`);
                    if (summaryEl) summaryEl.innerText = value;
                    updatePriceDifference();
                });
            });
        };

        // Fungsi untuk update dropdown RP (digunakan jika sistem point)
        const updateRPDropdown = (type, tierId) => {
            const container = document.getElementById(`${type}-rp-dropdown`);
            const options = rpOptionsMap[tierId] || [];
            let html =
                `<label class="form-label" for="${type}-rp">RP ${type === 'current' ? 'saat ini' : 'yang diinginkan'}</label>`;
            html += `<select class="form-select" id="${type}-rp" name="${type}-rp">`;
            options.forEach(option => {
                html += `<option value="${option.price}">${option.star_number}</option>`;
            });
            html += '</select>';
            container.innerHTML = html;
            const selectEl = document.getElementById(`${type}-rp`);
            const defaultPrice = options.length > 0 ? parseInt(options[0].price) : 0;
            if (type === 'current') {
                currentSelectedPrice = defaultPrice;
            } else {
                desiredSelectedPrice = defaultPrice;
            }
            selectEl.addEventListener('change', () => {
                const selectedText = selectEl.options[selectEl.selectedIndex].text;
                const selectedPrice = parseInt(selectEl.value);
                if (type === 'current') {
                    currentSelectedPrice = selectedPrice;
                    const el = document.getElementById('checkout-current-rp');
                    if (el) el.innerText = selectedText;
                } else {
                    desiredSelectedPrice = selectedPrice;
                    const el = document.getElementById('checkout-desired-rp');
                    if (el) el.innerText = selectedText;
                }
                updatePriceDifference();
            });
            // Update summary dropdown
            if (options.length > 0) {
                const defaultText = selectEl.options[selectEl.selectedIndex].text;
                if (type === 'current') {
                    const el = document.getElementById('checkout-current-rp');
                    if (el) el.innerText = defaultText;
                } else {
                    const el = document.getElementById('checkout-desired-rp');
                    if (el) el.innerText = defaultText;
                }
                updatePriceDifference();
            }
        };

        // Fungsi untuk memilih tier (subdivisi)
        const selectTier = (type, tierId) => {
            // Tandai radio button tier yang dipilih
            const radios = document.getElementsByName(`${type}-tier`);
            radios.forEach(radio => {
                radio.checked = false;
            });
            document.getElementById(`${type}-tier-${tierId}`).checked = true;

            // Simpan tier id yang dipilih
            if (type === 'current') {
                currentTierId = tierId;
            } else {
                desiredTierId = tierId;
            }

            // Sesuaikan tampilan opsi berdasarkan sistem
            if (systemType === 'star') {
                renderStarRating(type, tierId);
            } else {
                updateRPDropdown(type, tierId);
            }

            // Update tampilan summary tier
            const tierLabel = document.querySelector(`label[for="${type}-tier-${tierId}"]`).innerText;
            if (type === 'current') {
                const el = document.getElementById('checkout-current-tier');
                if (el) el.innerText = tierLabel;
            } else {
                const el = document.getElementById('checkout-desired-tier');
                if (el) el.innerText = tierLabel;
            }
        };

        // Fungsi untuk update harga yang dipilih (digunakan untuk sistem star)
        const updateSelectedPrice = (type, tierId, starValue) => {
            const options = rpOptionsMap[tierId] || [];
            const starVal = parseInt(starValue);
            const optionForZero = options.find(opt => parseInt(opt.star_number) === 0);

            if (starVal > 0) {
                // Pilih harga sesuai nilai bintang yang diklik
                const selected = options.find(opt => parseInt(opt.star_number) === starVal);
                if (selected) {
                    if (type === 'current') {
                        currentSelectedPrice = selected.price;
                    } else {
                        desiredSelectedPrice = selected.price;
                    }
                }
            } else {
                if (type === 'current') {
                    currentSelectedPrice = optionForZero ? optionForZero.price : 0;
                } else {
                    desiredSelectedPrice = optionForZero ? optionForZero.price : 0;
                }
            }
        };

        // Fungsi untuk menghitung dan mengupdate selisih harga pada summary checkout
        const updatePriceDifference = () => {
            let diff = desiredSelectedPrice - currentSelectedPrice;
            if (diff < 0) diff = 0;
            document.getElementById('checkout-subtotal').innerText = 'Rp. ' + diff;
            document.getElementById('checkout-total').innerText = 'Rp. ' + diff;
        };

        // Fungsi untuk mengosongkan pilihan bintang (hanya untuk sistem star)
        const clearStarSelection = (type) => {
            if (systemType !== 'star') return;
            const container = document.getElementById(`${type}-stars-input`).querySelector('.star-display');
            container.querySelectorAll('.star-option').forEach(star => {
                star.classList.remove('selected');
            });
            const hiddenInput = container.parentElement.querySelector('input[type="hidden"]');
            hiddenInput.value = 0;
            if (type === 'current') {
                updateSelectedPrice('current', currentTierId, 0);
                const summaryEl = document.getElementById('checkout-current-stars');
                if (summaryEl) summaryEl.innerText = 0;
            } else {
                updateSelectedPrice('desired', desiredTierId, 0);
                const summaryEl = document.getElementById('checkout-desired-stars');
                if (summaryEl) summaryEl.innerText = 0;
            }
            updatePriceDifference();
        };
    </script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
@endsection
