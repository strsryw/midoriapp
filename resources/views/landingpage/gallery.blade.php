@extends('landingpage.layouts.main')
@push('style')
    <style>
        .card-img-top {
            /* Tinggi tetap */
            max-height: 200px;
            object-fit: cover;
            /* Gambar akan mengisi kontainer dan mempertahankan aspek rasio */
        }
    </style>
@endpush
@push('script')
    <script>
        $(document).ready(function() {

        })
    </script>
@endpush
@section('content')
    <div class="section sec-news">
        <div class="container">
            <div class="row">
                @foreach ($gallery as $data)
                    <div class="col-lg-3 mb-4">
                        <div class="card post-entry">
                            {{-- <img src="/storage/fotogallery/{{ $data->image }}" class="card-img-top glightbox" alt="Image">
                             --}}
                            <a href="/storage/fotogallery/{{ $data->image }}" class="glightbox">
                                <img src="/storage/fotogallery/{{ $data->image }}" alt="image" class="card-img-top" />
                            </a>
                            <div class="card-body
                                    p-2">
                                <div><span
                                        class="text-uppercase font-weight-bold date">{{ date('d M Y', strtotime($data->created_at)) }}
                                    </span>
                                </div>
                                <h5 class="card-title">
                                    <p class="text-success">{{ $data->title }}</p>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
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
