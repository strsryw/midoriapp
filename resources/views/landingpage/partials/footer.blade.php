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
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="widget">
                    <h3>Navigation</h3>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                    @isset($social_medias)
                        <h3>Social Media</h3>
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                        </ul>
                    @endisset
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-4 -->
        </div> <!-- /.row -->

        <div class="row mt-5">
            <div class="col-12 text-center">
                <!--
              **==========
              NOTE:
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/
              **==========
            -->

                <p>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved. &mdash; Designed with
                    love by <a href="https://untree.co">Untree.co</a> Distributed By <a
                        href="https://themewagon.com">ThemeWagon</a><!-- License information: https://untree.co/license/ -->
                </p>
            </div>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.site-footer -->
