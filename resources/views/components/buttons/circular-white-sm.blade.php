<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center p-1.5 border border-transparent rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
