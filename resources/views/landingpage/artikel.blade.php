@extends('landingpage.layouts.main')
@push('style')
    <style>
        .card-img-top {
            /* Tinggi tetap */
            min-height: 200px;
            max-height: 200px;
            object-fit: cover;
            /* Gambar akan mengisi kontainer dan mempertahankan aspek rasio */
        }
    </style>
@endpush
@section('content')
    <div class="section sec-news">
        <div class="container">
            <div class="row">
                @foreach ($datas as $data)
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="card post-entry">
                            <a href="/berita/{{ $data->id }}">
                                <img src="storage/fotoartikel/{{ $data->image }}" class="card-img-top" alt="Image">
                            </a>
                            <div class="card-body">
                                <div>
                                    <span class="text-uppercase font-weight-bold date">
                                        {{ $data->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <h5 class="card-title">
                                    <a class="text-success text-decoration-none" href="">{{ $data->title }}</a>
                                </h5>
                                <p>{{ $data->description }} </p>
                                <a href="/artikel/{{ $data->id }}" class="btn btn-outline-success py-2 px-3">Read
                                    more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $datas->links('vendor.pagination.custom-landing-page') }}
        </div>
    </div>
@endsection
