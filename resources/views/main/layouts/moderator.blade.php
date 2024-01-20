@extends('main.layouts.base')

@section('pageContent')
    <main class="main">
        <header class="header">
            <div class="administration-header">
                <div class="administration-moderator-header">
                    <div class="administration-header-logo-wrap">
                        <img class="administration-header-logo" src="{{ asset('images/logo.png') }}" alt="logo">
                    </div>
                    <div>Ви увійшли як модератор</div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-light" type="submit" onclick="event.preventDefault();this.closest('form').submit();">
                                {{ __('administration.menu-item.logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="admin-content">
                <div class="admin-content-header">
                    @include('main.components.administrationHeader')
                </div>
               <div>
                   @yield('content')
               </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">footer</div>
        </footer>
    </main>
@endsection
