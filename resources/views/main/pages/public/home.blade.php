@extends('main.layouts.public')

@section('content')
    <div class="public-about-block">
        <div class="container">
            <div class="about-website">
                <div class="public-block-title">Кваліфікаційна робота</div>
                <p>
                    Цей сай частиною дипломнтї роботи на тему "Розробка інформаційної системи управління охоронними засобами відеоспостереження".
                    <br>
                    Сайт дає змогу користувачу придбати пристрій, обробити цю заявку модератором.
                    <br>
                    Після того як модератор активує пристрій, користувач має змогу управляти пристроєм і віддалено робити фотографії.
                    <br>
                    Ці фотографії можна буде переглянути у кабінеті користувача.
                    <br>
                    Також проведено дослідження різних форматів фото, і їх доцільності використання в даному випадку.
                    <br>
                    Код сайту є у <a href="https://github.com/sirius256/thesis">github</a>
                </p>
            </div>
        </div>
    </div>

   <div class="container">
        <div class="public-shop-block">
            <div class="public-block-title">Замовити пристрій</div>
            @include('main.components.shop')
        </div>
   </div>
@endsection
