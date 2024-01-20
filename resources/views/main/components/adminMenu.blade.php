<div class="admin-menu">
    <ul>
        <li>
            <a href="{{ route('admin.user.dashboard') }}" class="admin-menu-item {{ request()->routeIs('admin.user.dashboard') ? 'active' : '' }}">
                {{ __('administration.menu-item.dashboard') }}
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.profile.view') }}" class="admin-menu-item {{ request()->routeIs('administration.user.profile.view') ? 'active' : '' }}">
                {{ __('administration.menu-item.profile') }}
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.order.list') }}" class="admin-menu-item {{ request()->routeIs('administration.user.order.list') ? 'active' : '' }}">
                {{ __('administration.menu-item.my-orders') }}
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.device.list') }}" class="admin-menu-item {{ request()->routeIs('administration.user.device.list') ? 'active' : '' }}">
                {{ __('administration.menu-item.my-devices') }}
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.device.shop') }}" class="admin-menu-item {{ request()->routeIs('administration.user.device.shop') ? 'active' : '' }}">
                {{ __('administration.menu-item.make-new-order') }}
            </a>
        </li>
        <li>
            <form class="admin-menu-item-logout-wrap" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="admin-menu-item" type="submit" onclick="event.preventDefault();this.closest('form').submit();">
                    {{ __('administration.menu-item.logout') }}
                </button>
            </form>
        </li>
    </ul>
</div>
