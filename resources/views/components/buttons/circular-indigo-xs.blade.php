<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center p-1 bg-white text-indigo-500 border border-indigo-200 rounded-full shadow-sm
                hover:bg-indigo-700 hover:text-white hover:border-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-indigo-500 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
