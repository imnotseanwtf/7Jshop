<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/5e81b262d9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ config('app.name', '7JSign&PrintingServices') }}</title>

    <!-- Styles -->
    @vite('resources/sass/app.scss')

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>

<body>
    @include('sweetalert::alert')
    @include('layouts.nav')
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        @yield('content')
        {{-- Footer --}}
        @include('layouts.footer')
    </main>

    @yield('scripts')
</body>

</html>
