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
    <div class="section sec-news">
        <div class="container">
            <div class="row">
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
            </div>

            {{ $datas->links('vendor.pagination.custom-landing-page') }}
        </div>
    </div>
@endsection
