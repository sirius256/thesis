<div class="admin-menu">
    <ul>
        <li>
            <a href="{{ route('administration.user.profile.view') }}" class="admin-menu-item {{ request()->routeIs('administration.user.profile.view') ? 'active' : '' }}">
                <i class="fa-solid fa-user"></i>
                <span>{{ __('administration.menu-item.profile') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.order.list') }}" class="admin-menu-item {{ request()->routeIs('administration.user.order.list') ? 'active' : '' }}">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>{{ __('administration.menu-item.my-orders') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.device.list') }}" class="admin-menu-item {{ request()->routeIs('administration.user.device.list') ? 'active' : '' }}">
                <i class="fa-solid fa-server"></i>
                <span>{{ __('administration.menu-item.my-devices') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('administration.user.device.shop') }}" class="admin-menu-item {{ request()->routeIs('administration.user.device.shop') ? 'active' : '' }}">
                <i class="fa-solid fa-bag-shopping"></i>
                <span>{{ __('administration.menu-item.make-new-order') }}</span>
            </a>
        </li>
        <li>
            <form class="admin-menu-item-logout-wrap" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="admin-menu-item" type="submit" onclick="event.preventDefault();this.closest('form').submit();">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>{{ __('administration.menu-item.logout') }}</span>
                </button>
            </form>
        </li>
    </ul>
</div>
