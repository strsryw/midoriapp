@extends('landingpage.layouts.main')
@section('title', 'Kontak Kami - ')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                {!! $setting->google_maps !!}
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">

                        <div class="address mt-2">
                            <i class="text-white icon-room"></i>
                            <h4 class="mb-2">Location:</h4>
                            <p>{{ $setting->company_address }}</p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="text-white icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Senin - Sabtu<br>
                                09:00 - 17:00
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="text-white icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>{{ $setting->email }}</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="text-white icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>
                                {{ substr($setting->number_phone, 0, 2) == '62' ? '0' . substr($setting->number_phone, 2) : $setting->number_phone }}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200" id="kontakkami">
                    <form action="#">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" id="nama" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" id="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" id="subjek" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="" id="pesan" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <input type="button" value="Send Message" class="btn btn-success" onclick="sendMessage();">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

        })

        function sendMessage() {
            var nama = $('#nama').val();
            var email = $('#email').val();
            var subjek = $('#subjek').val();
            var pesan = $('#pesan').val();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                url: "{{ route('landing-page.kontak-kami') }}",
                type: 'POST',
                data: {
                    nama,
                    email,
                    subjek,
                    pesan,
                    _token: csrfToken
                },
                success: function(response) {
                    $('#nama').val('');
                    $('#email').val('');
                    $('#subjek').val('');
                    $('#pesan').val('');
                    if (response.status) {
                        Swal.fire({
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: response.message,
                            timer: 1500
                        });
                    }
                }
            })
        }
    </script>
@endpush
