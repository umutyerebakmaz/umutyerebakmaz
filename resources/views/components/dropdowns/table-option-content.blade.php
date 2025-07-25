@props(['id', 'iteration', 'showRoute', 'indexRoute', 'editRoute', 'deleteRoute', 'user'])
<div class="py-1" role="none">
    {{-- send verification mail --}}
    @if(!empty($user))
        <a href="javascript:void(0)"
           onclick="event.preventDefault(); document.getElementById('send-verification-form-{{ $iteration }}').submit()"
           class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 ease-in-out group hover:bg-indigo-100 hover:text-gray-900" role="menuitem"
           tabindex="-1" id="menu-item-0">
            <x-icons.outline-envelope class="mr-3 text-green-700"></x-icons.outline-envelope>
            Doğrulama maili gönder
            <form id="send-verification-form-{{ $iteration }}" method="post" action="{{ route('users.send-verification', $user) }}">
                @csrf
            </form>
        </a>
    @endif
    {{-- show --}}
    @if (!empty($showRoute))
        <a href="{{ route($showRoute, $id) }}"
            class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 ease-in-out group hover:bg-indigo-100 hover:text-gray-900" role="menuitem"
            tabindex="-1" id="menu-item-1">
            <x-icons.solid-eye class="mr-3 text-indigo-700 size-6"></x-icons.solid-eye>
            Detay Göster
        </a>
    @endif
    {{-- edit --}}
    @if (!empty($editRoute))
        <a href="{{ route($editRoute, $id) }}"
            class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 ease-in-out group hover:bg-indigo-100 hover:text-gray-900" role="menuitem"
            tabindex="-1" id="menu-item-2">
            <x-icons.solid-pencil-alt class="mr-3 text-indigo-700"></x-icons.solid-pencil-alt>
            Düzenle
        </a>
    @endif
    {{-- delete --}}
    @if (!empty($deleteRoute))
        <a href="javascript:void(0)"
            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $iteration }}').submit()"
            class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 ease-in-out group hover:bg-indigo-100 hover:text-gray-900" role="menuitem"
            tabindex="-1" id="menu-item-3">
            <x-icons.solid-trash class="mr-3 text-red-400"></x-icons.solid-trash>
            Sil
            <form id="delete-form-{{ $iteration }}" action="{{ route($deleteRoute, $id) }}" method="post">
                @csrf
                @method('DELETE')
            </form>
        </a>
    @endif
</div>
