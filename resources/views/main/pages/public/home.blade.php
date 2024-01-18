@extends('main.layouts.public')

@section('content')
    <div class="public-about-block">
        <div class="container">
            <div class="public-block-title">Дипломна робота</div>
            Це курсова робота ....
        </div>
    </div>

   <div class="container">
        <div class="public-shop-block">
            <div class="public-block-title">Замовити пристрій</div>
            @include('main.components.shop')
        </div>
   </div>
@endsection
