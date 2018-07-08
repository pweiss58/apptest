<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kartenhaus @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee+Inline">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee+Outline">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bungee+Shade">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Faster+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Megrim">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pattaya">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plaster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Syncopate">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">

</head>
<body style="font-family:Roboto, sans-serif;">
<div>
    <nav class="navbar navbar-light navbar-expand-md" style="margin-top:30px;">
        <div class="container"><a class="navbar-brand" href="{{ url('/') }}"
                                  style="background-image:url(&quot;#&quot;);background-repeat:no-repeat;background-size:contain;font-family:'Bungee Outline', cursive;font-size:40px;">Kartenhaus</a>
            <button class="navbar-toggler" data-toggle="collapse"
                    data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline navbar-left" style="margin-bottom: 0;">
                    <div class="input-group"><span
                                class="d-flex justify-content-center align-items-center input-group-addon"
                                id="basic-addon1" style="height:38px;"><i class="fa fa-search"
                                                                          style="color:rgba(33,37,41,0.5);"></i></span><input
                                class="form-control" type="search"
                                placeholder="Suche" aria-describedby="basic-addon1"></div>
                </form>
                <ul class="nav navbar-nav ml-auto">
                    <li class="dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                            aria-expanded="false" href="#" style="color:rgba(0,0,0,0.5);">Events</a>
                        <div class="dropdown-menu" role="menu">

                            <?php

                            $categories = DB::table('categories')->get();

                            ?>

                            @foreach($categories as $category)
                                <a class="dropdown-item" role="presentation" href="/category/{{ $category->name }}"
                                   style="color:rgba(0,0,0,0.5);">{{ $category->name }}</a>
                            @endforeach

                        </div>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                            aria-expanded="false" href="#" style="color:rgba(0,0,0,0.5);">Orte</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#"
                                                                  style="color:rgba(0,0,0,0.5);">Berlin</a><a
                                    class="dropdown-item" role="presentation" href="#" style="color:rgba(0,0,0,0.5);">München</a><a
                                    class="dropdown-item" role="presentation"
                                    href="#" style="color:rgba(0,0,0,0.5);">Hamburg</a></div>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item" role="presentation"><a class="nav-link active d-flex"
                                                                    href="{{ url('/profile') }}"
                                                                    style="color:rgba(0,0,0,0.5);">Profile</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link active d-flex"
                                                                    href="{{ url('/logout') }}"
                                                                    style="color:rgba(0,0,0,0.5);">Logout</a></li>

                    @else

                        <li class="nav-item" role="presentation"><a class="nav-link active d-flex"
                                                                    href="{{ url('/login') }}"
                                                                    style="color:rgba(0,0,0,0.5);">Login</a></li>

                    @endif
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('/cart') }}"
                                                                style="color:rgba(0,0,0,0.5);">Warenkorb</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

@yield('content')

<div class="footer-basic">
    <footer>
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i
                        class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a
                    href="#"><i class="icon ion-social-facebook" ></i></a></div>
        <ul
                class="list-inline">
            <li class="list-inline-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="{{ url('/contact') }}">Kontakt</a></li>
            <li class="list-inline-item"><a href="#">AGBs</a></li>
            <li class="list-inline-item"><a href="{{ url('/privacy') }}">Datenschutz</a></li>
        </ul>
        <p class="copyright">Ticket Hall © 2018</p>
    </footer><!-- Return to Top -->
    <a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>
</div>

</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="{{ asset('js/script.min.js') }}"></script>

</body>
</html>
