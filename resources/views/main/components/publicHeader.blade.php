<div class="container">
    <div class="public-header-wrap">
        <div class="public-header-left-block">
            <a class="public-header-logo-wrap" href="{{ route('public.home') }}">
                <img class="public-header-logo" src="{{ asset('images/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="public-header-right-block">
            <ul class="public-menu">
                <li>
                    <a href="{{route('login')}}" class="public-menu-item {{ request()->routeIs('login') ? 'active' : '' }}">{{ __("public.menu-item.login") }}</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="public-menu-item {{ request()->routeIs('register') ? 'active' : '' }}">{{ __("public.menu-item.register") }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
