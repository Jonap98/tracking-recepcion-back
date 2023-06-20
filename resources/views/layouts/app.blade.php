<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="tkn" name="csrf-token" content="{{ csrf_token() }}">

    <title>Tracking recepción</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- @livewireStyles --}}
    <!-- CSS only -->
    @yield('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}"> --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/whirlpool-logo.png') }}" alt="" width="100px">
                </a>
                <div class="navbar-link">
                    <b>Tracking recepción</b>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    {{-- Catalogos --}}

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Ubicaciones</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Partes</a>
                        </li>
                    </ul>



                <a class="btn" href="../">Regresar al portal</a>

            </div>
            <div class=""></div>

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- @livewireScripts --}}
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
