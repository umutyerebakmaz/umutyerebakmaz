<x-dropdowns.flyout>
    <x-slot name="buttonText">
        HAŞERE İLAÇLARI
    </x-slot>
    @foreach ($insects as $insect)
        <x-dropdowns.flyout-link
            :href="route('insect-biocidals', $insect)">
            <p class="text-base font-light text-gray-900">
                {{ $insect->title }} İlaçları
            </p>
        </x-dropdowns.flyout-link>
    @endforeach
</x-dropdowns.flyout>
