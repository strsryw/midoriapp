@extends('landingpage.index')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.976119273268!2d110.46051716226974!3d-7.039340029305968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708dba152b3919%3A0x1688a5a92fb80d1f!2sGardenia%20Swimming%20Pool!5e0!3m2!1sid!2sid!4v1712038873626!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                            <p>43 Raymouth Rd. Baltemoer,<br> London 3910</p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="text-white icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Sunday-Friday:<br>
                                11:00 AM - 2300 PM
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="text-white icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>info@Untree.co</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="text-white icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>+1 1234 55488 55</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="#">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>

                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection