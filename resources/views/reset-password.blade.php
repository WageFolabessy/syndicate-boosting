<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Syndicate - Reset Password</title>
    <meta name="description" content="Syndicate Admin Dashboard">
    <meta name="author" content="Syndicate">
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/dashboard/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/auth.css') }}">
</head>

<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle">Create a new password for your account</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="auth-form" action="{{ route('password.update') }}" method="POST">
                @csrf
                <!-- Hidden fields untuk email dan token -->
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="New password" required>
                    <label for="password">New password</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm password" required>
                    <label for="password_confirmation">Confirm password</label>
                </div>
                <div class="password-requirements mb-4">
                    <p class="fs-6 fw-medium mb-2">Password requirements:</p>
                    <ul>
                        <li>Minimum 8 characters</li>
                        <li>At least one uppercase letter</li>
                        <li>At least one number</li>
                        <li>At least one special character</li>
                    </ul>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary auth-button">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/dashboard/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
