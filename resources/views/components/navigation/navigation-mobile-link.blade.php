@props(['active'])

@php
$classes = ($active ?? false)
            ? 'py-2 px-2 block rounded-md hover:bg-indigo-50 hover:text-indigo-900 transition ease-in-out duration-150 bg-indigo-100 text-indigo-900'
            : 'py-2 px-2 block rounded-md hover:bg-indigo-50 hover:text-indigo-900 transition ease-in-out duration-150'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

