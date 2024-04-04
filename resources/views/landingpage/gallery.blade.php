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
    <div class="section sec-news" id="sec-news">
        <div class="container">
            <div class="row">
                @foreach ($datas as $data)
                    <div class="col-lg-3 mb-4">
                        <div class="card post-entry">
                            <a href="/storage/fotogallery/{{ $data->image }}" class="glightbox">
                                <img src="/storage/fotogallery/{{ $data->image }}" alt="image" class="card-img-top" />
                            </a>
                            <div class="card-body pb-0 pt-4">
                                <span class="text-uppercase font-weight-bold date">
                                    {{ date('M d, Y', strtotime($data->created_at)) }}
                                </span>
                                <h5 class="card-title">
                                    <p class="text-success" title="{{ $data->title }}">
                                        {{ strlen($data->title) > 30 ? substr($data->title, 0, 30) . '...' : $data->title }}
                                    </p>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $datas->links('vendor.pagination.custom-landing-page') }}
        </div>
    </div>
@endsection
