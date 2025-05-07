@extends('layouts.app')

@section('title', __('Edit Tag') . ' - ' . $tag->name)

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">{{ __('Edit Tag') }}: {{ $tag->name }}</h1>

    <form action="{{ route('tags.update', $tag) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Name') }} <span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200 @error('name') border-red-500 @enderror">
            @error('name')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Slug') }} <span class="text-red-500">*</span></label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $tag->slug) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200 @error('slug') border-red-500 @enderror"
                   aria-describedby="slug-description">
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400" id="slug-description">
                {{ __('The slug should be unique and URL-friendly (e.g., "my-awesome-tag"). Consider if changing the slug will affect existing URLs.') }}
            </p>
            @error('slug')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Description') }}</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200 @error('description') border-red-500 @enderror">{{ old('description', $tag->description) }}</textarea>
            @error('description')
            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Update Tag') }}
            </button>
            <a href="{{ route('tags.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
@endsection
