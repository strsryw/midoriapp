<!-- /*
* Template Name: Financing
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/css/tiny-slider.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/glightbox.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/flatpickr.min.css">


    <title>Financing &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
</head>

<body>


    @include('landingpage.partials.navbar')

    @if ($hero != 'index')
        @include('landingpage.partials.hero')
    @else
        @include('landingpage.partials.heroindex')
    @endif

    @yield('content')

    @include('landingpage.partials.footer')

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/tiny-slider.js"></script>

    <script src="/assets/js/flatpickr.min.js"></script>


    <script src="/assets/js/aos.js"></script>
    <script src="/assets/js/glightbox.min.js"></script>
    <script src="/assets/js/navbar.js"></script>
    <script src="/assets/js/counter.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>
