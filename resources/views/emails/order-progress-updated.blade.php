<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Progres Pesanan</title>
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
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            padding: 32px 28px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .body {
            padding: 30px;
        }
        .box {
            border-radius: 10px;
            border: 1px solid #dbeafe;
            background: #eff6ff;
            padding: 18px;
            margin: 18px 0;
        }
        .label {
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
        }
        .value {
            font-size: 20px;
            font-weight: 700;
            color: #0b5ed7;
        }
        .text {
            font-size: 14px;
            line-height: 1.7;
            color: #555555;
        }
        .footer {
            background-color: #f9fafb;
            border-top: 1px solid #e5e7eb;
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>{{ $isReminder ? 'Pengingat Progres Pesanan' : 'Update Progres Pesanan' }}</h1>
        <p>Status terbaru pesanan Anda telah diperbarui</p>
    </div>

    <div class="body">
        <p class="text">Halo, <strong>{{ $customerName }}</strong>.</p>

        <p class="text">
            {{ $isReminder ? 'Ini adalah email pengingat progres' : 'Kami informasikan bahwa progres' }}
            untuk pesanan <strong>{{ $orderType }}</strong> Anda telah diperbarui.
        </p>

        <div class="box">
            <div class="label">Nomor Transaksi</div>
            <div class="value">{{ $transactionNumber }}</div>
        </div>

        <div class="box">
            <div class="label">Status Progres</div>
            <div class="value">{{ $statusLabel }}</div>
        </div>

        <p class="text">
            Anda dapat mengecek detail pesanan kapan saja melalui halaman transaksi menggunakan nomor
            transaksi di atas.
        </p>

        <p class="text" style="font-size: 13px; color: #777;">
            Email ini dikirim ke <strong>{{ $customerEmail }}</strong> karena Anda melakukan transaksi di platform kami.
            Jika Anda merasa tidak melakukan transaksi ini, abaikan email ini.
        </p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} <strong>Syndicate Booster</strong>. All rights reserved.</p>
        <p>Email ini dikirim secara otomatis, mohon jangan membalas email ini.</p>
    </div>
</div>
</body>
</html>
