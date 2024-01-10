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
            @include('main.components.publicFooter')
        </footer>
    </main>
@endsection
