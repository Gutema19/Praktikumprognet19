<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/css/plugins.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href= "{{asset('assets/css/main.css')}}" />
    <link rel="shortcut icon" type="image/x-icon" href= "{{asset('assets/image/favicon.ico')}}">
    @stack('css')

    @livewireStyles
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ">
                            <a href="/" class="site-brand">
                                <img src="/component/Logo.svg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="text">
                                    <p>Free Support 24/7</p>
                                    <p class="font-weight-bold number">+01-202-555-0181</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    @auth
                                    <li class="menu-item">
                                        <a href="{{ url('/home') }}">Home</a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="{{ url('/my-transaction') }}">My Transaction</a>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="">{{ auth()->user()->name }} <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu">
                                            <li> <a href="{{ url('/logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="menu-item">
                                        <a href="{{ url('/login_user') }}">Login</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ url('/register_user') }}">Register</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        categories</a>
                                    <ul class="category-menu">
                                        <li class="cat-item has-children">
                                            <a href="#">Arts & Photography</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Bags & Cases</a></li>
                                                <li><a href="#">Binoculars & Scopes</a></li>
                                                <li><a href="#">Digital Cameras</a></li>
                                                <li><a href="#">Film Photography</a></li>
                                                <li><a href="#">Lighting & Studio</a></li>
                                            </ul>
                                        </li>
                                        <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
                                            <ul class="sub-menu">
                                                <li class="single-block">
                                                    <h3 class="title">WHEEL SIMULATORS</h3>
                                                    <ul>
                                                        <li><a href="#">Bags & Cases</a></li>
                                                        <li><a href="#">Binoculars & Scopes</a></li>
                                                        <li><a href="#">Digital Cameras</a></li>
                                                        <li><a href="#">Film Photography</a></li>
                                                        <li><a href="#">Lighting & Studio</a></li>
                                                    </ul>
                                                </li>
                                                <li class="single-block">
                                                    <h3 class="title">WHEEL SIMULATORS</h3>
                                                    <ul>
                                                        <li><a href="#">Bags & Cases</a></li>
                                                        <li><a href="#">Binoculars & Scopes</a></li>
                                                        <li><a href="#">Digital Cameras</a></li>
                                                        <li><a href="#">Film Photography</a></li>
                                                        <li><a href="#">Lighting & Studio</a></li>
                                                    </ul>
                                                </li>
                                                <li class="single-block">
                                                    <h3 class="title">WHEEL SIMULATORS</h3>
                                                    <ul>
                                                        <li><a href="#">Bags & Cases</a></li>
                                                        <li><a href="#">Binoculars & Scopes</a></li>
                                                        <li><a href="#">Digital Cameras</a></li>
                                                        <li><a href="#">Film Photography</a></li>
                                                        <li><a href="#">Lighting & Studio</a></li>
                                                    </ul>
                                                </li>
                                                <li class="single-block">
                                                    <h3 class="title">WHEEL SIMULATORS</h3>
                                                    <ul>
                                                        <li><a href="#">Bags & Cases</a></li>
                                                        <li><a href="#">Binoculars & Scopes</a></li>
                                                        <li><a href="#">Digital Cameras</a></li>
                                                        <li><a href="#">Film Photography</a></li>
                                                        <li><a href="#">Lighting & Studio</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="cat-item "><a href="#">Accessories</a></li>
                                        <li class="cat-item "><a href="#">Education</a></li>
                                        <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
                                        <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
                                                Categories</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <a href="/cart">
                                        @livewire('cart-livewire')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
        Hero Area
        ===================================== -->
        <section class="hero-area hero-slider-1">
            <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
                <div class="single-slide bg-shade-whisper  ">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-right">
                                <img src="image/bg-images/home-slider-2-ai.png" alt="">
                            </div>
                            <div class="row no-gutters ">
                                <div class="col-xl-6 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-left-side">
                                        <h1>H.G. Wells<br>
                                            De Vengeance</h1>
                                        <h2>Cover Up Front Of Books and Leave Summary</h2>
                                        <a href="shop-grid.html" class="btn btn-outlined--primary">
                                            $78.09 - Order Now!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slide bg-ghost-white">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-left">
                                <img src="image/bg-images/home-slider-1-ai.png" alt="">
                            </div>
                            <div class="row align-items-center justify-content-start justify-content-md-end">
                                <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-right-side">
                                        <h1>J.D. Kurtness <br>
                                            De Vengeance</h1>
                                        <h2>Cover Up Front Of Books and Leave Summary</h2>
                                        <a href="shop-grid.html" class="btn btn-outlined--primary">
                                            $78.09 - Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--=================================
        Home Features Section
        ===================================== -->
        <section class="mb--30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Shipping Item</h5>
                                <p> Orders over $500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Cash On Delivery</h5>
                                <p>Lorem ipsum dolor amet</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call us : + 0123.4567.89</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @yield('body')

    </div>
    <!--=================================
    Footer Area
    ===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="image/logo--footer.png" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Address:</span><span class="text">Example Street 98, HH2 BacHa, New
                                    York,
                                    USA</span></p>
                            <p><span class="label">Phone:</span><span class="text">+18088 234 5678</span></p>
                            <p><span class="label">Email:</span><span class="text">suport@hastech.com</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Prices drop</a></li>
                            <li><a href="">New products</a></li>
                            <li><a href="">Best sales</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Delivery</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Stores</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>Newsletter Subscribe</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="./php/mail.php">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                            <button class="btn btn--primary w-100">Subscribe</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href=""><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <a href="#" class="payment-block">
                    <img src="image/icon/payment.png" alt="">
                </a>
                <p class="copyright-text">Copyright © 2022 Kelompok 19. All Right Reserved.
                    <br>
                    Design By Kelompok 19</p>
            </div>
        </div>
    </footer>
    
    <script src=  {{asset('assets/js/plugins.js')}}></script>
    <script src=  {{asset('assets/js/ajax-mail.js')}}></script>
    <script src= {{asset('assets/js/custom.js')}}></script>

    @livewireScripts

    @stack('scripts')
</body>

</html>