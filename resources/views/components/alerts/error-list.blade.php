@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} class="alert-container">
        <div class="flex items-center justify-between p-4 border border-red-200 rounded-md bg-red-50">
            <ul class="space-y-2">
                @foreach ($errors->all() as $error)
                    <li class="flex items-center">
                        <x-icons.solid-x-circle class="mr-2 text-red-400 size-5" />
                        <p class="text-sm font-medium text-red-800">
                            {{ $error }}
                        </p>
                    </li>
                @endforeach
            </ul>

            <div>
                <x-buttons.circular-white-sm class="alert-close">
                    <span class="sr-only">Dismiss</span>
                    <x-icons.solid-x />
                </x-buttons.circular-white-sm>
            </div>
        </div>
    </div>
@endif
