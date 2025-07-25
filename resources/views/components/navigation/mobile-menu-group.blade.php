@props(['items', 'routeParam', 'title'])
<div class="mobile-menu-group">
    <button
        data-mobile-menu-toggle
        type="button"
        class="mobile-menu-group-button">
        <span class="flex-1">
            {{ $title }}
        </span>
        <x-icons.solid-chevron-right class="mobile-menu-chevron" aria-hidden="true"></x-icons.solid-chevron-right>
    </button>

    <div class="mobile-menu-group-content">
        @foreach ($items as $item)
            <x-navigation.navigation-mobile-link :href="route($routeParam, $item)" class="font-light">
                {{ $item->title }}
            </x-navigation.navigation-mobile-link>
        @endforeach
    </div>
</div>
