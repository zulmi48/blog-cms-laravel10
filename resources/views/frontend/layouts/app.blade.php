<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laravel Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
    <!-- Core theme JS-->
    <script src="{{ asset('front/js/scripts.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('js')
</body>

</html>
