@extends('layouts.app')
@section('title', 'Test Page')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1 class="text-3xl mb-2">Test Page</h1>
            <p>This is a test page.</p>
            <p>Current date and time: {{ now() }}</p>
        </div>
        @if(!empty($data))
            <div class="item mb-4">
                <p>{{ $data['name'] }}</p>
                <p>{{ $data['version'] }}</p>
                <p>{{ $data['author'] }}</p>
            </div>
        @endif
        <p class="mb-4">此网站的作者是: {{ $author }}</p>

        @if(!$categories->isEmpty())
            @foreach($categories as $category)
                <div class="category mb-4">
                    <h2 class="text-2xl mb-2 border-b border-gray-900">
                        <i class="me-3">#{{ $category->id }} </i>{{ $category->name }}
                    </h2>
                </div>
            @endforeach
            {{ $categories->links() }}
        @endif

        <hr class="mt-5">

        <div class="mb-4">
            {!! $html !!}
            {{ $html }}
        </div>

        <div class="mb-4">

        </div>
@endsection
