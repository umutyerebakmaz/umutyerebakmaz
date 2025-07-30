@props(['errors' => []])

@php
    use Illuminate\Support\ViewErrorBag;
    use Illuminate\Support\MessageBag;

    // Eğer ViewErrorBag veya MessageBag ise -> array'e dönüştür
    if ($errors instanceof ViewErrorBag || $errors instanceof MessageBag) {
        $errors = $errors->all();
    }

    // Eğer string ise tek elemanlı array yap
    if (is_string($errors)) {
        $errors = [$errors];
    }

    // Array değilse, zorla array'e çevir
    if (!is_array($errors)) {
        $errors = (array) $errors;
    }
@endphp

@if (!empty($errors))
    <div {{ $attributes->merge(['class' => 'alert-container']) }}>
        <div class="flex items-center justify-between p-4  rounded-md bg-red-50">
            <ul class="space-y-2">
                @foreach ($errors as $error)
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
