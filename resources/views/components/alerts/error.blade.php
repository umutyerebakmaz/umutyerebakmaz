@props(['error'])

@if ($error)
    <div {{ $attributes }} id="error-container">
        <div class="flex items-center justify-between p-4 rounded-md bg-red-50">
            <div class="flex-1">
                <div class="flex items-center">
                    <x-icons.solid-x-circle class="mr-4 text-red-400 size-6"></x-icons.solid-x-circle>
                    <p class="text-sm font-medium text-red-800">
                        {!! $error !!}
                    </p>
                </div>
                @if (isset($slot) && trim($slot))
                    <div class="mt-3">
                        {{ $slot }}
                    </div>
                @endif
            </div>
            <div>
                <x-buttons.circular-white-sm type="button" id="dismiss-error-button">
                    <span class="sr-only">Dismiss</span>
                    <x-icons.solid-x></x-icons.solid-x>
                </x-buttons.circular-white-sm>
            </div>
        </div>
    </div>
@endif
