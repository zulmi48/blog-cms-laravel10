<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laravel Blog</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body>
    <!-- Responsive navbar-->
    @include('frontend.layouts.navbar')
    <!-- Page header with logo and tagline-->
    @include('frontend.layouts.header')

    @yield('content')

    <!-- Footer-->
    @include('frontend.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="{{ asset('front/js/scripts.js') }}"></script>
    @stack('js')
</body>

</html>
