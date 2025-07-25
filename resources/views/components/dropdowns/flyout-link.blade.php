@props(['active'])
@php
    $classes =
        $active ?? false
            ? '-m-3 p-3 block rounded-md hover:bg-indigo-50 transition ease-in-out duration-150 bg-indigo-100'
            : '-m-3 p-3 block rounded-md hover:bg-indigo-50 transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
