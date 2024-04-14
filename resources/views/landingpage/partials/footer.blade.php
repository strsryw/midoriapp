<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ">
                <div class="widget">
                    <h3>About</h3>
                    {{ $setting->about }}
                </div>
                <div class="widget">
                    <address>{{ $setting->company_address }}</address>
                    <ul class="list-unstyled links">
                        <li>
                            <a href="http://wa.me/{{ $setting->number_phone }}"
                                target="_blank">{{ $setting->number_phone }}
                            </a>
                        </li>
                        <li><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Company</h3>
                    <ul class="list-unstyled float-start links">
                        <li><a href="/profil?#profil" class="fw-medium">Tentang Kami</a></li>
                        <li><a href="/?#program" class="fw-medium">Services</a></li>
                        <li><a href="/profil?#visi" class="fw-medium">Visi</a></li>
                        <li><a href="/profil?#misi" class="fw-medium">Misi</a></li>
                    </ul>
                    <ul class="list-unstyled float-start links">

                        <li><a href="#">Career</a></li>
                        <li><a href="/berita">Berita</a></li>
                        <li><a href="/artikel">Artikel</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Navigation</h3>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                    @if (!$social_medias->isEmpty())
                        <h3>Social Media</h3>
                        <ul class="list-unstyled social">
                            @foreach ($social_medias as $item)
                                <li>
                                    <a href="{{ $item->link }}" target="_blank"
                                        class="align-content-center text-center">
                                        {!! $item->class_icon !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <p>Copyright &copy; LPK Midori Gakko
                    <script>
                        document.write(new Date().getFullYear());
                    </script>.
                </p>
            </div>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.site-footer -->
