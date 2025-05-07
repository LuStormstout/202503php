@extends('layouts.app')

@section('title', __('Edit Post') . ' - ' . $post->title)

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">{{ __('Edit Post') }}: {{ $post->title }}</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Title') }} <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200 @error('title') border-red-500 @enderror">
            @error('title')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Content') }} <span class="text-red-500">*</span></label>
            <textarea name="content" id="content" rows="10" required
                      class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200 @error('content') border-red-500 @enderror">{{ old('content', $post->content) }}</textarea>
            @error('content')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Author') }} <span class="text-red-500">*</span></label>
            <select name="author_id" id="author_id" required
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-gray-200 @error('author_id') border-red-500 @enderror">
                <option value="">{{ __('Select an Author') }}</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Slug is usually generated automatically from title.
            If you want to allow manual slug, uncomment this.
       <div>
           <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Slug') }} <span class="text-red-500">*</span></label>
           <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" required
                  class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200 @error('slug') border-red-500 @enderror">
           @error('slug')
               <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
           @enderror
       </div>
       --}}

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Status') }} <span class="text-red-500">*</span></label>
            <select name="status" id="status" required
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-gray-200 @error('status') border-red-500 @enderror">
                <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>{{ __('Published') }}</option>
                <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>{{ __('Draft') }}</option>
                <option value="2" {{ old('status', $post->status) == 2 ? 'selected' : '' }}>{{ __('Hidden') }}</option>
            </select>
            @error('status')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- If you want to add Tag selection here, you'll need to pass $tags to this view
             and implement a multi-select input.
        <div>
            <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Tags') }}</label>
            <select name="tags[]" id="tags" multiple
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-gray-700 dark:text-gray-200">
                @php $currentTags = old('tags', $post->tags->pluck('id')->toArray()); @endphp
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $currentTags) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        --}}

        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Update Post') }}
            </button>
            <a href="{{ route('posts.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
@endsection
