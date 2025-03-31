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

        .subdivision-options {
            margin-top: 15px;
            text-align: center;
        }

        .subdivision-options label {
            margin: 0 5px;
            cursor: pointer;
        }

        .subdivision-options input[type="radio"] {
            display: none;
        }

        .subdivision-options label.btn-outline-primary {
            min-width: 50px;
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
                                        <img alt="Selected Current Rank"
                                            src="{{ asset('storage/' . $game->rankCategories->first()->image) }}"
                                            id="current-selected-img">
                                        <h4 id="current-selected-text">Rank saat ini:
                                            {{ $game->rankCategories->first()->name }}</h4>
                                    </div>
                                    <div class="rank-grid" id="current-rank-grid">
                                        @foreach ($game->rankCategories->sortBy('display_order') as $category)
                                            @php
                                                $rankCode =
                                                    $category->display_order . '-' . strtolower($category->name);
                                            @endphp
                                            <div class="rank-item {{ $loop->first ? 'selected' : '' }}"
                                                data-rank="{{ $rankCode }}" data-system="{{ $category->system_type }}"
                                                onclick="selectRank('current', this)">
                                                <img alt="{{ $category->name }}"
                                                    src="{{ asset('storage/' . $category->image) }}">
                                                <div class="rank-name">{{ $category->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3" id="current-options">
                                        <div class="subdivision-options" id="current-subdivisions-container"></div>
                                        <!-- Widget star rating untuk sistem star; default disembunyikan -->
                                        <div class="star-rating" id="current-stars-input" style="display:none;">
                                            <label class="form-label">Bintang Saat Ini</label>
                                            <div class="star-display">
                                                <!-- Icon akan di-generate secara dinamis -->
                                            </div>
                                            <input type="hidden" id="current-stars" name="current-stars" value="0">
                                        </div>
                                        <!-- Dropdown RP untuk sistem point; default disembunyikan -->
                                        <div class="rp-option" id="current-rp-dropdown" style="display:none;">
                                            <label class="form-label" for="current-rp">RP saat ini</label>
                                            <select class="form-select" id="current-rp" name="current-rp"></select>
                                        </div>
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
                                            src="{{ asset('storage/' . $game->rankCategories->first()->image) }}"
                                            id="desired-selected-img">
                                        <h4 id="desired-selected-text">Rank yang diinginkan:
                                            {{ $game->rankCategories->first()->name }}</h4>
                                    </div>
                                    <div class="rank-grid" id="desired-rank-grid">
                                        @foreach ($game->rankCategories->sortBy('display_order') as $category)
                                            @php
                                                $rankCode =
                                                    $category->display_order . '-' . strtolower($category->name);
                                            @endphp
                                            <div class="rank-item {{ $loop->first ? 'selected' : '' }}"
                                                data-rank="{{ $rankCode }}" data-system="{{ $category->system_type }}"
                                                onclick="selectRank('desired', this)">
                                                <img alt="{{ $category->name }}"
                                                    src="{{ asset('storage/' . $category->image) }}">
                                                <div class="rank-name">{{ $category->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3" id="desired-options">
                                        <div class="subdivision-options" id="desired-subdivisions-container"></div>
                                        <!-- Widget star rating untuk sistem star; default disembunyikan -->
                                        <div class="star-rating" id="desired-stars-input" style="display:none;">
                                            <label class="form-label">Bintang yang diinginkan</label>
                                            <div class="star-display">
                                                <!-- Icon akan di-generate secara dinamis -->
                                            </div>
                                            <input type="hidden" id="desired-stars" name="desired-stars" value="0">
                                        </div>
                                        <!-- Dropdown RP untuk sistem point; default disembunyikan -->
                                        <div class="rp-option" id="desired-rp-dropdown" style="display:none;">
                                            <label class="form-label" for="desired-rp">RP yang diinginkan</label>
                                            <select class="form-select" id="desired-rp" name="desired-rp"></select>
                                        </div>
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
                                                <span id="checkout-current-tier">Default</span> (Bintang: <span
                                                    id="checkout-current-stars">0</span>)
                                            </span>
                                        </li>
                                        <li class="list-group-item"><strong>RP saat ini:</strong> <span
                                                id="checkout-current-rp">-</span></li>
                                        <li class="list-group-item">
                                            <strong>Rank yang Diinginkan:</strong>
                                            <span id="checkout-desired-rank">
                                                <span id="checkout-desired-tier">Default</span> (Bintang: <span
                                                    id="checkout-desired-stars">0</span>)
                                            </span>
                                        </li>
                                        <li class="list-group-item"><strong>RP yang diinginkan:</strong> <span
                                                id="checkout-desired-rp">-</span></li>
                                        <li class="list-group-item"><strong>Server:</strong> <span
                                                id="checkout-server">North America</span></li>
                                        <li class="list-group-item"><strong>Platform:</strong> <span
                                                id="checkout-platform">PC</span></li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Subtotal</strong> <span id="checkout-subtotal">Rp. 0</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Total</strong> <span id="checkout-total">Rp.

                                    </ul>
                                    <button class="mt-3 btn btn-success w-100" type="button">Lanjut Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Row -->
            </div><!-- End Container -->
        </section>
    </main>
@endsection
@section('script')
    <script>
        AOS.init();

        // Mapping tier berdasarkan kategori,
        // disesuaikan dengan struktur tabel game_rank_categories & game_rank_tiers.
        var tierMapping = {!! json_encode(
            $game->rankCategories->keyBy(function ($cat) {
                    return $cat->display_order . '-' . strtolower($cat->name);
                })->map(function ($cat) {
                    return $cat->rankTiers->map(function ($tier) use ($cat) {
                        if ($cat->system_type === 'star') {
                            return [
                                'tier' => $tier->tier, // misal "I", "II", dsb.
                                'stars' => (int) $tier->progress_target,
                                'price' => number_format($tier->price, 0, ',', '.'),
                                'price_value' => (int) $tier->price,
                            ];
                        } else {
                            return [
                                'tier' => $tier->tier,
                                'progress' => $tier->progress_target ? $tier->progress_target . ' progress' : '-',
                                'price' => number_format($tier->price, 0, ',', '.'),
                                'price_value' => (int) $tier->price,
                            ];
                        }
                    });
                }),
        ) !!};

        // Mapping RP untuk kategori "point"
        var rpMapping = {!! json_encode(
            $game->rankCategories->keyBy(function ($cat) {
                    return $cat->display_order . '-' . strtolower($cat->name);
                })->map(function ($cat) {
                    return $cat->rankTiers->map(function ($tier) use ($cat) {
                        if ($cat->system_type === 'star') {
                            return str_repeat('<i class="fa-solid fa-star text-warning"></i>', (int) $tier->progress_target);
                                
                        } else {
                            return ($tier->progress_target ? $tier->progress_target . ' progress' : '-');
                                
                        }
                    });
                }),
        ) !!};

        // Fungsi bantuan untuk str_repeat di JS
        function str_repeat(input, multiplier) {
            let output = "";
            for (let i = 0; i < multiplier; i++) {
                output += input;
            }
            return output;
        }

        function numberToRoman(num) {
            const lookup = {
                M: 1000,
                CM: 900,
                D: 500,
                CD: 400,
                C: 100,
                XC: 90,
                L: 50,
                XL: 40,
                X: 10,
                IX: 9,
                V: 5,
                IV: 4,
                I: 1
            };
            let roman = '';
            for (let i in lookup) {
                while (num >= lookup[i]) {
                    roman += i;
                    num -= lookup[i];
                }
            }
            return roman;
        }

        // Fungsi untuk mengonversi roman numeral ke angka (jika dibutuhkan)
        function romanToNumber(romanStr) {
            const romanMap = {
                "I": 1,
                "II": 2,
                "III": 3,
                "IV": 4,
                "V": 5,
                "VI": 6,
                "VII": 7,
                "VIII": 8,
                "IX": 9,
                "X": 10
            };
            return romanMap[romanStr] || 0;
        }

        // Fungsi untuk menghasilkan tombol subdivisi (radio button) secara dinamis.
        // Menggunakan data "tier" dari mapping.
        function updateSubdivisions(type, rank) {
            const container = document.getElementById(type + "-subdivisions-container");
            container.innerHTML = "";
            container.style.display = "flex";
            container.style.justifyContent = "center";
            container.style.gap = "5px";
            const subdivisions = tierMapping[rank];
            if (!subdivisions || subdivisions.length === 0) return;
            // Buat radio button untuk tiap subdivisi
            // Kita iterasi dari index 0 sampai subdivisions.length - 1
            for (let i = 0; i < subdivisions.length; i++) {
                const radioId = type + "-subdiv-" + i;
                const input = document.createElement("input");
                input.type = "radio";
                input.classList.add("btn-check");
                input.name = type + "-subdivision";
                input.value = i; // simpan indeks subdivisi
                input.id = radioId;
                // Set default: radio button pertama (misal, subdivisi dengan index tertinggi, bisa disesuaikan)
                if (i === subdivisions.length - 1) {
                    input.checked = true;
                }
                const label = document.createElement("label");
                label.className = "btn btn-outline-primary";
                label.htmlFor = radioId;
                label.textContent = subdivisions[i].tier; // tampilkan label dari field tier
                container.appendChild(input);
                container.appendChild(label);
            }
        }

        // Fungsi untuk mengupdate dropdown RP (untuk kategori point)
        function updateRpOptions(type, rank) {
            const selectEl = document.getElementById(type + "-rp");
            selectEl.innerHTML = "";
            if (rpMapping[rank] && rpMapping[rank].length > 0) {
                rpMapping[rank].forEach(function(optionText) {
                    const opt = document.createElement("option");
                    if (optionText.indexOf('<i') !== -1) {
                        opt.innerHTML = optionText;
                    } else {
                        opt.textContent = optionText;
                    }
                    opt.value = optionText;
                    selectEl.appendChild(opt);
                });
                document.getElementById("checkout-" + type + "-rp").innerHTML = selectEl.options[0].innerHTML;
            }
        }

        // Fungsi untuk mengupdate star widget secara dinamis.
        // Untuk kategori star, jumlah bintang didasarkan pada properti "stars" pada subdivisi.
        function updateStarWidget(type, requiredStars) {
            const container = document.getElementById(type + "-stars-input");
            const starDisplay = container.querySelector(".star-display");
            starDisplay.innerHTML = "";
            for (let i = 1; i <= requiredStars; i++) {
                const icon = document.createElement("i");
                icon.classList.add("fa-regular", "fa-star");
                icon.setAttribute("data-value", i);
                icon.style.fontSize = "1.5rem";
                icon.style.cursor = "pointer";
                icon.style.margin = "0 2px";
                starDisplay.appendChild(icon);
            }
            const hiddenInput = container.querySelector("input[type='hidden']");
            const icons = starDisplay.querySelectorAll("i");
            icons.forEach(function(icon) {
                icon.addEventListener("click", function() {
                    const rating = parseInt(icon.getAttribute("data-value"));
                    hiddenInput.value = rating;
                    icons.forEach(function(s) {
                        const val = parseInt(s.getAttribute("data-value"));
                        if (val <= rating) {
                            s.classList.remove("fa-regular");
                            s.classList.add("fa-solid", "text-warning");
                        } else {
                            s.classList.remove("fa-solid", "text-warning");
                            s.classList.add("fa-regular");
                        }
                    });
                    updateCheckoutRank(type);
                    updateCheckoutPrice();
                });
            });
            hiddenInput.value = 0;
        }

        // Fungsi untuk memperbarui ringkasan checkout (rank & harga).
        function updateCheckoutRank(type) {
            const grid = document.getElementById(type + "-rank-grid");
            const selectedRankItem = grid.querySelector(".rank-item.selected");
            if (!selectedRankItem) return;
            const rank = selectedRankItem.getAttribute("data-rank");
            const rankName = selectedRankItem.querySelector(".rank-name").textContent;
            let subdivRadio = document.querySelector('input[name="' + type + '-subdivision"]:checked');
            let tierLabel = subdivRadio ? subdivRadio.nextSibling.textContent : '';
            let stars = "0";
            const starInput = document.querySelector("#" + type + "-stars-input input[type='hidden']");
            if (starInput) {
                stars = starInput.value;
            }
            let checkoutText = rankName + (tierLabel ? (" " + tierLabel) : "") + " (Bintang: " + stars + ")";
            document.getElementById("checkout-" + type + "-rank").textContent = checkoutText;
        }

        // Fungsi untuk menghitung subtotal dan total.
        // Di sini subtotal dihitung sebagai selisih harga tier desired dan current (tidak negatif).
        function updateCheckoutPrice() {
            // Current
            let currentPrice = 0;
            const currentGrid = document.getElementById("current-rank-grid");
            const currentRankItem = currentGrid.querySelector(".rank-item.selected");
            if (currentRankItem) {
                const currentRank = currentRankItem.getAttribute("data-rank");
                const currentSubdivisionRadio = document.querySelector('input[name="current-subdivision"]:checked');
                if (currentRank && tierMapping[currentRank] && currentSubdivisionRadio) {
                    let index = parseInt(currentSubdivisionRadio.value);
                    currentPrice = tierMapping[currentRank][index]['price_value'] || 0;
                }
            }

            // Desired
            let desiredPrice = 0;
            const desiredGrid = document.getElementById("desired-rank-grid");
            const desiredRankItem = desiredGrid.querySelector(".rank-item.selected");
            if (desiredRankItem) {
                const desiredRank = desiredRankItem.getAttribute("data-rank");
                const desiredSubdivisionRadio = document.querySelector('input[name="desired-subdivision"]:checked');
                if (desiredRank && tierMapping[desiredRank] && desiredSubdivisionRadio) {
                    let index = parseInt(desiredSubdivisionRadio.value);
                    desiredPrice = tierMapping[desiredRank][index]['price_value'] || 0;
                }
            }

            let subtotal = Math.max(desiredPrice - currentPrice, 0);
            let total = subtotal; // Bisa ditambah fee atau diskon jika diperlukan

            document.getElementById("checkout-subtotal").textContent = "Rp. " + number_format(subtotal);
            document.getElementById("checkout-total").textContent = "Rp. " + number_format(total);
        }

        // Fungsi sederhana untuk format angka (Indonesia)
        function number_format(number) {
            return number.toLocaleString('id-ID');
        }

        function updateCheckoutRp(type) {
            if (type === "current") {
                const selectEl = document.getElementById("current-rp");
                document.getElementById("checkout-current-rp").textContent = selectEl.value;
            } else if (type === "desired") {
                const selectEl = document.getElementById("desired-rp");
                document.getElementById("checkout-desired-rp").textContent = selectEl.value;
            }
            updateCheckoutPrice();
        }

        function updateCheckoutExtra() {
            const serverSelect = document.getElementById("server");
            const platformSelect = document.getElementById("platform");
            document.getElementById("checkout-server").textContent = serverSelect.options[serverSelect.selectedIndex].text;
            document.getElementById("checkout-platform").textContent = platformSelect.options[platformSelect.selectedIndex]
                .text;
        }

        // Fungsi untuk menangani pemilihan rank
        function selectRank(type, el) {
            const grid = document.getElementById(type + "-rank-grid");
            grid.querySelectorAll(".rank-item").forEach(function(item) {
                item.classList.remove("selected");
            });
            el.classList.add("selected");
            const systemType = el.getAttribute("data-system");
            if (systemType === "star") {
                document.getElementById(type + "-stars-input").style.display = "block";
                document.getElementById(type + "-rp-dropdown").style.display = "none";
                const currentRank = el.getAttribute("data-rank");
                const subdivisions = tierMapping[currentRank];
                if (subdivisions && subdivisions.length > 0) {
                    // Default gunakan subdivisi terakhir (misal tier tertinggi)
                    updateStarWidget(type, subdivisions[subdivisions.length - 1].stars);
                }
            } else if (systemType === "point") {
                document.getElementById(type + "-rp-dropdown").style.display = "block";
                document.getElementById(type + "-stars-input").style.display = "none";
            } else {
                document.getElementById(type + "-stars-input").style.display = "block";
                document.getElementById(type + "-rp-dropdown").style.display = "block";
            }
            const selectedRank = el.getAttribute("data-rank");
            const selectedName = el.querySelector(".rank-name").textContent;
            if (typeof rankImageMapping !== 'undefined' && rankImageMapping[selectedRank]) {
                document.getElementById(type + "-selected-img").src = rankImageMapping[selectedRank];
            }
            document.getElementById(type + "-selected-text").textContent =
                (type === "current" ? "Rank saat ini: " : "Rank yang diinginkan: ") + selectedName;
            updateCheckoutRank(type);
            updateSubdivisions(type, selectedRank);
            if (rpMapping[selectedRank] && rpMapping[selectedRank].length > 0) {
                updateRpOptions(type, selectedRank);
            }
        }

        // Event listener untuk subdivisi agar mengupdate widget dan harga jika sistem star
        document.addEventListener("change", function(e) {
            if (e.target.name === "current-subdivision") {
                updateCheckoutRank("current");
                let index = parseInt(e.target.value);
                let currentRank = document.querySelector("#current-rank-grid .rank-item.selected").getAttribute(
                    "data-rank");
                let subdivisions = tierMapping[currentRank];
                if (subdivisions && subdivisions[index]) {
                    updateStarWidget("current", subdivisions[index].stars);
                }
                updateCheckoutPrice();
            }
            if (e.target.name === "desired-subdivision") {
                updateCheckoutRank("desired");
                let index = parseInt(e.target.value);
                let desiredRank = document.querySelector("#desired-rank-grid .rank-item.selected").getAttribute(
                    "data-rank");
                let subdivisions = tierMapping[desiredRank];
                if (subdivisions && subdivisions[index]) {
                    updateStarWidget("desired", subdivisions[index].stars);
                }
                updateCheckoutPrice();
            }
        });

        document.getElementById("current-rp").addEventListener("change", function() {
            updateCheckoutRp("current");
        });
        document.getElementById("desired-rp").addEventListener("change", function() {
            updateCheckoutRp("desired");
        });
        document.getElementById("server").addEventListener("change", updateCheckoutExtra);
        document.getElementById("platform").addEventListener("change", updateCheckoutExtra);

        // Pastikan default item sudah dipilih dan widget langsung ter-update saat halaman load.
        document.addEventListener("DOMContentLoaded", function() {
            let currentDefault = document.querySelector("#current-rank-grid .rank-item.selected") ||
                document.querySelector("#current-rank-grid .rank-item");
            let desiredDefault = document.querySelector("#desired-rank-grid .rank-item.selected") ||
                document.querySelector("#desired-rank-grid .rank-item");

            if (currentDefault) {
                selectRank("current", currentDefault);
            }
            if (desiredDefault) {
                selectRank("desired", desiredDefault);
            }
            updateCheckoutExtra();
        });
    </script>
@endsection
