@guest
    <div class="flex items-center justify-center">
        <x-dropdowns.flyout>
            <x-slot name="buttonText">
                <span class="inline-flex items-center">
                    <x-icons.outline-user-circle class="mr-1 size-6"></x-icons.outline-user-circle>
                    Giriş Yap
                </span>
            </x-slot>
            <x-dropdowns.flyout-link :href="'#'">
                <p class="text-base font-light text-gray-900">
                    Giriş Yap
                </p>
            </x-dropdowns.flyout-link>
            <x-dropdowns.flyout-link :href="'#'">
                <p class="text-base font-light text-gray-900">
                    Hesap Oluştur
                </p>
            </x-dropdowns.flyout-link>
        </x-dropdowns.flyout>
    </div>
@endguest

@auth()
    {{-- login olunca gosterilen div --}}
    <div class="flex items-center gap-0 sm:gap-4">
        {{-- profile dropdown --}}
        <x-dropdowns.flyout>
            <x-slot name="buttonText">
                <div class="flex flex-row">
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 transition duration-300 bg-gray-500 rounded-full cursor-pointer hover:bg-indigo-700 hover:text-indigo-400">
                        <span class="text-sm font-medium leading-none text-white">
                            {{ substr(Auth::user()->first_name, 0, 1) . ' ' . substr(Auth::user()->last_name, 0, 1) }}
                        </span>
                    </span>
                </div>
            </x-slot>
            <x-dropdowns.flyout-link :href="route('profile.account')" :active="request()->routeIs('profile.account')">
                <p class="text-base font-light text-gray-900">Hesabım</p>
            </x-dropdowns.flyout-link>

            <x-dropdowns.flyout-link :href="route('logout')" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                <p class="text-base font-light text-gray-900">Çıkış Yap</p>
            </x-dropdowns.flyout-link>

            <form id="logout" class="hidden" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </x-dropdowns.flyout>
    </div>
@endauth
