@extends('layouts.app')

@section('content')
    <div class="flex flex-col flex-grow p-2 xl:p-10 bg-gray-50">
        <div class="edit-container">

            <x-errors.validation class="mb-4" :errors="$errors"></x-errors.validation>

            <form class="space-y-6" method="POST" action="{{ route('administration.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                <input class="hidden" type="file" id="files" name="files[]" multiple />
                @csrf
                @method('PUT')
                <!-- upload system -->
                <div class="upload-system">
                    <div id="thumb-container">
                        <!-- Append ul.li Preview Nodes Here ... -->
                        <ul id="list" role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-8 xl:gap-x-16">
                            @if ($blog->image)
                                <li class="relative">
                                    <div
                                        class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-w-10 aspect-h-7 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500">
                                        <img src="{{ asset('/uploads/blogs/' . $blog->image) }}"
                                            alt="" class="object-cover ponter-events-none group-hover:opacity-75">
                                        <button type="button" class="absolute inset-0 focus:outline-none">
                                            <span class="sr-only">View details for {{ $blog->image }}</span>
                                        </button>
                                    </div>
                                    <p class="block mt-2 text-sm font-medium text-gray-900 truncate pointer-events-none">{{ $blog->image }}</p>
                                    <p class="block text-sm font-medium text-gray-500 pointer-events-none">SIZE</p>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="pt-4">
                        <x-buttons.primary-md id="select-file" type="button">Fotoğraf Seç</x-buttons.primary-md>
                    </div>
                </div>
                <!-- upload system -->

                <div>
                    <div class="mt-1">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Blog Adı
                        </label>
                        <input
                            id="title"
                            class="text-input"
                            name="title"
                            type="text"
                            value="{{ old('title', $blog->title) }}"
                            required
                            autofocus>
                    </div>
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700">
                        Blog URL
                    </label>
                    <div class="mt-1">
                        <input
                            id="slug"
                            class="text-input"
                            name="slug"
                            type="text"
                            value="{{ old('slug', $blog->slug) }}"
                            required>
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">
                        Blog İçerik
                    </label>
                    <div class="mt-1">
                        <textarea
                            id="content"
                            class="text-area"
                            name="content"
                            rows="4"
                            cols="50">{{ old('content', $blog->content) }}</textarea>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <x-buttons.primary-md>
                        Blog Güncelle
                    </x-buttons.primary-md>
                </div>
            </form>
        </div>
    </div>
@endsection
