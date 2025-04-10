@extends('site-user.components.main')
@section('meta')
    <meta name="keywords"
        content="game accounts, jual akun game, premium accounts, mobile legends account, valorant account" />
    <meta name="author" content="Syndicate" />
    <meta property="og:title" content="Premium Game Accounts - Syndicate" />
    <meta property="og:description"
        content="Browse and buy premium game accounts with rare items, high ranks, and exclusive content." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://syndicate-gaming.com/akun-game" />
    <meta property="og:image" content="/images/og-image.jpg" />
@endsection
@section('title')
    - Akun Game Detail
@endsection
@section('css')
    <style>
        /* Header Section */
        .account-detail-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0 3rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Detail Card */
        .account-detail-card {
            border: 1px solid rgba(0, 0, 0, 0.075);
            border-radius: 1.5rem;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .account-detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.1);
        }

        /* Image Section */
        .account-detail-images {
            width: 100%;
            height: auto;
            max-height: 400px;
            /* sesuaikan tinggi maksimum jika diperlukan */
            object-fit: contain;
        }

        /* Price Styling */
        .price-tag .current-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0d6efd;
        }

        /* Feature List */
        .feature-list-item {
            padding: 1rem;
            background: rgba(13, 110, 253, 0.05);
            border-radius: 0.75rem;
            margin-bottom: 0.75rem;
        }

        /* Order Button */
        .btn-order {
            padding: 1rem 2rem;
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-order i {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .btn-order:hover {
            padding-right: 3.5rem;
        }

        .btn-order:hover i {
            opacity: 1;
            right: 1.5rem;
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

        /* Styling untuk placeholder dan invalid feedback */
        input.form-control::placeholder {
            color: #6c757d;
            opacity: 1;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .account-detail-images {
                max-height: 300px;
            }

            .price-tag .current-price {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .account-detail-header {
                padding: 3rem 0;
            }

            .account-detail-card {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .account-detail-images {
                max-height: 250px;
            }

            .btn-order {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Header Section -->
        <section class="account-detail-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center" data-aos="fade-up">
                        <h1 class="display-5 fw-bold mb-3">{{ $account->account_name }}</h1>
                        <p class="lead text-muted">Akun premium dengan item eksklusif dan peringkat tinggi</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Account Detail Section -->
        <section class="account-detail-body">
            <div class="container">
                <div class="account-detail-card" data-aos="fade-up">
                    <div class="row g-0">
                        <!-- Image Column -->
                        <div class="col-lg-5">
                            <img src="{{ asset('storage/' . $account->image) }}" alt="{{ $account->account_name }}"
                                class="account-detail-images img-fluid">
                        </div>

                        <!-- Detail Column -->
                        <div class="col-lg-7">
                            <div class="p-4 p-xl-5">
                                <!-- Account Meta -->
                                <div class="d-flex justify-content-between text-muted mb-4">
                                    <div>
                                        <i class="bi bi-controller me-2"></i>
                                        {{ $account->game->name ?? '-' }}
                                    </div>
                                    <div>
                                        <i class="bi bi-person me-2"></i>
                                        Lv. {{ $account->level ?? '-' }}
                                    </div>
                                    <div>
                                        <i class="bi bi-clock me-2"></i>
                                        {{ $account->account_age ?? '-' }}
                                    </div>
                                </div>

                                <!-- Pricing -->
                                <div class="bg-light rounded-3 p-4 mb-4">
                                    <div class="price-tag">
                                        @if ($account->sale_price)
                                            <span class="current-price">
                                                Rp {{ number_format($account->sale_price, 0, ',', '.') }}
                                            </span>
                                            <del class="text-muted small">
                                                Rp {{ number_format($account->original_price, 0, ',', '.') }}
                                            </del>
                                        @else
                                            <span class="current-price">
                                                Rp {{ number_format($account->original_price, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Features -->
                                <div class="mb-4">
                                    <h5 class="h6 fw-bold mb-3 text-uppercase text-muted">Fitur Utama</h5>
                                    <div class="d-grid gap-2">
                                        @foreach (explode("\n", $account->features) as $line)
                                            @php
                                                $parts = explode('+', $line);
                                            @endphp
                                            @foreach ($parts as $feature)
                                                <div class="feature-list-item d-flex align-items-center">
                                                    <i class="bi bi-check2-circle text-success me-3"></i>
                                                    <span>{{ trim($feature) }}</span>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <h5 class="h6 fw-bold mb-3 text-uppercase text-muted">Deskripsi</h5>
                                    <p class="text-muted mb-0">{{ $account->description ?? '-' }}</p>
                                </div>

                                <!-- Action Button -->
                                <div class="mt-4">
                                    <button class="btn btn-primary btn-order order-button w-100" data-bs-toggle="modal"
                                        data-bs-target="#orderAccountModal">
                                        Pesan Sekarang Rp.
                                        {{ number_format($account->sale_price ?? $account->original_price, 0, ',', '.') }}
                                        <i class="bi bi-arrow-right-short"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('site-user.pages.akun-game.modal-akun-order')
    </main>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const gameAccountIdElem = document.getElementById('game_account_id');
            const customerNameElem = document.getElementById('customer_name');
            const customerContactElem = document.getElementById('customer_contact');
            const confirmButton = document.querySelector('.confirm-payment-button');

            if (!gameAccountIdElem || !customerNameElem || !customerContactElem || !confirmButton) {
                return;
            }

            confirmButton.addEventListener('click', function() {
                document.getElementById('error_customer_name').textContent = '';
                document.getElementById('error_customer_contact').textContent = '';

                const gameAccountId = gameAccountIdElem.value;
                const customerName = customerNameElem.value;
                const customerContact = customerContactElem.value;

                fetch('/account-order/process', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            game_account_id: gameAccountId,
                            customer_name: customerName,
                            customer_contact: customerContact
                        })
                    })
                    .then(async response => {
                        if (!response.ok) {
                            if (response.status === 422) {
                                const errorData = await response.json();
                                if (errorData.errors) {
                                    if (errorData.errors.customer_name) {
                                        document.getElementById('error_customer_name').textContent =
                                            errorData.errors.customer_name[0];
                                        customerNameElem.classList.add('is-invalid');
                                    }
                                    if (errorData.errors.customer_contact) {
                                        document.getElementById('error_customer_contact')
                                            .textContent = errorData.errors.customer_contact[0];
                                        customerContactElem.classList.add('is-invalid');
                                    }
                                }
                                throw new Error("Validasi gagal.");
                            } else {
                                throw new Error("Terjadi kesalahan saat menghubungkan ke server.");
                            }
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.snap_token) {
                            const transactionNumber = data.transaction_number;
                            snap.pay(data.snap_token, {
                                onSuccess: function(result) {
                                    alert("Pembayaran Berhasil! Catat nomor transaksi Anda: " +
                                        transactionNumber);
                                    window.location.href = "/transaksi?search=" +
                                        transactionNumber;
                                },
                                onPending: function(result) {
                                    alert(
                                        "Pembayaran pending, silakan cek status pembayaran."
                                    );
                                    window.location.reload();
                                },
                                onError: function(result) {
                                    alert("Terjadi kesalahan dalam pembayaran.");
                                    window.location.reload();
                                },
                                onClose: function() {
                                    alert("Terjadi kesalahan dalam pembayaran.");
                                    window.location.reload();
                                }
                            });
                        } else {
                            alert("Gagal mendapatkan snap token. Silakan coba lagi.");
                        }
                    })
                    .catch(() => {});
            });
        });
    </script>
@endsection
