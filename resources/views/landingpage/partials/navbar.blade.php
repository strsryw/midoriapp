<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row align-items-center">
                    <div class="col-4">
                        @if (isset($setting->logo))
                            <a href="{{ route('landing-page.index') }}" class="logo">
                                <img src="{{ asset('storage/landing_page/' . $setting->logo) }}" alt=""
                                    class="logo" style="max-width: 100px">
                            </a>
                        @else
                            <a href="/" class="logo">{{ $setting->alt_logo }}</a>
                        @endif
                    </div>
                    <div class="col-6 text-center ">
                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="{{ Route::is('landing-page.index') ? 'active' : '' }}">
                                <a href="{{ route('landing-page.index') }}">Home</a>
                            </li>
                            <li class="{{ Route::is('landing-page.profile') ? 'active' : '' }}">
                                <a href="{{ route('landing-page.profile') }}">Profil</a>
                            </li>
                            <li
                                class="{{ Route::is(['landing-page.berita', 'landing-page.detail-berita']) ? 'active' : '' }}">
                                <a href="{{ route('landing-page.berita') }}">Berita</a>
                            </li>
                            <li
                                class="{{ Route::is(['landing-page.artikel', 'landing-page.detail-artikel']) ? 'active' : '' }}">
                                <a href="{{ route('landing-page.artikel') }}">Artikel</a>
                            </li>
                            <li class="{{ Route::is('landing-page.galeri') ? 'active' : '' }}">
                                <a href="{{ route('landing-page.galeri') }}">Galeri</a>
                            </li>
                            <li class="{{ Route::is('landing-page.kontak-kami') ? 'active' : '' }}">
                                <a href="{{ route('landing-page.kontak-kami') }}">Kontak Kami</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <a href="https://wa.me/{{ $setting->number_phone }}" class="call-us d-flex align-items-center"
                            target="_blank">
                            <span class="icon-phone"></span>
                            <span>
                                {{ substr($setting->number_phone, 0, 2) == '62'
                                    ? implode('-', str_split('0' . substr($setting->number_phone, 2), 4))
                                    : $setting->number_phone }}
                            </span>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
