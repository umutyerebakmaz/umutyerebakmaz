<nav class="relative bg-white shadow-md">

    <div class="container px-2 mx-auto">

        <div class="flex justify-between h-16">

            <div class="flex items-center lg:hidden">
                {{-- mobile menu toggle --}}
                <button type="button"
                    id="mobile-menu-toggle"
                    class="inline-flex items-center justify-center text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">
                        Open mobile menu
                    </span>
                    <x-icons.outline-menu id="menu-icon" class="block size-7"></x-icons.outline-menu>
                    <x-icons.outline-x id="close-icon" class="hidden size-7"></x-icons.outline-x>
                </button>
            </div>

            {{-- 1. logos --}}
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('home') }}" aria-label="pestpoint logo - scalable vector graphic">
                    <x-logos.application-logo class="hidden w-auto h-12 fill-current lg:block"></x-logos.application-logo>
                    <x-logos.application-logo-secondary class="block w-auto h-6 fill-current lg:hidden"></x-logos.application-logo-secondary>
                </a>
            </div>

            {{-- 2. links wrapper --}}
            <div class="items-center hidden gap-3 lg:flex">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-sm hover:text-gray-900 text-gray-900 px-3 py-2 flex rounded-md  transition ease-in-out duration-150 bg-indigo-100' : 'text-sm hover:text-gray-900 text-gray-900 px-3 py-2 flex rounded-md hover:bg-indigo-100 transition ease-in-out duration-150' }}">
                    {{ __('about me') }}
                </a>

                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-sm hover:text-gray-900 text-gray900 px-3 py-2 flex rounded-md  transition ease-in-out duration-150 bg-indigo-100' : 'text-sm hover:text-gray-900 text-gray-900 px-3 py-2 flex rounded-md hover:bg-indigo-50 transition ease-in-out duration-150' }}">
                    {{ __('portfolio') }}
                </a>
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-sm hover:text-gray-900 text-gray900 px-3 py-2 flex rounded-md  transition ease-in-out duration-150 bg-indigo-100' : 'text-sm hover:text-gray-900 text-gray-900 px-3 py-2 flex rounded-md hover:bg-indigo-50 transition ease-in-out duration-150' }}">
                    {{ __('scripts') }}
                </a>
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-sm hover:text-gray-900 text-gray900 px-3 py-2 flex rounded-md  transition ease-in-out duration-150 bg-indigo-100' : 'text-sm hover:text-gray-900 text-gray-900 px-3 py-2 flex rounded-md hover:bg-indigo-50 transition ease-in-out duration-150' }}">
                    {{ __('blogs') }}
                </a>
                @admin
                    <x-navigation.navigation-admin-menu />
                @endadmin
            </div>

            {{-- 3. profile container --}}
            <x-navigation.navigation-profile-container></x-navigation.navigation-profile-container>
        </div>

    </div>
    {{-- navigation mobile --}}
    <x-navigation.navigation-mobile></x-navigation.navigation-mobile>
</nav>
