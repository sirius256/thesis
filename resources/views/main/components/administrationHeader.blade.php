
<header>
    @if (!empty($pageTitle))
        <h2 class="text-lg font-medium text-gray-900">
            {{ $pageTitle }}
        </h2>
    @endif
    @if (!empty($pageDescription))
        <p>{{ $pageDescription }}</p>
    @endif
</header>


