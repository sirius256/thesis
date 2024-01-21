@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">
            @include('main.components.publicHeader')
        </header>
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="content-footer-wrap">
                @include('main.components.publicFooter')
            </div>
        </footer>
    </main>
@endsection
