@extends('landingpage.layouts.main')
@push('style')
    <style>
        .card-img-top {
            /* Tinggi tetap */
            min-height: 250px;
            max-height: 250px;
            object-fit: cover;
            /* Gambar akan mengisi kontainer dan mempertahankan aspek rasio */
        }

        .card-description {
            min-height: 70px;
            max-height: 70px;
        }

        .card-description p {
            line-height: 28px;
            letter-spacing: 1px;

        }
    </style>
@endpush
@section('content')
    <div class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <img src="/assets/web/img/work.jpg" alt="Image" class="img-fluid rounded
                ">
                </div>
                <div class="col-lg-4 ps-lg-2">
                    <div class="mb-5">
                        <h2 class="text-black h4">Kenapa Harus LPK Midori Gakkou ?</h2>
                        <p style="text-align: justify">Di LPK kami, kami menawarkan pelatihan bahasa Jepang yang mendalam
                            dan terfokus untuk membantu
                            Anda mencapai tujuan karir Anda. Berikut adalah beberapa alasan mengapa kami adalah pilihan
                            terbaik:</p>
                    </div>
                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-wallet-fill text-success me-4"></span>
                        </div>
                        <div>
                            <h3>Kurikulum Terstuktur</h3>
                            <p style="text-align: justify">Kami memiliki kurikulum terstruktur yang dirancang untuk
                                memaksimalkan pemahaman Anda tentang
                                bahasa Jepang, dari tingkat pemula hingga mahir.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-pie-chart-fill text-success me-4"></span>
                        </div>
                        <div>
                            <h3>Kesempatan Kerja</h3>
                            <p style="text-align: justify">Kami memiliki jaringan luas dengan perusahaan-perusahaan Jepang
                                di berbagai industri,
                                memberikan Anda kesempatan untuk mencari pekerjaan yang sesuai setelah menyelesaikan
                                pelatihan.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-chat-text-fill text-success me-4"></span>
                        </div>
                        <div>
                            <h3>Pengajar Professional</h3>
                            <p style="text-align: justify">Pengajar kami adalah para ahli dalam bahasa Jepang dengan
                                pengalaman luas dalam mengajar dan
                                memberdayakan para siswa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section bg-light" id="program">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-lg-2 mb-4 mb-lg-0">
                    <img src="/assets/web/img/school.jpg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5 pe-lg-5">
                    <div class="mb-5">
                        <h2 class="text-black h4">Program LPK Midori Gakkou</h2>
                    </div>
                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi- text-success me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                    <path d="M12 12l0 .01" />
                                    <path d="M3 13a20 20 0 0 0 18 0" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <h3>Kursus Bahasa Jepang</h3>
                            <p>Dari dasar hingga tingkat lanjutan, kami menawarkan kursus yang sesuai dengan kebutuhan dan
                                tingkat kemampuan Anda.</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi- text-success me-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-messages">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                                    <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <h3>Kelas Konversasi</h3>
                            <p>Belajarlah berbicara bahasa Jepang secara lancar melalui kelas konversasi interaktif kami.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi- text-success me-4"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-vocabulary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10 19h-6a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1h6a2 2 0 0 1 2 2a2 2 0 0 1 2 -2h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2z" />
                                    <path d="M12 5v16" />
                                    <path d="M7 7h1" />
                                    <path d="M7 11h1" />
                                    <path d="M16 7h1" />
                                    <path d="M16 11h1" />
                                    <path d="M16 15h1" />
                                </svg></span>
                        </div>
                        <div>
                            <h3>Persiapan Ujian</h3>
                            <p>Kami membantu Anda mempersiapkan diri untuk ujian sertifikasi bahasa Jepang yang diakui
                                secara internasional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section sec-services">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                    <h2 class="heading text-success">Goes to Japan</h2>
                    <p>Alur Pengiriman Trainee Praktek Kerja Indonesia</p>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="service text-center">
                        <img src="/assets/web/img/contract.png" class="img-fluid" style="max-width: 100px;" alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 1</span>
                            <h3>Informasi Penerimaan Perusahaan</h3>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="service text-center">
                        <img src="/assets/web/img/job-interview1.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 2</span>
                            <h3>Wawancara Lembaga Pelatihan (LPK)</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="service text-center">
                        <img src="/assets/web/img/medical-history.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 3</span>
                            <h3 style="height:43.19px;">Pramedical</h3>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">

                    <div class="service text-center">
                        <img src="/assets/web/img/job-interview2.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 4</span>
                            <h3 style="height:43.19px;">Wawancara Perusahaan Jepang</h3>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="service text-center">
                        <img src="/assets/web/img/x-rays.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 5</span>
                            <h3 style="height:43.19px;">Medical Check Up</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <img src="/assets/web/img/documentation.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 6</span>
                            <h3 style="height:43.19px;">Pengumpulan Dokumen</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <img src="/assets/web/img/passport.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 7</span>
                            <h3 style="height:43.19px;">Pembuatan Passport</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <img src="/assets/web/img/studying.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 8</span>
                            <h3 style="height:43.19px;">Pelatihan Bahasa & Kebudayaan Jepang</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <img src="/assets/web/img/competence.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 9</span>
                            <h3 style="height:43.19px;">Pembuatan Eligibility</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <img src="/assets/web/img/travel.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 10</span>
                            <h3 style="height:43.19px;">Pembuatan Visa</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service text-center">
                        <img src="/assets/web/img/travelling.png" class="img-fluid" style="max-width: 100px;"
                            alt="">
                        <div>
                            <span class="badge bg-success mb-3">Tahap 11</span>
                            <h3 style="height:43.19px;">Berangkat ke Jepang</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section sec-cta overlay">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading">Hubungi Kami Sekarang!</h2>
                    <p>Jika ada pertanyaan, jangan ragu untuk menghubungi
                        kami</p>
                </div>
                <div class="col-lg-5 text-end" data-aos="fade-up" data-aos-delay="100">
                    <a href="/kontakkami" class="btn btn-outline-green-reverse">Contact us</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section sec-news">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-7">
                    <h2 class="heading text-success">Latest News</h2>
                </div>
            </div>

            <div class="row">
                @isset($datas)
                    @foreach ($datas as $data)
                        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="card post-entry">
                                <a href="/berita/{{ $data->id }}">
                                    <img src="/storage/fotoberita/{{ $data->image }}" class="card-img-top" alt="Image">
                                </a>
                                <div class="card-body">
                                    <div>
                                        <span class="text-uppercase font-weight-bold date">
                                            {{ $data->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <h5 class="card-title mb-3">
                                        <a class="text-success text-decoration-none" title="{{ $data->title }}"
                                            href="/berita/{{ $data->id }}">{{ strlen($data->title) > 26 ? substr($data->title, 0, 26) . '...' : $data->title }}</a>
                                    </h5>
                                    <div class="card-description mb-5">
                                        <p>
                                            {{ App\Helpers\HtmlHelper::strip_tags_and_style($data->description) }}
                                        </p>
                                    </div>
                                    <a href="/berita/{{ $data->id }}" class="btn btn-outline-success py-2 px-3">Read
                                        more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .horizontal-timeline .items {
            border-top: 3px solid #e9ecef;
        }

        .horizontal-timeline .items .items-list {
            display: block;
            position: relative;
            text-align: center;
            padding-top: 70px;
            margin-right: 0;
        }

        .horizontal-timeline .items .items-list:before {
            content: "";
            position: absolute;
            height: 36px;
            border-right: 2px dashed #dee2e6;
            top: 0;
        }

        .horizontal-timeline .items .items-list .event-date {
            position: absolute;
            top: 36px;
            left: 0;
            right: 0;
            width: 75px;
            margin: 0 auto;
            font-size: 0.9rem;
            padding-top: 8px;
        }

        @media (min-width: 1140px) {
            .horizontal-timeline .items .items-list {
                display: inline-block;
                width: 24%;
                padding-top: 45px;
            }

            .horizontal-timeline .items .items-list .event-date {
                top: -40px;
            }
        }
    </style>
@endpush
