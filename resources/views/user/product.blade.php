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
               @livewire('product-livewire')
          </div>    
          </div>
     </section>
@endsection