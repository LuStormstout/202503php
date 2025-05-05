{{-- resources/views/categories/index.blade.php --}}

@extends('layouts.app')

{{-- Set the page title --}}
@section('title', __('Categories'))

@section('content')
    {{-- Header Section: Title and Add New Button --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ __('Categories') }}</h1>
        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-700 disabled:opacity-25 transition dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus:ring-indigo-600">
            {{ __('Add New Category') }}
        </a>
    </div>

    {{-- Check if there are categories to display --}}
    @if($categories->isNotEmpty())
        {{-- Container with shadow, rounded corners, and horizontal scroll for smaller screens --}}
        <div class="shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                {{-- Table Header --}}
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                <tr>
                    {{-- ID Header --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('ID') }}
                    </th>
                    {{-- Name Header --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('Name') }}
                    </th>
                    {{-- Created At Header --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider whitespace-nowrap">
                        {{ __('Created At') }}
                    </th>
                    {{-- Updated At Header --}}
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider whitespace-nowrap">
                        {{ __('Updated At') }}
                    </th>
                    {{-- Actions Header --}}
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('Actions') }}
                    </th>
                </tr>
                </thead>
                {{-- Table Body --}}
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                {{-- Loop through each category --}}
                @foreach($categories as $category)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150 ease-in-out">
                        {{-- ID Cell --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-600 dark:text-gray-400">
                            #{{ $category->id }}
                        </td>
                        {{-- Name Cell --}}
                        <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ $category->name }}
                        </td>
                        {{-- Created At Cell --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                            {{ $category->created_at->format('Y-m-d H:i') }}
                        </td>
                        {{-- Updated At Cell --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">
                            {{ $category->updated_at->format('Y-m-d H:i') }}
                        </td>
                        {{-- Actions Cell --}}
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex space-x-2 items-center justify-end">
                                {{-- View Products Button (Optional) --}}
                                @if(Route::has('categories.show'))
                                    <a href="{{ route('categories.show', $category) }}" title="{{ __('View Products') }}" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 dark:border-gray-600 shadow-sm text-xs font-medium rounded text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        {{ __('View') }}
                                    </a>
                                @endif

                                {{-- Edit Button --}}
                                <a href="{{ route('categories.edit', $category) }}" title="{{ __('Edit Category') }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-800">
                                    {{ __('Edit') }}
                                </a>

                                {{-- Delete Button Form --}}
                                <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline"
                                      onsubmit="return confirm('{{ __('Are you sure you want to delete the category') }} \'{{ addslashes($category->name) }}\'? {{ __('This action cannot be undone.') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="{{ __('Delete Category') }}" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-offset-gray-800">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- Pagination Links - Placed outside the table container div --}}
            @if ($categories->hasPages())
                <div class="px-6 py-3 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-200 dark:border-gray-700 rounded-b-lg">
                    {{ $categories->links() }}
                </div>
            @endif
        </div> {{-- End of table container div --}}

    @else
        {{-- Message when no categories are found --}}
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative dark:bg-blue-900/30 dark:border-blue-600 dark:text-blue-300" role="alert">
            <strong class="font-bold">{{ __('Heads up!') }}</strong>
            <span class="block sm:inline"> {{ __('No categories found. You can add one using the button above.') }}</span>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        // You could add more sophisticated confirmation logic here if needed
        console.log('Category index page loaded.');
    </script>
@endpush
