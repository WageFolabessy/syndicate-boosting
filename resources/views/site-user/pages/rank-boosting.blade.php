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
        body {
            font-family: "Inter", sans-serif;
            background-color: #f8f9fa;
        }

        .rank-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .rank-grid .rank-item {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: border-color 0.3s;
            width: 100px;
            text-align: center;
            position: relative;
        }

        .rank-grid .rank-item:hover {
            border-color: #0d6efd;
        }

        .rank-grid .rank-item img {
            width: 100%;
            height: 80px;
            object-fit: contain;
            display: block;
        }

        .rank-grid .rank-item .rank-name {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 5px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .rank-grid .rank-item:hover .rank-name {
            opacity: 1;
        }

        .rank-grid .rank-item.selected {
            border-color: #0d6efd;
        }

        .legend-rank {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .legend-rank img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        /* Gunakan btn-group Bootstrap untuk subdivisi */
        .subdivision-options {
            margin-top: 15px;
        }

        .rp-option {
            margin-top: 15px;
            text-align: center;
        }

        .star-rating {
            margin-top: 15px;
            text-align: center;
        }

        .star-display {
            display: inline-block;
        }

        .star-display i {
            font-size: 1.5rem;
            cursor: pointer;
            margin: 0 2px;
            color: #ccc;
        }

        .star-display i.selected {
            color: #f7c02c;
        }

        .card-custom {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        @media (min-width: 992px) {
            .checkout {
                margin-top: 0;
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
                            <!-- Server & Platform Selection -->
                            <div class="row g-3" data-aos="fade-up" data-aos-delay="300">
                                <div class="col-md-6">
                                    <label class="form-label" for="server">Server</label>
                                    <select class="form-select" id="server" name="server">
                                        <option value="na">North America</option>
                                        <option value="eu">Europe</option>
                                        <option value="asia">Asia</option>
                                        <option value="oceania">Oceania</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="platform">Platform</label>
                                    <select class="form-select" id="platform" name="platform">
                                        <option value="pc">PC</option>
                                    </select>
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
                                        <li class="list-group-item">
                                            <strong>Server:</strong> <span id="checkout-server">North America</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Platform:</strong> <span id="checkout-platform">PC</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Subtotal</strong> <span id="checkout-subtotal">Rp. 0</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Total</strong> <span id="checkout-total">Rp. 0</span>
                                        </li>
                                    </ul>
                                    <button class="mt-3 btn btn-success w-100" type="button">Lanjut Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Checkout Summary -->
                </div><!-- End Row -->
            </div><!-- End Container -->
        </section>
    </main>
@endsection

@section('script')
    <script>
        // Global variables untuk menyimpan pilihan harga dan tier id
        var currentTierId = null,
            desiredTierId = null,
            currentSelectedPrice = 0,
            desiredSelectedPrice = 0;

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

        // Mapping tier id ke progress_target
        const tierProgressMap = {
            @foreach ($defaultRank->rankTiers as $tier)
                "{{ $tier->id }}": "{{ $tier->progress_target }}",
            @endforeach
        };

        // Mapping untuk harga: setiap tier id ke array detail (harga dan star_number)
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

        // Fungsi untuk mengatur tampilan bintang sesuai nilai (untuk sistem star)
        function setStarSelection(type, starValue) {
            const container = document.getElementById(type + '-stars-input').querySelector('.star-display');
            if (!container) return;
            container.querySelectorAll('.star-option').forEach(function(star) {
                if (parseInt(star.getAttribute('data-value')) <= parseInt(starValue)) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        // Saat halaman dimuat, default star adalah 0 (tidak ada yang terselect)
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("current-stars").value = 0;
            document.getElementById("desired-stars").value = 0;
            setStarSelection('current', 0);
            setStarSelection('desired', 0);
            updatePriceDifference();

            // Inisialisasi star rating untuk default tier jika sistem star
            var systemType = '{{ $defaultRank->system_type }}';
            if (systemType === 'star') {
                var defaultTierId = "{{ $defaultTier->id }}";
                // Memanggil ulang selectTier untuk current dan desired agar star rating ter-render ulang
                selectTier('current', defaultTierId);
                selectTier('desired', defaultTierId);
            }
        });

        // Fungsi untuk update subdivisi (tier) secara dinamis
        function updateSubdivisions(type, rankId) {
            const container = document.getElementById(type + '-subdivisions-container');
            let tiers = rankTiersMap[rankId] || [];
            let html = '<div class="btn-group" role="group" aria-label="' + type + ' Tier">';
            tiers.forEach((tier, index) => {
                html += '<input type="radio" class="btn-check" name="' + type + '-tier" id="' + type + '-tier-' +
                    tier.id + '" value="' + tier.id + '" data-progress-target="' + tier.progress + '" ' +
                    (index === 0 ? 'checked' : '') + ' onclick="selectTier(\'' + type + '\',' + tier.id + ')">';
                html += '<label for="' + type + '-tier-' + tier.id + '" class="btn btn-outline-primary">' + tier
                    .label + '</label>';
            });
            html += '</div>';
            container.innerHTML = html;
            if (tiers.length > 0) {
                selectTier(type, tiers[0].id);
            }
        }

        // Fungsi untuk memilih rank (current atau desired)
        function selectRank(type, element) {
            document.querySelectorAll('#' + type + '-rank-grid .rank-item').forEach(function(item) {
                item.classList.remove('selected');
            });
            element.classList.add('selected');
            var selectedImgSrc = element.querySelector('img').src;
            var selectedName = element.querySelector('.rank-name').innerText;
            document.getElementById(type + '-selected-img').src = selectedImgSrc;
            document.getElementById(type + '-selected-text').innerText = (type === 'current' ? 'Rank saat ini: ' :
                'Rank yang diinginkan: ') + selectedName;
            let rankId = element.getAttribute('data-id');
            updateSubdivisions(type, rankId);
            let summaryRankEl = document.getElementById('checkout-' + type + '-rank-name');
            if (summaryRankEl) {
                summaryRankEl.innerText = selectedName;
            }
        }

        // Fungsi untuk render star rating (untuk sistem star)
        function renderStarRating(type, tierId) {
            const container = document.getElementById(type + '-stars-input').querySelector('.star-display');
            let radio = document.querySelector('input[name="' + type + '-tier"][value="' + tierId + '"]');
            let progressTarget = parseInt(radio.getAttribute('data-progress-target')) || 0;
            let html = '';
            for (let i = 1; i <= progressTarget; i++) {
                html += '<i class="fa fa-star star-option" data-value="' + i + '"></i>';
            }
            container.innerHTML = html;
            // Set hidden input ke 0 dan update tampilan bintang
            const hiddenInput = container.parentElement.querySelector('input[type="hidden"]');
            hiddenInput.value = 0;
            setStarSelection(type, 0);
            // Simpan tier id global dan set harga default ke 0
            if (type === 'current') {
                currentTierId = tierId;
                currentSelectedPrice = 0;
            } else {
                desiredTierId = tierId;
                desiredSelectedPrice = 0;
            }
            // Panggil updateSelectedPrice dengan default star (nilai hidden 0) sehingga
            // jika user tidak memilih, tetap diambil harga default (opsi pertama)
            updateSelectedPrice(type, tierId, hiddenInput.value);
            updatePriceDifference();
            // Pasang event listener pada tiap bintang yang baru dirender
            container.querySelectorAll('.star-option').forEach(function(star) {
                star.addEventListener('click', function() {
                    let value = star.getAttribute('data-value');
                    hiddenInput.value = value;
                    setStarSelection(type, value);
                    updateSelectedPrice(type, tierId, value);
                    let summaryEl = document.getElementById('checkout-' + type + '-stars');
                    if (summaryEl) {
                        summaryEl.innerText = value;
                    }
                    updatePriceDifference();
                });
            });
        }


        // Fungsi untuk update dropdown RP (untuk sistem point)
        function updateRPDropdown(type, tierId) {
            const container = document.getElementById(type + '-rp-dropdown');
            let options = rpOptionsMap[tierId] || [];
            let html = '<label class="form-label" for="' + type + '-rp">RP ' + (type === 'current' ? 'saat ini' :
                'yang diinginkan') + '</label>';
            html += '<select class="form-select" id="' + type + '-rp" name="' + type + '-rp">';
            options.forEach(option => {
                html += '<option value="' + option.price + '">' + option.star_number + '</option>';
            });
            html += '</select>';
            container.innerHTML = html;
            const selectEl = document.getElementById(type + '-rp');
            let defaultPrice = options.length > 0 ? parseInt(options[0].price) : 0;
            if (type === 'current') {
                currentSelectedPrice = defaultPrice;
            } else {
                desiredSelectedPrice = defaultPrice;
            }
            selectEl.addEventListener('change', function() {
                let selectedText = selectEl.options[selectEl.selectedIndex].text;
                let selectedPrice = parseInt(selectEl.value);
                if (type === 'current') {
                    currentSelectedPrice = selectedPrice;
                    let el = document.getElementById('checkout-current-rp');
                    if (el) {
                        el.innerText = selectedText;
                    }
                } else if (type === 'desired') {
                    desiredSelectedPrice = selectedPrice;
                    let el = document.getElementById('checkout-desired-rp');
                    if (el) {
                        el.innerText = selectedText;
                    }
                }
                updatePriceDifference();
            });
            if (options.length > 0) {
                let defaultText = selectEl.options[selectEl.selectedIndex].text;
                if (type === 'current') {
                    let el = document.getElementById('checkout-current-rp');
                    if (el) {
                        el.innerText = defaultText;
                    }
                } else if (type === 'desired') {
                    let el = document.getElementById('checkout-desired-rp');
                    if (el) {
                        el.innerText = defaultText;
                    }
                }
                updatePriceDifference();
            }
        }

        // Fungsi untuk memilih tier (subdivisi)
        function selectTier(type, tierId) {
            var radios = document.getElementsByName(type + '-tier');
            radios.forEach(function(radio) {
                radio.checked = false;
            });
            document.getElementById(type + '-tier-' + tierId).checked = true;
            if (type === 'current') {
                currentTierId = tierId;
                currentSelectedPrice = 0;
            } else {
                desiredTierId = tierId;
                desiredSelectedPrice = 0;
            }
            let systemType = '{{ $defaultRank->system_type }}';
            if (systemType === 'star') {
                renderStarRating(type, tierId);
            } else {
                updateRPDropdown(type, tierId);
            }
            var tierLabel = document.querySelector('label[for="' + type + '-tier-' + tierId + '"]').innerText;
            if (type === 'current') {
                let el = document.getElementById('checkout-current-tier');
                if (el) el.innerText = tierLabel;
            } else if (type === 'desired') {
                let el = document.getElementById('checkout-desired-tier');
                if (el) el.innerText = tierLabel;
            }
        }

        // Fungsi untuk update harga yang dipilih (sistem star) berdasarkan tier dan starValue
        function updateSelectedPrice(type, tierId, starValue) {
            let options = rpOptionsMap[tierId] || [];
            let starVal = parseInt(starValue);
            if (starVal > 0) {
                // Jika ada bintang yang dipilih, ambil harga sesuai opsi yang sesuai
                let selected = options.find(opt => parseInt(opt.star_number) === starVal);
                if (selected) {
                    if (type === 'current') {
                        currentSelectedPrice = selected.price;
                    } else {
                        desiredSelectedPrice = selected.price;
                    }
                }
            } else {
                // Jika nilai star adalah 0 (tidak ada bintang yang dipilih), harga di-set ke 0
                if (type === 'current') {
                    currentSelectedPrice = 0;
                } else {
                    desiredSelectedPrice = 0;
                }
            }
        }

        // Fungsi untuk menghitung dan mengupdate selisih harga di summary checkout
        // Jika desired < current, selisih dianggap 0
        function updatePriceDifference() {
            let diff = desiredSelectedPrice - currentSelectedPrice;
            if (diff < 0) diff = 0;
            document.getElementById('checkout-subtotal').innerText = 'Rp. ' + diff;
            document.getElementById('checkout-total').innerText = 'Rp. ' + diff;
        }

        // Fungsi untuk mengosongkan pilihan bintang (clear star selection)
        function clearStarSelection(type) {
            const container = document.getElementById(type + '-stars-input').querySelector('.star-display');
            // Hapus kelas 'selected' dari semua bintang
            container.querySelectorAll('.star-option').forEach(function(star) {
                star.classList.remove('selected');
            });
            // Set hidden input ke 0 agar tidak ada bintang yang dipilih
            const hiddenInput = container.parentElement.querySelector('input[type="hidden"]');
            hiddenInput.value = 0;

            // Update harga menjadi 0 untuk bintang yang sedang aktif
            if (type === 'current') {
                currentSelectedPrice = 0;
                let summaryEl = document.getElementById('checkout-current-stars');
                if (summaryEl) {
                    summaryEl.innerText = 0;
                }
            } else {
                desiredSelectedPrice = 0;
                let summaryEl = document.getElementById('checkout-desired-stars');
                if (summaryEl) {
                    summaryEl.innerText = 0;
                }
            }
            updatePriceDifference();
        }
    </script>
@endsection
