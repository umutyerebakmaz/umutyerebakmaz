{{-- icon size size-6 --}}
<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center p-2 border border-gray-200 rounded-full text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
