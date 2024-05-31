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
        content="Bergabunglah dengan LPK Midori Gakko untuk pelatihan profesional unggulan. Kami membantu Anda mencapai kesuksesan karir dengan keterampilan dan pengetahuan industri yang komprehensif.">
    <meta name="keywords"
        content="LPK Terbaik di Pati, LPK MIDORI GAKKOU, LPK Pati, Lembaga Pelatihan Kerja Pati, Pelatihan Kerja Terbaik Pati, Kursus Kerja Pati, Pelatihan Bahasa Jepang Pati, LPK Jepang Pati, Sekolah Bahasa Jepang Pati, Pelatihan Tenaga Kerja Pati, Program Pelatihan Pati, LPK Berkualitas Pati">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.lpkmidorigakkou.com/" />
    <meta property="og:title" content=" LPK MIDORI GAKKOU" />
    <meta property="og:description"
        content="Bergabunglah dengan LPK Midori Gakko untuk pelatihan profesional unggulan. Kami membantu Anda mencapai kesuksesan karir dengan keterampilan dan pengetahuan industri yang komprehensif." />
    <meta property="og:image" content="/assets/web/img/company_logo.png" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://www.lpkmidorigakkou.com/" />
    <meta property="twitter:title" content=" LPK MIDORI GAKKOU" />
    <meta property="twitter:description"
        content="Bergabunglah dengan LPK Midori Gakko untuk pelatihan profesional unggulan. Kami membantu Anda mencapai kesuksesan karir dengan keterampilan dan pengetahuan industri yang komprehensif." />
    <meta property="twitter:image" content="/assets/web/img/company_logo.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/landing_page/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/landing_page/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/assets/landing_page/css/tiny-slider.css">
    <link rel="stylesheet" href="/assets/landing_page/css/aos.css">
    <link rel="stylesheet" href="/assets/landing_page/css/glightbox.min.css">
    <link rel="stylesheet" href="/assets/landing_page/css/style.css">

    <link rel="stylesheet" href="/assets/landing_page/css/flatpickr.min.css">
    <link rel="stylesheet" href="/assets/web/css/style.css">
    <link rel="stylesheet" href="/assets/web/css/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('style')

    <title>@yield('title') LPK MIDORI GAKKOU</title>
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
    <script src="/assets/web/js/sweetalert2.all.min.js"></script>
    @stack('script')
</body>

</html>
