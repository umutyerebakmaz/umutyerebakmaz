@extends('layouts.app')

@section('content')
    <div class="container px-2 py-12 mx-auto">
        <h1 class="pb-20 text-3xl font-extrabold text-center text-gray-900 sm:text-4xl">
            Yazılar
        </h1>
        <div class="grid max-w-lg gap-5 mx-auto lg:grid-cols-3 lg:max-w-none">
            @foreach ($blogs as $blog)
                <x-blogs.blog-cart :blog="$blog"></x-blogs.blog-cart>
            @endforeach
        </div>

        {{-- paginator --}}
        <div class="mt-12">
            {!! $blogs->links() !!}
        </div>
    @endsection
