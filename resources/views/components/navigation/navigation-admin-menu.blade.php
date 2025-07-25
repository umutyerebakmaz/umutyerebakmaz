<x-dropdowns.flyout>
    <x-slot name="buttonText">
        {{ __('YÖNET') }}
    </x-slot>

    <x-dropdowns.flyout-link
        :href="route('administration.blogs.index')"
        :active="request()->routeIs('administration.blogs.index')"
        class="rounded-bl-md rounded-br-md">
        <p class="text-base font-light text-gray-900">
            {{ __('Blog') }}
        </p>
    </x-dropdowns.flyout-link>

</x-dropdowns.flyout>
