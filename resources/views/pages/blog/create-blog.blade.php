@extends('layouts.app')
@section('content')
    <div class="flex flex-col flex-grow p-2 bg-gray-50 xl:p-10">
        <div class="edit-container">

            <x-errors.validation class="mb-4" :errors="$errors"></x-errors.validation>

            <form class="space-y-6" method="POST" action="{{ route('administration.blogs.store') }}"
                enctype="multipart/form-data">
                <input class="hidden" type="file" id="files" name="files[]" multiple />
                @csrf
                <!-- upload system -->
                <div class="upload-system">
                    <div id="thumb-container">
                        <!-- Append ul.li Preview Nodes Here ... -->
                        <ul id="list" role="list"
                            class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-8 xl:gap-x-16">
                        </ul>
                    </div>

                    <div class="pt-4">
                        <x-buttons.primary-md id="select-file" type="button">Fotoğraf Seç</x-buttons.primary-md>
                    </div>
                </div>
                <!-- upload system -->

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Blog Adı
                    </label>
                    <div class="mt-1">
                        <input
                            id="title"
                            class="text-input"
                            name="title"
                            type="text"
                            value="{{ old('title') }}"
                            autofocus
                            required>
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
                            value="{{ old('slug') }}"
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
                            cols="50">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <x-buttons.primary-md>
                        Blog Kaydet
                    </x-buttons.primary-md>
                </div>
            </form>
        </div>
    </div>
@endsection
