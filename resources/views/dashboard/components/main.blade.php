<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Syndicate @yield('title')</title>
    <meta name="description" content="Syndicate Admin Dashboard" />
    <meta name="author" content="Syndicate" />
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
    @yield('script')
</body>

</html>
