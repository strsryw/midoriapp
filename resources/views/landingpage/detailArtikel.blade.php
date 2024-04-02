@extends('landingpage.layouts.main')

@section('content')
    <div class="section sec-news">
        <div class="container">
            <div class="row">
                <article>
                    {!! $data->content !!}
                </article>
            </div>
        </div>
    </div>
@endsection
