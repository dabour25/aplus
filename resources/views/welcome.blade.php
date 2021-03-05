@extends('master')
@section('content')
<div class="site-blocks-cover overlay" style="background-image: url({{asset('images/hero_bg_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light text-uppercase font-weight-bold" data-aos="fade-up">{{$data[1]->content}}</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">A Plus</p>
                <p data-aos="fade-up" data-aos-delay="200"><a href="#section-services" class="btn btn-primary py-3 px-5 text-white">Get Started!</a></p>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light" id="section-services">
    <div class="container">
        <div class="row justify-content-center mb-5" data-aos="fade-up">
            <div class="col-md-7 text-center border-primary">
                <h2 class="mb-0 text-primary">Our Services</h2>
                <p class="color-black-opacity-5">Fill the form to get our services.</p>
            </div>
        </div>
        <iframe src="{{$data[0]->content}}" title="googleform" class="iframe-main"></iframe>
    </div>
</div>
@stop
