<div class="relative inline-block text-left dropdown">
    <x-buttons.circular-white-md
        type="button"
        aria-expanded="false"
        aria-haspopup="true" class="dropdown-toggle">
        <x-icons.dots-vertical aria-hidden="true" data-slot="icon" />
    </x-buttons.circular-white-md>
    <div
        class="absolute right-0 z-10 hidden w-56 mt-2 transition duration-100 origin-top-right transform scale-95 bg-white rounded-md shadow-lg opacity-0 dropdown-menu ring-1 ring-black/5 focus:outline-hidden"
        role="menu"
        aria-orientation="vertical"
        tabindex="-1">
        {{ $slot }}
    </div>
</div>
