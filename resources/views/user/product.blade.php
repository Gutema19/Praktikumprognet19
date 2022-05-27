@extends('layouts.user-layout.main')
@section('title', 'Product')
@section('body')
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
      
     <!--=================================
     Home Slider Tab
     ===================================== -->
     <section class="section-padding">
          <h2 class="sr-only">Home Tab Slider Section</h2>
          <div class="container">
          <div class="sb-custom-tab">
               @livewire('product-livewire')
          </div>    
          </div>
     </section>
@endsection