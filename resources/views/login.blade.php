<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Syndicate - Login</title>
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
                <h1 class="auth-title">Welcome to Syndicate</h1>
                <p class="auth-subtitle">Sign in to your account to continue</p>
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
            <form class="auth-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address"
                        required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('forgot.password') }}" class="auth-link">Forgot password?</a>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary auth-button">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/dashboard/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
