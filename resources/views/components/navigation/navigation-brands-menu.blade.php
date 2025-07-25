<x-dropdowns.flyout>
    <x-slot name="buttonText">
        MARKALAR
    </x-slot>
    @foreach ($brands as $brand)
        <x-dropdowns.flyout-link
            :href="route('biocidal-brands', $brand)">
            <p class="text-base font-light text-gray-900">
                {{ $brand->title }}
            </p>
        </x-dropdowns.flyout-link>
    @endforeach
</x-dropdowns.flyout>
