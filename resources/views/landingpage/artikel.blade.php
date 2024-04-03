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

        .card-title {
            min-height: 30px;
            max-height: 30px;
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
                            <a href="/artikel/{{ $data->id }}">
                                <img src="storage/fotoartikel/{{ $data->image }}" class="card-img-top" alt="Image">
                            </a>
                            <div class="card-body">
                                <div>
                                    <span class="text-uppercase font-weight-bold date">
                                        {{ $data->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <h5 class="card-title">
                                    <a class="text-success text-decoration-none"
                                        href="">{{ strlen($data->description) > 100 ? substr($data->title, 0, 50) . '...' : $data->title }}</a>
                                </h5>
                                <p>{{ strlen($data->description) > 100 ? substr($data->description, 0, 100) . '...' : $data->description }}
                                </p>
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
