@extends('layouts.app')

@section('content')
    <div class="container max-w-4xl px-4 py-12 mx-auto">
        {{-- Geri Butonu --}}
        <div class="mb-6">
            <a href="{{ route('blogs') }}" class="text-indigo-600 hover:underline">&larr; Tüm Yazılar</a>
        </div>

        {{-- Başlık ve Meta --}}
        <header class="mb-8">
            <h1 class="mb-4 text-4xl font-bold text-gray-900">{{ $blog->title }}</h1>

            <div class="flex items-center space-x-4 text-sm text-gray-500">
                <time datetime="{{ $blog->created_at->format('Y-m-d') }}">
                    {{ $blog->created_at->translatedFormat('d F Y') }}
                </time>

                <span>&bull;</span>

                <span class="flex items-center space-x-2">
                    <img src="{{ asset('images/default.png') }}" alt="Pestpoint" class="w-6 h-6 rounded-full">
                    <span>Pestpoint</span>
                </span>
            </div>
        </header>

        {{-- Görsel --}}
        @if ($blog->image)
            <div class="aspect-[16/9] mb-10 overflow-hidden rounded-xl">
                <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                    alt="{{ $blog->title }}"
                    class="object-cover w-full h-full">
            </div>
        @endif

        {{-- İçerik --}}
        <article class="prose lg:prose-lg max-w-none prose-img:rounded-lg prose-a:text-blue-600 prose-a:underline hover:prose-a:text-blue-800">
            {!! $blog->content !!}
        </article>

        {{-- Admin Düzenle Butonu --}}
        @admin
            <div class="mt-10">
                <a href="{{ route('administration.blogs.edit', $blog->id) }}">
                    <x-buttons.primary-md>Yazıyı Güncelle</x-buttons.primary-md>
                </a>
            </div>
        @endadmin
    </div>
@endsection
