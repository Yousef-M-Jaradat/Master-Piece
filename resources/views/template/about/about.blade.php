@extends('template.layout.master')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('image/mas/img/pexels-singkham-1108572.jpg') }}');">        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About us</span></p>
                    <h1 class="mb-0 bread">About us</h1>
                </div>
            </div>
        </div>
    </div>


    @include('template.about.sections.video')
    @include('template.about.sections.email')
    @include('template.about.sections.result')
    @include('template.about.sections.testmony')
    @include('template.about.sections.services')


@endsection
