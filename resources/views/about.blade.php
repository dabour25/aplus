@extends('master')
@section('content')
    <div class="site-section" id="section-about" style="background-color: #f6f6f6">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="images/img_3.jpg" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-6 order-md-1" data-aos="fade-up">
                    <div class="text-left pb-1 border-primary mb-4">
                        <h2 class="text-primary">About Us</h2>
                    </div>
                    <p style="color: #eb3e30"><strong>Mission:</strong></p>
                    <p style="color: #0b0b0b;padding-left: 10px;">{{$data[7]->content}}</p>
                    <p style="color: #eb3e30"><strong>Vision:</strong></p>
                    <p style="color: #0b0b0b;padding-left: 10px;">{{$data[8]->content}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section border-bottom" id="section-our-team" style="background-color: #e8e8e8">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary" data-aos="fade">Our Team</h2>
                </div>
            </div>
            <div class="row">
                @foreach($team as $t)
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                    <div class="person" style="color: #0b0b0b">
                        <img src="{{asset('/images/team').'/'.$t->image}}" alt="Image" class="img-fluid rounded mb-5 w-75 rounded-circle">
                        <h3>{{$t->name}}</h3>
                        <p class="position">{{$t->role}}</p>
                        <p class="mb-4">{{$t->description}}</p>
                        <ul class="ul-social-circle">
                            @if($t->face_book)
                            <li><a href="{{$t->face_book}}" target="_blank"><span class="icon-facebook"></span></a></li>
                            @endif
                            @if($t->twitter)
                                <li><a href="{{$t->twitter}}" target="_blank"><span class="icon-twitter"></span></a></li>
                            @endif
                            @if($t->linked_in)
                                <li><a href="{{$t->linked_in}}" target="_blank"><span class="icon-linkedin"></span></a></li>
                            @endif
                            @if($t->instagram)
                                <li><a href="{{$t->instagram}}" target="_blank"><span class="icon-instagram"></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
