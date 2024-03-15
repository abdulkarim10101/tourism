{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('giftoliaa/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('giftoliaa/assets/css/main.css') }}">
    <title>@yield('title', 'Dubai City Tours - Travel With Style')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/frontend/assets/css/style-starter.css">
    <link rel="stylesheet" href="/frontend/assets/css/custom.css">

    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">

    @yield('meta')
</head>

<body class="petmark-theme-3">
    <div class="alert1 alert-success @if (Session::has('message')) show @else hide @endif" style="display: none;"
        role="alert">
        {{ Session::get('message') }}
    </div>

    <div class="alert1 alert-danger hide" role="alert" style="display: none;">

    </div>
    <div class="site-wrapper">
        @include('frontend.layouts.header')
        @yield('content')
    </div>
    @include('frontend.layouts.footer')
    {{-- <script src="{{ asset('giftoliaa/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('giftoliaa/assets/js/ajax-mail.js') }}"></script>
    --}}
    @include('frontend.layouts.scripts')
    @include('frontend.layouts.popup')
    <script src="{{ asset('giftoliaa/assets/js/custom.js') }}"></script>
    @yield('scripts')


    <style>

    </style>
    @if (!request()->is('/'))
        <script>
            window.addEventListener('load', function() {
                var scrollDistance = window.innerWidth <= 768 ? 500 : 700;
                window.scrollBy(0, scrollDistance);
            });
        </script>
    @endif
</body>

</html>
