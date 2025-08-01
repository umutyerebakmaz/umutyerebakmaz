<div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logos.application-logo class="w-auto h-20 mx-auto" alt="pestpoint logo"></x-logos.application-logo>
        </a>
        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
            Hesabınıza giriş yapın
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white border border-gray-200 sm:rounded-lg sm:px-10">
            <x-alerts.error-list class="mb-4" :errors="$errors"></x-alerts.error-list>
            <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Eposta
                    </label>
                    <div class="mt-1">
                        <input
                            id="email"
                            class="text-input"
                            name="email"
                            type="email"
                            autocomplete="email"
                            value="umutyerebakmaz@gmail.com" required>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Şifre
                    </label>
                    <div class="mt-1">
                        <input
                            id="password"
                            class="text-input"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            value="123456789"
                            required>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <x-inputs.checkbox id="remember" name="remember" :value="false"></x-inputs.checkbox>
                        <label for="remember" class="block ml-2 text-sm text-gray-900">
                            Beni Hatırla
                        </label>
                    </div>

                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline"
                                href="{{ route('password.request') }}">
                                {{ __('Şifremi unuttum') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <a href="{{ route('register') }}">
                        <x-buttons.primary-md type="button" class="items-center justify-center w-full font-medium uppercase">
                            Hesap Oluştur
                        </x-buttons.primary-md>
                    </a>

                    <x-buttons.primary-md class="items-center justify-center w-full font-medium uppercase">
                        Giriş Yap
                    </x-buttons.primary-md>
                </div>
            </form>

        </div>
    </div>

</div>
