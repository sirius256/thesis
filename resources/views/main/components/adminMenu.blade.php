<div class="admin-menu">
    <ul>
        <li>
            <a href="{{ route('admin.user.dashboard') }}" class="admin-menu-item {{ request()->routeIs('admin.user.dashboard') ? 'active' : '' }}">dashboard</a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}" class="admin-menu-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">profile.edit</a>
        </li>
        <li>
            <a href="{{ route('administration.user.profile.view') }}" class="admin-menu-item {{ request()->routeIs('administration.user.profile.view') ? 'active' : '' }}">profile.view</a>
        </li>
        <li>
            <form class="admin-menu-item-logout-wrap" method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="admin-menu-item" href="http://thesis.localhost/logout" onclick="event.preventDefault();this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </li>
    </ul>
</div>
