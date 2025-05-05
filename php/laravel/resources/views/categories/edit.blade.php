{{-- resources/views/categories/edit.blade.php --}}

@extends('layouts.app')

{{-- 设置页面标题 - 包含正在编辑的分类名称 --}}
@section('title', __('Edit Category') . ': ' . $category->name)

@section('content')
    <div class="flex justify-between items-center mb-6">
        {{-- 在标题中使用实际的分类名称 --}}
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Edit Category') }}: <span class="font-bold">{{ $category->name }}</span>
        </h1>
        <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-200 dark:focus:ring-gray-700 active:bg-gray-500 dark:active:bg-gray-400 disabled:opacity-25 transition">
            {{ __('Back to List') }}
        </a>
    </div>

    {{-- 更新分类的表单 --}}
    {{-- action 指向 update 路由，传递 category 实例 --}}
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf {{-- CSRF 保护 --}}
        @method('PUT') {{-- 用于 UPDATE 的方法欺骗 (使用 PUT 或 PATCH) --}}

        <div class="space-y-6">
            {{-- 分类名称字段 --}}
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">
                    {{ __('Category Name') }} <span class="text-red-600">*</span>
                </label>
                {{-- 使用 old() 辅助函数，回退到分类的当前名称 --}}
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                       class="block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:border-indigo-600 dark:focus:ring-indigo-700 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('name') border-red-500 dark:border-red-400 @enderror">
                {{-- 显示 'name' 的验证错误 --}}
                @error('name')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- 表单操作 --}}
            <div class="flex items-center justify-end pt-4 border-t border-gray-200 dark:border-gray-700 mt-6">
                <a href="{{ route('categories.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 mr-4">
                    {{ __('Cancel') }}
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-700 disabled:opacity-25 transition dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus:ring-indigo-600">
                    {{ __('Update Category') }}
                </button>
            </div>
        </div>
    </form>
@endsection

{{-- 可选：添加页面特定的样式或脚本 --}}
@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('css/custom-category-form.css') }}"> --}}
@endpush

@push('scripts')
    {{-- <script src="{{ asset('js/custom-category-form.js') }}"></script> --}}
@endpush
