<nav id="mobile-menu" class="h-0 px-2 mx-auto overflow-hidden transition-all ease-in-out duration-600 lg:hidden container border-t-amber-50">
    <div class="pt-2 pb-3 space-y-1">
{{--        <x-navigation.mobile-menu-group routeParam="home" :items="$brands" title="HOME"></x-navigation.mobile-menu-group>--}}
        <x-navigation.navigation-mobile-link :href="route('blogs')" :active="request()->routeIs('blogs')"
            class="text-sm font-bold">
            BLOG
        </x-navigation.navigation-mobile-link>

        @admin
            <div class="space-y-1 mobile-menu-group">
                <button
                    data-mobile-menu-toggle
                    type="button"
                    class="mobile-menu-group-button">
                    <span class="flex-1">
                        YÖNET
                    </span>
                    <x-icons.solid-chevron-right
                        class="mobile-menu-chevron">
                    </x-icons.solid-chevron-right>
                </button>

                <div class="mobile-menu-group-content">
                    <x-navigation.navigation-mobile-link
                        :href="route('administration.blogs.index')"
                        :active="request()->routeIs('administration.blogs.index')"
                        class="font-light rounded-bl-md rounded-br-md">
                        Blog
                    </x-navigation.navigation-mobile-link>

                </div>
            </div>
        @endadmin
    </div>
</nav>
