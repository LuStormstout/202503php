@extends('layouts.app')

@section('content')
    @if(!$categories->isEmpty())
        @foreach($categories as $category)
            <div class="category mb-4 border-b border-gray-200 pb-2">
                <span class="me-3">{{ $category->id }}</span>
                <span class="me-3"><b>{{ $category->name }}</b></span>
                <a href="{{ route('categories.show', $category->id) }}">View Products</a>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            No categories found.
        </div>
    @endif
@endsection
