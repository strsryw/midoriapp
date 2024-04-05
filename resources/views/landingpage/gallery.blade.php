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
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-sm mb-3">
                            <a href="/storage/fotogallery/{{ $data->image }}" class="d-block glightbox">
                                <img src="/storage/fotogallery/{{ $data->image }}" alt="image" class="card-img-top" />
                            </a>
                            <div class="card-body px-2 py-4">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 rounded"
                                        style="background-image: url(./static/avatars/000m.jpg)"></span>
                                    <div>
                                        <div class="fw-bold">
                                            {{ strlen($data->title) > 25 ? substr($data->title, 0, 25) . '...' : $data->title }}
                                        </div>
                                        <div class="text-secondary">{{ $data->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="#" class="text-secondary">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path
                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                </path>
                                            </svg>
                                            467
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $datas->links('vendor.pagination.custom-landing-page') }}
        </div>
    </div>
@endsection
