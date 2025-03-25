<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body>
    <p>Anda menerima email ini karena ada permintaan untuk mereset password akun Anda.</p>
    <p>
        Klik tautan berikut untuk mereset password Anda:
    </p>
    <p>
        <a href="{{ route('password.reset', $token) }}?email={{ urlencode($email) }}">
            Reset Password
        </a>
    </p>
    <p>Link reset password ini akan kedaluwarsa dalam 60 menit.</p>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
</body>

</html>
