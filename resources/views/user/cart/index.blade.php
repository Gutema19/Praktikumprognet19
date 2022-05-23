@extends('layouts.user-layout.main')

@section('body')
<main id="content" role="main" class="cart-page">

    <div class="container">
        @livewire('cart-list-livewire')
    </div>
</main>
@endsection