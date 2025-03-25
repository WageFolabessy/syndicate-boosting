<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Syndicate - Forgot Password</title>
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
                <h1 class="auth-title">Forgot Password</h1>
                <p class="auth-subtitle">Enter your email and we'll send you a link to reset your password</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="auth-form" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="form-floating mb-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address"
                        required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                </div>
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary auth-button">Send Reset Link</button>
                </div>
                <div class="d-grid gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary auth-button">Back to Sign In</a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/dashboard/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
