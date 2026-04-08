<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333333;
        }
        .wrapper {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        .header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            padding: 40px 30px;
            text-align: center;
            color: #ffffff;
        }
        .header .checkmark {
            font-size: 48px;
            margin-bottom: 16px;
        }
        .header h1 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 0;
            font-size: 15px;
            opacity: 0.85;
        }
        .body {
            padding: 36px 40px;
        }
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .transaction-box {
            background-color: #f0f0ff;
            border: 1px solid #c7d2fe;
            border-radius: 10px;
            padding: 20px 24px;
            text-align: center;
            margin: 24px 0;
        }
        .transaction-box .label {
            font-size: 13px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }
        .transaction-box .number {
            font-size: 22px;
            font-weight: 700;
            color: #4f46e5;
            letter-spacing: 0.03em;
        }
        .info-text {
            font-size: 14px;
            color: #555555;
            line-height: 1.7;
            margin-bottom: 16px;
        }
        .divider {
            border: none;
            border-top: 1px solid #e5e7eb;
            margin: 28px 0;
        }
        .footer {
            background-color: #f9fafb;
            padding: 24px 40px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
        }
        .footer strong {
            color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <div class="header">
            <div class="checkmark">✅</div>
            <h1>Transaksi Berhasil!</h1>
            <p>Pembayaran Anda telah dikonfirmasi</p>
        </div>

        <!-- Body -->
        <div class="body">
            <p class="greeting">Halo, <strong>{{ $customerName }}</strong>!</p>

            <p class="info-text">
                Terima kasih telah melakukan pemesanan di <strong>Syndicate Booster</strong>.
                Pembayaran Anda telah berhasil diverifikasi. Tim kami akan segera memproses pesanan Anda.
            </p>

            <!-- Transaction Number Box -->
            <div class="transaction-box">
                <div class="label">Nomor Transaksi Anda</div>
                <div class="number">{{ $transaction->transaction_number }}</div>
            </div>

            <p class="info-text">
                Simpan nomor transaksi di atas untuk keperluan pelacakan pesanan Anda.
                Jika ada pertanyaan, silakan hubungi tim support kami dengan menyertakan nomor transaksi tersebut.
            </p>

            <hr class="divider">

            <p class="info-text" style="font-size: 13px; color: #777;">
                Email ini dikirim ke <strong>{{ $customerEmail }}</strong> karena Anda melakukan transaksi di platform kami.
                Jika Anda merasa tidak melakukan transaksi ini, abaikan email ini.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} <strong>Syndicate Booster</strong>. All rights reserved.</p>
            <p>Email ini dikirim secara otomatis, mohon jangan membalas email ini.</p>
        </div>
    </div>
</body>
</html>
