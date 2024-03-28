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
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="/" class="logo m-0 float-start">MIDORI LPK</a>
                    </div>
                    <div class="col-8 text-center ">
                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="{{ $hero == 'index' ? 'active' : '' }}"><a href="/">Home</a></li>
                            <li class="has-children">
                                <a>Profil</a>
                                <ul class="dropdown">
                                    <li><a href="/profil">Profil LPK</a></li>
                                    <li><a href="/struktur">Struktur Organisasi</a></li>
                                    <li><a href="/sejarah">Sejarah</a></li>
                                    <li><a href="/visimisi">Visi & Misi</a></li>
                                </ul>
                            </li>
                            <li><a href="/berita">Berita</a></li>
                            <li><a href="/artikel">Artikel</a></li>
                            <li class="{{ $hero == 'gallery' ? 'active' : '' }}"><a href="/gallery">Galeri</a></li>
                            {{-- <li class="{{ $hero == 'About Us' ? 'active' : '' }}"><a href="/about">About</a></li> --}}
                            <li><a href="/kontak">Kontak Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>

                        <a href="#" class="call-us d-flex align-items-center">
                            <span class="icon-phone"></span>
                            <span>123-489-9381</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
