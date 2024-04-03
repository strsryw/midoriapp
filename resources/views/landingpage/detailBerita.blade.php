@extends('landingpage.layouts.main')

@push('style')
    <style>
        p {
            text-align: justify;
        }

        img {
            max-height: 400px;
        }
    </style>
@endpush
@section('content')
    <div class="section">
        <div class="container article">
            <div class="row justify-content-center align-items-stretch">

                <article class="col-lg-8 order-lg-2 px-lg-5">
                    <div class="text-center">
                        <img src="/storage/fotoberita/{{ $data->image }}" class="img-fluid" alt="Image">
                    </div>
                    {!! $data->description !!}


                    <div class="post-single-navigation d-flex align-items-stretch">
                        <a href="#" class="mr-auto w-50 pr-4">
                            <span class="d-block">Previous Post</span>
                            A Mounteering Guide For Beginners
                        </a>
                        <a href="#" class="ml-auto w-50 text-right pl-4">
                            <span class="d-block">Next Post</span>
                            12 Creative Designers Share Ideas About Web Design
                        </a>
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
