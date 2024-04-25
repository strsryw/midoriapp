<div class="hero overlay inner-page"
    style='position: relative; /* Untuk memungkinkan penempatan absolut */
           background: -webkit-linear-gradient(302deg, #73cd79 0%, #026f48 100%);
           background: -o-linear-gradient(310deg, #306ee8 0%, #3038e8 100%);
           background: linear-gradient(180deg, #84f18b 0%, #026f48 100%);
           background-image: url("{{ asset("assets/web/img/background/$background") }}");
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;
           overflow: hidden;'>
    <div
        style='position: absolute; 
             top: 0; 
             left: 0; 
             width: 100%; 
             height: 100%; 
             background-color: rgba(115, 205, 121, 0.7);
             z-index: 1;
             pointer-events: none;'>
    </div>
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
