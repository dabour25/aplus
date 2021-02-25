@extends('master')
@section('content')
<div class="site-section bg-light" id="section-contact">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Contact Us</h2>
                <p class="color-black-opacity-5">Happy to serve you</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mb-5">
                @if(count($errors)>0)
                    <br>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('m'))
                    <?php $a=[]; $a=session()->pull('m'); ?>
                    <div class="alert alert-{{$a[0]}}" style="width: 40%">
                        {{$a[1]}}
                    </div>
                @endif
                <form action="/contact" method="post" class="p-5 bg-white">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label class="text-black" for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="subject">Subject</label>
                            <input type="subject" id="subject" class="form-control" name="subject" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="p-4 mb-3 bg-white" style="color: #4f4f4f">
                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4"><a href="tel:{{$data[9]->content}}">{{$data[9]->content}}</a></p>
                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="mailto:{{$data[10]->content}}">{{$data[10]->content}}</a></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary" data-aos="fade">OUR Branches</h2>
            </div>
        </div>
        <div class="row">
            @foreach($branches as $k=>$branch)
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <div class="how-it-work-item">
                    <span class="number">{{$k+1}}</span>
                    <div class="how-it-work-body">
                        <h2 style="color: #0b0b0b">{{$branch->title}}</h2>
                        <p class="mb-5" style="color: #0b0b0b">
                            @if($branch->phone!='')
                            <strong>Phone:</strong><a href="tel:{{$branch->phone}}"> {{$branch->phone}}</a>
                            @endif
                            @if($branch->email!='')
                            <br>
                            <strong>Email:</strong><a href="mailto:{{$branch->email}}"> {{$branch->email}}</a>
                            @endif
                            @if($branch->address!='')
                            <br>
                            <strong>Address:</strong> {{$branch->address}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
