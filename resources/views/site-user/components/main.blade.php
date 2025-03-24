<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Syndicate Boosting @yield('title')</title>

    <!-- Open Graph Meta Tags -->
    <meta name="description"
        content="Syndicate offers professional game boosting services and premium game accounts for serious players. Elevate your gaming experience today." />
    <meta name="keywords" content="game boosting, joki game, akun game, game accounts, professional gaming services" />
    <meta name="author" content="Syndicate" />
    @yield('meta')

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site-user/css/bootstrap.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site-user/css/main.css') }}" />
    @yield('css')

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/site-user/images/logo.png') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
</head>

<body>
    @include('site-user.components.navbar')
    @yield('content')
    @include('site-user.components.footer')
    <!-- Bootstrap 5 JS Bundle -->
    <script src="{{ asset('assets/site-user/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AOS Animation Library -->
    <script src="{{ asset('assets/site-user/js/aos.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/site-user/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
