<div class="admin-menu">
    <ul>
        <li>
            <a href="{{ route('admin.user.dashboard') }}">dashboard</a>
        </li>
        <li>
            <a href="{{ route('profile.edit') }}">profile.edit</a>
        </li>
        <li>
            <a href="{{ route('admin.user.profile.view') }}">profile.view</a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </li>
    </ul>
</div>
