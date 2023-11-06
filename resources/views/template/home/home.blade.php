@extends('template.layout.master')
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item"
                style="background-image: url({{ asset('image/mas/img/pexels-serena-koi-12297509.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">Gardening adds years to your life and <br> life to your years </h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="shop.html" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="slider-item"
                style="background-image: url({{ asset('image/mas/img/timothe-durand-UrYMr9-1ZtQ-unsplash.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">A single seed can be the beginning of an<br>entire botanical adventure.
                            </h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="shop.html" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('template.home.sections.services')
    @include('template.home.sections.category')
    @include('template.home.sections.products')
    @include('template.home.sections.deal')
@endsection
