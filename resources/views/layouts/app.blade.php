<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <livewire:scripts/>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

    <!-- Anti Scrollbar Horizontal -->
    <style>
      /* script menghilangkan Horizontal Scroll */
      html, body {
      max-width: 100%;
      overflow-x: hidden;
      scroll-behavior: smooth;
      }

      .paragraph {
      width: 150%;


      }
</style>
</head>
<body id="home">
    <div id="app" style="">
        <nav class="navbar navbar-expand-md navbar-dark  shadow-sm fixed-top shadow p-3 mb-5  rounded tab-pane fade show active" style="background-color: #1fc7ff;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ url('') }}">{{ ('Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#search"><i class="fa fa-search"></i> {{ ('Search') }}</a>
                                </li>
                        @if(Auth::user())
                          @if(Auth::user()->level == 0)
                                <li class="nav-item">
                                    <a class="btn btn-warning btn-block shadow rounded-pill text-white" href="{{ url('BelanjaUser') }}"><i class="fa fa-shopping-cart"></i> {{ ('Belanja Anda') }}</a>
                                </li>
                          @endif
                        @endif
                        @if(Auth::user())
                          @if(Auth::user()->level == 1)
                          <div class="">
                                <a href="{{url('TambahProduk/')}}" class="btn btn-warning btn-block shadow rounded-pill" style="color: white;">Admin Panel</a>
                          </div>
                          @endif
                        @endif
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item text-white">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0052d6" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,197.3C384,213,480,203,576,213.3C672,224,768,256,864,245.3C960,235,1056,181,1152,149.3C1248,117,1344,107,1392,101.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <!-- Start Footer Area -->
    <footer class="footer pt-5" style="background-color: #0052d6">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.html"></a>
                            </div>
                            
                            <p class="text"></p>
                            <p class="call text-white">Got Question? Call us 24/7<span><a href="tel:123456789"></a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links text-white">
                            <h4>Informations</h4>
                            <ul>
                                <p class="text-white">About Us</p>
                                <p class="text-white">Faq</p>
                                <p class="text-white">Terms & Conditions</p>
                                <p class="text-white">Contact Us</p>
                                <p class="text-white">Help</p>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="">
                            <h4 class="text-white">Services</h4>
                            <ul>
                                <p class="text-white">Payment Methods</p>
                                <p class="text-white">Money-back</p>
                                <p class="text-white">Returns</p>
                                <p class="text-white">Shipping</p>
                                <p class="text-white">Privacy Policy</p>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4 class="text-white"></h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <div class=""></div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p class="text-white">Copyright © {{date('Y')}} BeliOnline.  -  All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
 
</html>
