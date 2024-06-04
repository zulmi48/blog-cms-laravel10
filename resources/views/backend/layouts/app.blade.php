<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('back/js/color-mode.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <meta name="theme-color" content="#712cf9">
    <title>@yield('title')</title>
    <!-- CDN Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('back/css/custom.css') }}">
    <link href="{{ asset('back/css/dashboard.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>

<body>
    {{-- Button Switch Theme --}}
    @include('backend.layouts.btn-switch-theme')
    {{-- Header --}}
    @include('backend.layouts.header')

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            @include('backend.layouts.sidebar')
            {{-- End Sidebar --}}

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                {{-- Title Page --}}
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title-page')</h1>
                </div>
                {{-- End Title Page --}}

                {{-- Content --}}
                @yield('content')
                {{-- End Content --}}
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @stack('js')
</body>

</html>
