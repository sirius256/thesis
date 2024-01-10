@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">header</header>
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer">footer</footer>
    </main>
@endsection
