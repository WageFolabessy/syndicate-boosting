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

        <!-- Form Boost Rank -->
        <section class="py-5 rank-boost">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <form>
                            <!-- Card Rank Saat Ini -->
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
                                            <div class="rank-item @if ($loop->first) selected @endif"
                                                data-rank="{{ $rankCode }}" onclick='selectRank("current",this)'>
                                                <img alt="{{ $category->name }}"
                                                    src="{{ asset('storage/' . $category->image) }}">
                                                <div class="rank-name">{{ $category->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3" id="current-options">
                                        <!-- Container subdivisi di-generate secara dinamis -->
                                        <div class="subdivision-options" id="current-subdivisions-container"></div>
                                        <div class="mt-3 rp-option" id="current-rp-dropdown">
                                            <label class="form-label" for="current-rp">RP saat ini</label>
                                            <select class="form-select" id="current-rp" name="current-rp"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Rank Yang Diinginkan -->
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
                                            <div class="rank-item @if ($loop->first) selected @endif"
                                                data-rank="{{ $rankCode }}" onclick='selectRank("desired",this)'>
                                                <img alt="{{ $category->name }}"
                                                    src="{{ asset('storage/' . $category->image) }}">
                                                <div class="rank-name">{{ $category->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mt-3" id="desired-options">
                                        <!-- Container subdivisi di-generate secara dinamis -->
                                        <div class="subdivision-options" id="desired-subdivisions-container"></div>
                                        <div class="mt-3 rp-option" id="desired-rp-dropdown">
                                            <label class="form-label" for="desired-rp">RP yang diinginkan</label>
                                            <select class="form-select" id="desired-rp" name="desired-rp"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pilihan Server dan Platform -->
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

                    <!-- Checkout -->
                    <div class="col-lg-4">
                        <div class="checkout" data-aos="fade-up" data-aos-delay="500">
                            <h4 class="mb-3">Checkout</h4>
                            <div class="card card-custom">
                                <div class="card-body">
                                    <p class="mb-2">Ringkasan Pesanan</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <strong>Rank Saat Ini:</strong>
                                            <span id="checkout-current-rank">{{ $game->rankCategories->first()->name }}
                                                4</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>RP saat ini:</strong> <span id="checkout-current-rp">-</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Rank yang Diinginkan:</strong>
                                            <span id="checkout-desired-rank">{{ $game->rankCategories->first()->name }}
                                                4</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>RP yang diinginkan:</strong> <span id="checkout-desired-rp">-</span>
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
                                    <button class="btn btn-success mt-3 w-100" type="button">Lanjut Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- end row -->
            </div><!-- end container -->
        </section>
    </main>
@endsection

@section('script')
    <script>
        AOS.init();

        // Mapping RP options berdasarkan data rank tier dari database.
        // Menghasilkan mapping dengan key = "1-rookie", "2-bronze", dst.
        var rpMapping = {!! json_encode(
            $game->rankCategories->keyBy(function ($cat) {
                    return $cat->display_order . '-' . strtolower($cat->name);
                })->map(function ($cat) {
                    return $cat->rankTiers->map(function ($tier) {
                        return $tier->stars_required . ' stars - Rp ' . number_format($tier->price, 0, ',', '.');
                    });
                }),
        ) !!};

        // Mapping gambar untuk tiap rank.
        var rankImageMapping = {!! json_encode(
            $game->rankCategories->keyBy(function ($cat) {
                    return $cat->display_order . '-' . strtolower($cat->name);
                })->map(function ($cat) {
                    return asset('storage/' . $cat->image);
                }),
        ) !!};

        // Fungsi untuk mengkonversi angka ke romawi (untuk jumlah tier kecil)
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

        // Fungsi untuk generate subdivisi radio button secara dinamis
        // Berdasarkan jumlah tier yang tersedia (misalnya 3 tier menghasilkan radio: "III", "II", "I")
        function updateSubdivisions(type, rank) {
            const container = document.getElementById(type + "-subdivisions-container");
            container.innerHTML = "";
            container.style.display = "flex";
            container.style.justifyContent = "center";
            container.style.gap = "5px";

            const tierCount = rpMapping[rank].length;
            // Generate subdivisi mulai dari tierCount sampai 1, lalu konversi ke angka romawi.
            for (let i = tierCount; i >= 1; i--) {
                const roman = numberToRoman(i);
                const radioId = type + "-subdiv-" + roman;
                const input = document.createElement("input");
                input.type = "radio";
                input.classList.add("btn-check"); // Tambahkan class btn-check
                input.name = type + "-subdivision";
                input.value = roman;
                input.id = radioId;
                if (i === tierCount) {
                    input.checked = true;
                }
                const label = document.createElement("label");
                label.className = "btn btn-outline-primary";
                label.htmlFor = radioId;
                label.textContent = roman;
                container.appendChild(input);
                container.appendChild(label);
            }
        }


        // Fungsi untuk mengupdate dropdown RP sesuai rank yang dipilih
        function updateRpOptions(type, rank) {
            const selectEl = document.getElementById(type + "-rp");
            selectEl.innerHTML = "";
            if (rpMapping[rank] && rpMapping[rank].length > 0) {
                rpMapping[rank].forEach(function(optionText) {
                    const opt = document.createElement("option");
                    opt.value = optionText;
                    opt.textContent = optionText;
                    selectEl.appendChild(opt);
                });
                document.getElementById("checkout-" + type + "-rp").textContent = selectEl.options[0].value;
            }
        }

        // Fungsi untuk update checkout bagian rank (dengan subdivisi)
        function updateCheckoutRank(type) {
            const grid = document.getElementById(type + "-rank-grid");
            const selectedRankItem = grid.querySelector(".rank-item.selected");
            if (!selectedRankItem) return;
            const rank = selectedRankItem.getAttribute("data-rank");
            const rankName = selectedRankItem.querySelector(".rank-name").textContent;
            let checkoutText = rankName;
            if (rpMapping[rank] && rpMapping[rank].length > 0) {
                const subdivRadio = document.querySelector('input[name="' + type + '-subdivision"]:checked');
                if (subdivRadio) {
                    checkoutText += " " + subdivRadio.value;
                }
            }
            document.getElementById("checkout-" + type + "-rank").textContent = checkoutText;
        }

        // Fungsi update checkout untuk dropdown RP
        function updateCheckoutRp(type) {
            if (type === "current") {
                const selectEl = document.getElementById("current-rp");
                document.getElementById("checkout-current-rp").textContent = selectEl.value;
            } else if (type === "desired") {
                const selectEl = document.getElementById("desired-rp");
                document.getElementById("checkout-desired-rp").textContent = selectEl.value;
            }
        }

        // Fungsi update checkout untuk server dan platform
        function updateCheckoutExtra() {
            const serverSelect = document.getElementById("server");
            const platformSelect = document.getElementById("platform");
            document.getElementById("checkout-server").textContent = serverSelect.options[serverSelect.selectedIndex].text;
            document.getElementById("checkout-platform").textContent = platformSelect.options[platformSelect.selectedIndex]
                .text;
        }

        // Fungsi untuk memilih rank (current atau desired)
        function selectRank(type, el) {
            const grid = document.getElementById(type + "-rank-grid");
            grid.querySelectorAll(".rank-item").forEach(function(item) {
                item.classList.remove("selected");
            });
            el.classList.add("selected");

            const selectedRank = el.getAttribute("data-rank");
            const selectedName = el.querySelector(".rank-name").textContent;
            if (rankImageMapping[selectedRank]) {
                document.getElementById(type + "-selected-img").src = rankImageMapping[selectedRank];
            }
            document.getElementById(type + "-selected-text").textContent = (type === "current" ? "Rank saat ini: " :
                "Rank yang diinginkan: ") + selectedName;

            updateCheckoutRank(type);
            updateSubdivisions(type, selectedRank);

            if (rpMapping[selectedRank] && rpMapping[selectedRank].length > 0) {
                updateRpOptions(type, selectedRank);
            }
        }

        // Event listener
        document.getElementById("current-rp").addEventListener("change", function() {
            updateCheckoutRp("current");
        });
        document.getElementById("desired-rp").addEventListener("change", function() {
            updateCheckoutRp("desired");
        });
        // Event delegation untuk subdivisi
        document.addEventListener("change", function(e) {
            if (e.target.name === "current-subdivision") {
                updateCheckoutRank("current");
            }
            if (e.target.name === "desired-subdivision") {
                updateCheckoutRank("desired");
            }
        });
        document.getElementById("server").addEventListener("change", updateCheckoutExtra);
        document.getElementById("platform").addEventListener("change", updateCheckoutExtra);

        // Inisialisasi default
        let defaultCurrentRank = document.querySelector("#current-rank-grid .rank-item.selected").getAttribute("data-rank");
        let defaultDesiredRank = document.querySelector("#desired-rank-grid .rank-item.selected").getAttribute("data-rank");
        updateSubdivisions("current", defaultCurrentRank);
        updateSubdivisions("desired", defaultDesiredRank);
        updateRpOptions("current", defaultCurrentRank);
        updateRpOptions("desired", defaultDesiredRank);
        updateCheckoutRank("current");
        updateCheckoutRank("desired");
        updateCheckoutExtra();
    </script>
@endsection
