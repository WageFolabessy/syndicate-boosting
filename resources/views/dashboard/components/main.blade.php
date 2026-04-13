<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Syndicate Booster @yield('title')</title>
    <meta name="description" content="Syndicate Booster Admin Dashboard" />
    <meta name="author" content="Syndicate Booster" />
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/dashboard/images/logo.png') }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/main.css') }}" />
    @yield('css')
</head>

<body>
    <div id="root">
        @include('dashboard.components.sidebar')
        @include('dashboard.components.header')
        @yield('content')
    </div>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="{{ asset('assets/dashboard/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Main JavaScript -->
    <script src="{{ asset('assets/dashboard/js/main.js') }}"></script>

    <!-- ===== New Order Polling Notification ===== -->
    <!-- Toast container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index:9999;">
        <div id="newOrderToast" class="toast align-items-center text-bg-primary border-0 shadow" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2">
                    <i class="fas fa-bell fa-shake"></i>
                    <div>
                        <strong>Pesanan Baru Masuk!</strong>
                        <div class="small" id="newOrderToastDetail"></div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="px-3 pb-2 d-flex gap-2">
                <a href="/dashboard/transactions/all" class="btn btn-light btn-sm fw-semibold w-100">
                    <i class="fas fa-eye me-1"></i> Lihat Semua Transaksi
                </a>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var POLL_URL = '/dashboard/transactions/poll-latest';
            var POLL_INTERVAL = 15000; // 15 seconds
            var LS_KEY = 'syndicateLastSeenOrderId';

            // Seed localStorage on first load with whatever is already there
            // so we don't false-alarm on page open.
            fetch(POLL_URL)
                .then(r => r.json())
                .then(function (data) {
                    if (!localStorage.getItem(LS_KEY)) {
                        localStorage.setItem(LS_KEY, data.latest_id || 0);
                    }
                    startPolling();
                })
                .catch(startPolling); // still start even if initial fetch fails

            function startPolling() {
                setInterval(function () {
                    fetch(POLL_URL)
                        .then(r => r.json())
                        .then(function (data) {
                            var lastSeen = parseInt(localStorage.getItem(LS_KEY) || '0', 10);
                            var latest   = parseInt(data.latest_id || '0', 10);

                            if (latest > lastSeen) {
                                localStorage.setItem(LS_KEY, latest);
                                showNewOrderToast(data.transaction_number);
                            }
                        })
                        .catch(function () { /* silent — don't spam console */ });
                }, POLL_INTERVAL);
            }

            function showNewOrderToast(txNumber) {
                var detail = document.getElementById('newOrderToastDetail');
                if (detail) {
                    detail.textContent = txNumber ? 'No. ' + txNumber : 'Segera cek halaman transaksi.';
                }
                var toastEl = document.getElementById('newOrderToast');
                if (toastEl) {
                    // Play a subtle notification sound if browser allows
                    try {
                        var ctx = new (window.AudioContext || window.webkitAudioContext)();
                        var osc = ctx.createOscillator();
                        var gain = ctx.createGain();
                        osc.connect(gain);
                        gain.connect(ctx.destination);
                        osc.type = 'sine';
                        osc.frequency.setValueAtTime(880, ctx.currentTime);
                        gain.gain.setValueAtTime(0.15, ctx.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.5);
                        osc.start(ctx.currentTime);
                        osc.stop(ctx.currentTime + 0.5);
                    } catch(e) { /* audio not available */ }

                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            }
        })();
    </script>
    <!-- ===== End New Order Polling ===== -->

    @yield('script')
</body>

</html>
