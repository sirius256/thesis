@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">
            <div class="container">header</div>
        </header>
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container">footer</div>
        </footer>
    </main>
@endsection
