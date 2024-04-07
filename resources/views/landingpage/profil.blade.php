@extends('landingpage.index')
@push('style')
    <style>
        p {
            line-height: 28px;
            letter-spacing: 1px;
        }

        .visimisi li {
            line-height: 28px;
            letter-spacing: 1px;
        }
    </style>
@endpush
@section('content')
    <div class="section profil" id="profil" style="padding-top:120px;padding-bottom:120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <img src="/assets/web/img/lpk.jpeg" alt="" class="img-fluid" style="border-radius: 0.5rem;">
                </div>
                <div class="col-lg-5">
                    <p><span class="fw-bold mb-3 text-success fs-2">Apa itu LPK Midori Gakkou ?</span>
                    <p style="text-align: justify;">
                        <span class="fw-bold">LPK. Midori Gakkou</span> adalah
                        Lembaga
                        Pendidikan
                        Bahasa Jepang
                        sekaligus
                        lembaga pembimbingan dan
                        pendampingan
                        untuk Program Pemagangan ke Jepang yang berdiri sejak Tahun 2018 di Kab.Pati – Jawa Tengah dengan
                        Pemimpin
                        Bapak suwardi dan sudah memiliki izin dari BINA LATTAS sebagai Lembaga Pengirim atau Sending
                        Organization
                        (SO) sejak Tahun 2019, yang berarti kami sudah mendapat kepercayaan dari Pemerintah Daerah
                        dan Pusat
                        untuk
                        melaksanakan program pemagangan ke Jepang.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section sejarah bg-light" style="padding-top: 120px; padding-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12">
                    <h2 class="text-center text-success fs-2 fw-bold mb-3">SEJARAH</h2>
                    <p style="text-align:justify;">Perjalanan MIDORI GAKKOU dimulai pada
                        tahun
                        2015. Presiden
                        Suwardi, yang kembali ke Indonesia setelah
                        bekerja selama 15 tahun, menyadari bahwa meskipun banyak perusahaan di Jepang yang kekurangan tenaga
                        kerja,
                        terdapat banyak situasi di negara asalnya, Indonesia, yang sulit mendapatkan pekerjaan karena
                        keterbatasan
                        perusahaan. jumlah lowongan pekerjaan.. </p>
                    <p style="text-align:justify;">
                        Jadi presiden memutuskan untuk mendirikan lembaga pelatihan
                        kejuruan bagi orang-orang yang tidak bisa bekerja. Butuh waktu sekitar tiga tahun bagi saya
                        untuk mewujudkan mimpi itu. Dengan pengalaman tinggal di Jepang selama 15 tahun dan pengalaman
                        kerja, serta dukungan teman-teman, kami mendapat izin dari pemerintah, dan LPK MIDORI GAKKOU resmi
                        berdiri pada tahun 2019.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section
                        organisasi " style="padding-top: 120px; padding-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-sm-12">
                    <h2 class="text-center text-success fs-2 fw-bold mb-3">STRUKTUR ORGANISASI</h2>
                    <img src="/assets/web/img/struktur.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>


    <div class="section visimisi bg-light" id="visi" style="padding-top: 120px; padding-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12">
                    <h2 class="text-center text-success fs-2 fw-bold mb-3">VISI</h2>
                    <p class="text-center" style="">Mewujudkan sumber daya manusia yang
                        berkualitas berlandasan
                        iman dan takwa sehingga
                        dapat memberikan
                        manfaat bagi masyarakat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section visimisi" id="misi" style="padding-top: 120px; padding-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12">
                    <h2 class="text-center text-success fs-2 fw-bold mb-3">MISI</h2>
                    <ul class="text-center" style="list-style:none;padding-left:0;">
                        <li>
                            Melaksanakan pendidikan dan pelatihan yang bermanfaat bagi masyarakat.
                        </li>
                        <li>Turut berperan aktif dalam membantu pemerintah dalam mengatasi pengangguran dengan memberikan
                            informasi
                            dan perekrutan program magang ke jepang.</li>

                        <li>Membekali peserta didik agar memiliki kepribadian yang mandiri, bermoral, dan berakhlak.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
