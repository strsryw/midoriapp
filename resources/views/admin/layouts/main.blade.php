<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MIDORI - {{ isset($title) ?? 'Title' }}</title>
    <!-- CSS files -->
    <link href="/assets/admin/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="/assets/admin/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="/assets/admin/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="/assets/admin/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="/assets/admin/dist/css/demo.min.css" rel="stylesheet" />

    {{-- Style Font --}}
    <link rel="stylesheet" href="/assets/web/css/style.css">

    {{-- CSS Addon --}}
    @stack('css')

</head>

<body>
    <script src="/assets/admin/dist/js/demo-theme.min.js"></script>
    <div class="page">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <div class="page-wrapper">
            <!-- Content -->
            @yield('content')

            <!-- Footer -->
            @include('admin.layouts.footer')
        </div>
    </div>

    <!-- Tabler Core -->
    <script src="/assets/admin/dist/js/tabler.min.js"></script>
    <script src="/assets/admin/dist/js/demo.min.js"></script>
    <script src="/assets/web/js/jquery-3.7.1.min.js"></script>

    @stack('script')
</body>

</html>
