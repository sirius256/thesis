@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">
            @include('main.components.publicHeader')
        </header>
        <div class="content">
            @yield('content')
            <footer class="content-footer-wrap">
                @include('main.components.publicFooter')
            </footer>
        </div>
    </main>
@endsection
