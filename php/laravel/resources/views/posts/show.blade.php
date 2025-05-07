@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 md:p-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 leading-tight mb-2 sm:mb-0">
                {{ $post->title }}
            </h1>
            <div class="space-x-2 flex-shrink-0">
                <a href="{{ route('posts.edit', $post) }}"
                   class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 dark:focus:ring-offset-gray-800">
                    {{ __('Edit Post') }}
                </a>
                <a href="{{ route('posts.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Back to Posts') }}
                </a>
            </div>
        </div>

        <div class="mb-6 text-sm text-gray-500 dark:text-gray-400">
            <span>{{ __('Published on') }} {{ $post->created_at->translatedFormat('F j, Y, g:i a') }}</span>
            @if($post->author)
                <span>{{ __('by') }}
                    <a href="{{ route('authors.show', $post->author) }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        {{ $post->author->name }}
                    </a>
                </span>
                @endif
                &middot;
                <span>
                @if($post->status === 0) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100">{{ __('Draft') }}</span> @endif
                    @if($post->status === 1) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100">{{ __('Published') }}</span> @endif
                    @if($post->status === 2) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-100">{{ __('Hidden') }}</span> @endif
            </span>
        </div>

        {{-- You might want to use a specific class for prose styling if you have Tailwind Typography plugin --}}
        <div class="prose dark:prose-invert max-w-none text-gray-800 dark:text-gray-200 text-lg leading-relaxed whitespace-pre-wrap">
            {{ $post->content }}
        </div>

        @if($post->tags && $post->tags->count() > 0)
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">{{ __('Tags') }}:</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tags.show', $tag) }}" {{-- Assuming you have a tags.show route --}}
                        class="px-3 py-1 text-sm font-medium bg-indigo-100 text-indigo-700 dark:bg-indigo-900 dark:text-indigo-200 rounded-full hover:bg-indigo-200 dark:hover:bg-indigo-700">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Metadata section (optional, based on your metadata table) --}}
        @if($post->metadata)
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-sm">
                {{-- Added justify-items-center to center content within each grid cell --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-x-4 gap-y-2 justify-items-center">

                    {{-- Likes --}}
                    <div class="flex items-center text-red-500 dark:text-red-400"> {{-- Changed color --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        <span>{{ $post->metadata->like_count }}</span>
                        <span class="sr-only">{{ __('Likes') }}</span>
                    </div>

                    {{-- Views --}}
                    <div class="flex items-center text-sky-500 dark:text-sky-400"> {{-- Changed color --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>{{ $post->metadata->view_count }}</span>
                        <span class="sr-only">{{ __('Views') }}</span>
                    </div>

                    {{-- Comments --}}
                    <div class="flex items-center text-green-500 dark:text-green-400"> {{-- Changed color --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-6.75 3h9M3.375 20.25V16.5c0-.621.504-1.125 1.125-1.125h13.5A1.125 1.125 0 0 0 19.5 16.5v3.75m0-10.5V6.75c0-.621-.504-1.125-1.125-1.125h-13.5A1.125 1.125 0 0 0 3.375 6.75v3.75m16.125 0H3.375" />
                        </svg>
                        <span>{{ $post->metadata->comment_count }}</span>
                        <span class="sr-only">{{ __('Comments') }}</span>
                    </div>

                    {{-- Shares --}}
                    <div class="flex items-center text-indigo-500 dark:text-indigo-400"> {{-- Changed color --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                        <span>{{ $post->metadata->share_count }}</span>
                        <span class="sr-only">{{ __('Shares') }}</span>
                    </div>

                    {{-- Favorites --}}
                    <div class="flex items-center text-amber-500 dark:text-amber-400"> {{-- Changed color --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.82.61l-4.725-2.885a.562.562 0 0 0-.652 0l-4.725 2.885a.562.562 0 0 1-.82-.61l1.285-5.385a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.499Z" />
                        </svg>
                        <span>{{ $post->metadata->favorite_count }}</span>
                        <span class="sr-only">{{ __('Favorites') }}</span>
                    </div>
                </div>
            </div>
        @endif

    </article>
@endsection
