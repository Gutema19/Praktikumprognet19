@extends('layouts.user-layout.main')

@section('body')
    @livewire('product-buy-now-livewire', ['product' => $product])
@endsection
