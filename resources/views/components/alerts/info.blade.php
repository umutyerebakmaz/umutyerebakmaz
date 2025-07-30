@props(['info'])

@if ($info)
    <div {{ $attributes }} class="alert-container">
        <div class="flex items-center justify-between p-4 rounded-md bg-blue-50">

            <div class="flex items-center justify-start">
                <x-icons.solid-information-circle class="mr-4 text-blue-400 size-6"></x-icons.solid-information-circle>
                <p class="text-sm font-medium text-blue-700">
                    {{ $info }}
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
