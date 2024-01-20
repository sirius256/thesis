@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">
            <div class="administration-header">
                <div class="administration-header-logo-wrap">
                    <img class="administration-header-logo" src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
            </div>
        </header>
        <div class="content">
            <div class="admin-content">
                <div class="admin-content-left-block">
                    @include('main.components.adminMenu')
                </div>
                <div class="admin-content-right-block">
                    <div class="admin-content-header">
                        @include('main.components.administrationHeader')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">footer</div>
        </footer>
    </main>
@endsection
