@extends('landingpage.layouts.main')

@section('title', $data->title . ' - ')

@push('style')
    <style>
        img {
            max-height: 400px;
            display: block;
            width: 100%;
        }

        .bungkus {
            position: relative;
        }

        #overlay {
            position: absolute;
            right: 12px;
            bottom: 0;
            padding: 8px 15px;
            border-radius: 3px;
            background-color: #198754;

        }
    </style>
@endpush
@section('content')
    <div class="section">
        <div class="container article">
            <div class="row justify-content-center align-items-stretch">

                <article class="col-lg-8 order-lg-2 px-lg-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 bungkus">
                            <img src="/storage/fotoberita/{{ $data->image }}" class="img-fluid rounded" alt="Image">
                            <div id="overlay">
                                <a class="text-white">{{ date('d - m - Y', strtotime($data->created_at)) }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg">
                            {!! $data->description !!}
                        </div>
                    </div>
                    <div class="post-single-navigation d-flex align-items-stretch mt-5">
                        @if ($prev)
                            <a href="/berita/{{ $prev->id }}" class="mr-auto w-50 pr-4 text-success">
                                <span class="d-block fw-bold text-success">Previous Post</span>
                                {{ $prev->title }}
                            </a>
                        @endif
                        @if ($next)
                            <a href="/berita/{{ $next->id }}" class="ml-auto w-50 text-right pl-4 text-success">
                                <span class="d-block fw-bold text-success">Next Post</span>
                                {{ $next->title }}
                            </a>
                        @endif

                    </div>
                </article>
                <div class="col-md-12 col-lg-1 order-lg-1">
                    <div class="share sticky-top">
                        <h3>Share</h3>
                        <ul class="list-unstyled share-article">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
