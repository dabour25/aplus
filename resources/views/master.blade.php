<!DOCTYPE html>
<html lang="en">
<head>
    <title>A PLUS | {{$page}}</title>
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
    <link rel="stylesheet" href="{{asset('css/sitecss/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/sitecss/mainstyle.css')}}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar" style="{{$page=='HOME'?'':'background-color:#191919;'}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-11 col-xl-2 site-logo">
                <h1 class="mb-0">
                    <a href="/" class="text-white h2 mb-0">
                        <img src="{{asset('images/logo.png')}}" width="60px" alt="logo" style="padding: 10px;">
                    </a>
                </h1>
            </div>
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li><a href="/" class="nav-link">Home</a></li>
                        {{--<li class="has-children">--}}
                            {{--<a href="/about" class="nav-link">About Us</a>--}}
                            {{--<ul class="dropdown">--}}
                                {{--<li><a href="/price" class="nav-link">Price List</a></li>--}}
                                {{--<li><a href="#section-our-team" class="nav-link">Our Team</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        <li><a href="/about" class="nav-link">About Us</a></li>
                        <li><a href="/price" class="nav-link">Price List</a></li>
                        <li><a href="/contact" class="nav-link">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
        </div>
    </div>
    </div>
</header>
@yield('content')
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 mr-auto">
                        <h2 class="footer-heading mb-4">About Us</h2>
                        <p style="width: 80%">{{$data[6]->content}}</p>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/price">Price List</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <a href="{{$data[2]->content}}" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="{{$data[3]->content}}" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="{{$data[4]->content}}" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="{{$data[5]->content}}" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        <img src="{{asset('images/logo.png')}}" alt="logo" width="100px" style="padding: 15px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>

                        Copyright &copy;{{date('Y')}} All rights reserved | <a href="/">A Plus</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('js/sitejs/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/sitejs/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/sitejs/jquery-ui.js')}}"></script>
<script src="{{asset('js/sitejs/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/sitejs/popper.min.js')}}"></script>
<script src="{{asset('js/sitejs/bootstrap.min.js')}}"></script>
<script src="{{asset('js/sitejs/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/sitejs/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/sitejs/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/sitejs/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/sitejs/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/sitejs/aos.js')}}"></script>
<script src="{{asset('js/sitejs/main.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
