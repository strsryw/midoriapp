@extends('landingpage.layouts.main')
@push('style')
    <style>
        .card-img-top {
            width: 413px;
            /* Lebar tetap */
            height: 313px;
            /* Tinggi tetap */
            object-fit: cover;
            /* Gambar akan mengisi kontainer dan mempertahankan aspek rasio */
        }
    </style>
@endpush
@section('content')
    <div class="section sec-news">
        <div class="container">
            <div class="row">
                @foreach ($gallery as $data)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="card post-entry">
                            <img src="storage/fotogallery/{{ $data->image }}" class="card-img-top" alt="Image">
                            <div class="card-body">
                                <div><span
                                        class="text-uppercase font-weight-bold date">{{ $data->created_at->format('Y-m-d') }}</span>
                                </div>
                                <h5 class="card-title"><a href="single.html">{{ $data->title }}</a></h5>
                                <p>{{ $data->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card post-entry">
                    <a href="single.html"><img src="/assets/images/img-2.jpg" class="card-img-top" alt="Image"></a>
                    <div class="card-body">
                        <div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
                        <h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the
                            blind texts. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card post-entry">
                    <a href="single.html"><img src="/assets/images/img-3.jpg" class="card-img-top" alt="Image"></a>
                    <div class="card-body">
                        <div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
                        <h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the
                            blind texts. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card post-entry">
                    <a href="single.html"><img src="/assets/images/img-1.jpg" class="card-img-top" alt="Image"></a>
                    <div class="card-body">
                        <div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
                        <h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the
                            blind texts. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card post-entry">
                    <a href="single.html"><img src="/assets/images/img-2.jpg" class="card-img-top" alt="Image"></a>
                    <div class="card-body">
                        <div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
                        <h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the
                            blind texts. </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card post-entry">
                    <a href="single.html"><img src="/assets/images/img-3.jpg" class="card-img-top" alt="Image"></a>
                    <div class="card-body">
                        <div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
                        <h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the
                            blind texts. </p>
                    </div>
                </div>
            </div> --}}

            </div>

            <div class="d-flex justify-content-center">
                {{-- <div class="col-lg-12 text-center py-5">
                <div class="custom-navigation">

                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <span>...</span>
                    <a href="#">5</a>
                    </nav>
                </div>
            </div> --}}
                {{ $gallery->links() }}
            </div>
        </div>
    </div>
@endsection
