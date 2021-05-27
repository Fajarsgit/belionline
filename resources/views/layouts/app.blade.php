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
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#news">{{ ('Healthy Trends') }}</a>
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
    <!-- Start Footer Area -->
    <footer class="footer mt-5 pt-5" style="background-color: #ffff">
        <!-- Footer Top -->
        <div class="footer-top section mt-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="index.html"></a>
                            </div>
                            
                            <p class="text"></p>
                            <p class="call shadow" style="color: #1fc7ff">Got Question? Call us 24/7<span><a href="tel:123456789"></a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer ml-5" style="color: #1fc7ff">
                            <h4 class="shadow">Informations</h4>
                            <ul>
                                <p class="" style="color: #1fc7ff">About Us</p>
                                <p class="" style="color: #1fc7ff">Faq</p>
                                <p class="" style="color: #1fc7ff">Terms & Conditions</p>
                                <p class="" style="color: #1fc7ff">Contact Us</p>
                                <p class="" style="color: #1fc7ff" >Help</p>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="ml-5">
                            <h4 class="shadow" style="color: #1fc7ff">Services</h4>
                            <ul>
                                <p class="" style="color: #1fc7ff">Payment Methods</p>
                                <p class="" style="color: #1fc7ff">Money-back</p>
                                <p class="" style="color: #1fc7ff">Returns</p>
                                <p class="" style="color: #1fc7ff">Shipping</p>
                                <p class="" style="color: #1fc7ff">Privacy Policy</p>
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
                        <div class="col-lg-6 col-12 mb-2">
                            <div class="center">
                                <p class="text-center shadow" style="color: #1fc7ff">Copyright © {{date('Y')}} BeliOnline.  -  All Rights Reserved.</p>
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
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>
@livewireScripts
<script>
    window.livewire.on('updatedData',()=>{
            $('#updateModal').modal('hide');
    })
</script>
<script>window.addEventListener(show.form, event =>{$('.alert').alert('close')})</script>
</body>
 
</html>
