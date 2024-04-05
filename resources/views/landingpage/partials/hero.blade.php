<div class="hero overlay inner-page">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-8">
                @isset($date)
                    <p data-aos="fade-up" class="meta aos-init aos-animate text-center">
                        <a href="#">{{ $date }}</a>
                    </p>
                @endisset
                <h1 class="heading text-white mb-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    {{ $hero }}
                </h1>
            </div>
        </div>
    </div>
</div>
