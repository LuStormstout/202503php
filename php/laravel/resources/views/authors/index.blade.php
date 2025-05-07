@extends('layouts.app')

@section('title', __('Authors'))

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ __('Authors') }}</h1>
        <a href="{{ route('authors.create') }}"
           class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Create New Author') }}
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-sm overflow-x-auto sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Name') }}
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Email') }}
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Bio') }}
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($authors as $author)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                        <a href="{{ route('authors.show', $author) }}" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                            {{ $author->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $author->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs">
                        {{ Str::limit($author->bio, 50) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="{{ route('authors.show', $author) }}"
                           class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">{{ __('View') }}</a>
                        <a href="{{ route('authors.edit', $author) }}"
                           class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-200">{{ __('Edit') }}</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this author? This might delete their posts too if cascade is set up.') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                        {{ __('No authors found.') }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if ($authors->hasPages())
        <div class="mt-6">
            {{ $authors->links() }} {{-- Make sure Tailwind pagination views are published: php artisan vendor:publish --tag=laravel-pagination --}}
        </div>
    @endif
@endsection
