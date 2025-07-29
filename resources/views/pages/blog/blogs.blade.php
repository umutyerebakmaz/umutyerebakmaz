@extends('layouts.app')

@section('content')
    <div class="flex flex-grow">
        <div class="admin-filter-container">
            <x-filters.blog-filter></x-filters.blog-filter>
        </div>

        <div class="flex-grow px-10 pt-10 bg-gray-50">
            <x-datatables.blogs :blogs="$blogs"></x-datatables.blogs>
        </div>
    </div>
@endsection
