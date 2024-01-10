@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">
            <div class="container">header</div>
        </header>
        <div class="content">
            <div class="admin-content">
                <div class="admin-content-left-block">
                    @include('main.components.adminMenu')
                </div>
                <div class="admin-content-right-block">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">footer</div>
        </footer>
    </main>
@endsection
