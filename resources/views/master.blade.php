<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">@lang('messages.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('basket.index') }}">@lang('messages.basket')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.addForm') }}">@lang('messages.addProduct')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.addForm') }}">@lang('messages.addCategory')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" id="content">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquerry.min.js') }}"></script>
    <script src="{{ asset('js/busket.js') }}"></script>
</body>

</html>
