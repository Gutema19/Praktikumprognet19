@extends('layouts.user-layout.main')
@section('title', 'Product')
@section('body')
     <!--=================================
     Home Slider Tab
     ===================================== -->
     <section class="section-padding">
          <h2 class="sr-only">Home Tab Slider Section</h2>
          <div class="container">
          <div class="sb-custom-tab">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                         <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                              aria-controls="shop" aria-selected="true">
                              Featured Products
                         </a>
                         <span class="arrow-icon"></span>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab"
                              aria-controls="men" aria-selected="true">
                              New Arrivals
                         </a>
                         <span class="arrow-icon"></span>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab"
                              aria-controls="woman" aria-selected="false">
                              Most view products
                         </a>
                         <span class="arrow-icon"></span>
                    </li>
               </ul>
               @livewire('product-livewire')
          </div>    
          </div>
     </section>
@endsection