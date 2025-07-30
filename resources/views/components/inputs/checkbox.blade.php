@props(['name', 'value', 'checked' => false])
<div class="grid grid-cols-1 group size-6">
    <input
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        class="col-start-1 row-start-1 transition-all duration-300 ease-in-out bg-white border border-gray-200 rounded-sm appearance-none cursor-pointer checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-100 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
        {{ $attributes }}
        @if ($checked) checked @endif>
    <svg class="self-center col-start-1 row-start-1 pointer-events-none size-5 justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14"
        fill="none">
        <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</div>
