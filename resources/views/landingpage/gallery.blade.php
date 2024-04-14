@extends('landingpage.layouts.main')
@section('title', 'Galeri - ')
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
                @if ($datas->isEmpty())
                    <div class="text-center">
                        <img src="{{ asset('assets/web/img/no-content.png') }}" alt="" class="mb-3"
                            style="max-width: 200px">
                        <h1 class="fw-bold">Tidak Ada Gambar</h1>
                    </div>
                @else
                    @foreach ($datas as $data)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-sm mb-3">
                                <a href="{{ asset('storage/foto_gallery/' . $data->image) }}" class="d-block glightbox">
                                    <img src="{{ asset('storage/foto_gallery/' . $data->image) }}" alt="image"
                                        class="card-img-top" />
                                </a>
                                <div class="card-body px-2 py-4">
                                    <div class="d-flex align-items-center">
                                        <div class="mx-3">
                                            <div class="fw-bold">
                                                {{ strlen($data->title) > 25 ? substr($data->title, 0, 25) . '...' : $data->title }}
                                            </div>
                                            <div class="text-secondary">{{ $data->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{ $datas->links('vendor.pagination.custom-landing-page') }}
            </div>
        </div>
    </div>
@endsection
