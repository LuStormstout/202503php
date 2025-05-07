@extends('layouts.app')

@section('title', $author->name)

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $author->name }}</h1>
        <div class="space-x-2">
            <a href="{{ route('authors.edit', $author) }}"
               class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 dark:focus:ring-offset-gray-800">
                {{ __('Edit Author') }}
            </a>
            <a href="{{ route('authors.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Back to Authors') }}
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 space-y-4">
        <div>
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Email') }}</h3>
            <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $author->email }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Bio') }}</h3>
            <p class="mt-1 text-sm text-gray-900 dark:text-gray-100 whitespace-pre-wrap">{{ $author->bio ?: __('Not available') }}</p>
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Joined') }}</h3>
            <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $author->created_at->translatedFormat('F j, Y') }} ({{ $author->created_at->diffForHumans() }})</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">{{ __('Posts by this Author') }} ({{ $author->posts->count() }})</h2>
        @if($author->posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($author->posts as $post)
                    {{-- 修改后的卡片div --}}
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden transition-all duration-300 ease-in-out hover:shadow-xl hover:ring-2 hover:ring-pink-500 dark:hover:ring-pink-400">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 hover:text-indigo-600 dark:hover:text-indigo-400">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($post->content, 100) }}</p>
                            <div class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                                <span>{{ $post->created_at->translatedFormat('M d, Y') }}</span>
                                &middot;
                                <span>
                                 @if($post->status === 0) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100">{{ __('Draft') }}</span> @endif
                                    @if($post->status === 1) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100">{{ __('Published') }}</span> @endif
                                    @if($post->status === 2) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-100">{{ __('Hidden') }}</span> @endif
                            </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 dark:text-gray-400">{{ __('This author has not published any posts yet.') }}</p>
        @endif
    </div>
@endsection
