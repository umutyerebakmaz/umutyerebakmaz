@props(['attention'])

@if ($attention)
    <div {{ $attributes }} class="alert-container">
        <div class="flex items-center justify-between p-4 rounded-md bg-yellow-50">

            <div class="flex items-center justify-start">
                <x-icons.solid-exclamation-circle class="mr-4 text-yellow-400 size-6"></x-icons.solid-exclamation-circle>
                <p class="text-sm font-medium text-yellow-800">
                    {{ $attention }}
                </p>
            </div>

            <div>
                <x-buttons.circular-white-sm class="alert-close">
                    <span class="sr-only">Dismiss</span>
                    <x-icons.solid-x></x-icons.solid-x>
                </x-buttons.circular-white-sm>
            </div>

        </div>
    </div>
@endif
