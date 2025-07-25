<div class="flyout-menu">
    <button type="button"
        class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-900 transition duration-150 ease-in-out rounded-md flyout-button hover:bg-indigo-100 hover:text-gray-900"
        aria-expanded="false">
        <span>{{ $buttonText }}</span>
        <x-icons.solid-chevron-down class="ml-2 text-gray-400 group-hover:text-gray-500 chevron-icon"></x-icons.solid-chevron-down>
    </button>
    <div class="absolute z-10 hidden w-screen max-w-xs px-2 mt-3 transition duration-200 ease-out transform translate-y-1 opacity-0 flyout-content sm:px-0">
        <div class="flex-auto w-screen max-w-xs overflow-hidden bg-white shadow-lg ring-1 ring-gray-900/5 rounded-3xl text-sm/6">
            <div class="relative grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
