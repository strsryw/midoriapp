<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="LPK Midori Gakko">
    <link rel="shortcut icon" href="{{ asset('assets/web/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/web/img/favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="Pelatihan Profesional Terbaik untuk Masa Depan Sukses - LPK Midori Gakko">
    <meta name="description"
        content="LPK Midori Gakko adalah penyedia pelatihan profesional unggulan yang dirancang untuk membantu Anda mencapai kesuksesan karir. Dengan fokus pada pengembangan keterampilan dan pengetahuan industri, kami menawarkan pelatihan komprehensif untuk membentuk masa depan Anda yang cerah. Bergabunglah dengan kami dan mulailah perjalanan menuju kesuksesan Anda hari ini.">
    <meta name="keywords"
        content="LPK Midori Gakko, pelatihan profesional, karir sukses, keterampilan industri, pengembangan diri, pelatihan unggulan, program pelatihan, kursus profesional, pelatihan karir, pelatihan keterampilan, pendidikan dan pelatihan, LPK terbaik, pelatihan berkualitas, pelatihan Jepang, pelatihan sertifikasi">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="/assets/landing_page/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/landing_page/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/assets/landing_page/css/tiny-slider.css">
    <link rel="stylesheet" href="/assets/landing_page/css/aos.css">
    <link rel="stylesheet" href="/assets/landing_page/css/glightbox.min.css">
    <link rel="stylesheet" href="/assets/landing_page/css/style.css">

    <link rel="stylesheet" href="/assets/landing_page/css/flatpickr.min.css">
    <link rel="stylesheet" href="/assets/web/css/style.css">
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10/dist/sweetalert2.min.css
    " rel="stylesheet">
    @stack('style')

    <title>@yield('title') LPK MIDORI</title>
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
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="/assets/landing_page/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/landing_page/js/tiny-slider.js"></script>
    <script src="/assets/landing_page/js/flatpickr.min.js"></script>
    <script src="/assets/landing_page/js/aos.js"></script>
    <script src="/assets/landing_page/js/glightbox.min.js"></script>
    <script src="/assets/landing_page/js/navbar.js"></script>
    <script src="/assets/landing_page/js/counter.js"></script>
    <script src="/assets/landing_page/js/custom.js"></script>
    <script src="/assets/web/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10/dist/sweetalert2.all.min.js"></script>
    @stack('script')
</body>

</html>
