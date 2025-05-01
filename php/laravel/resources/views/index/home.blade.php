{{-- 继承基础布局 --}}
@extends('layouts.app')

{{-- 定义页面标题 (可选, 如果布局中没有设置或想覆盖) --}}
{{-- @section('title', 'Home Page - ' . config('app.name')) --}}

{{-- 定义页面主要内容 --}}
@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
            Welcome to {{ config('app.name', 'Your Application') }}!
        </h1>

        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">
            This is the home page of your awesome Laravel 12 application styled with Tailwind CSS.
        </p>

        {{-- 根据认证状态显示不同内容 --}}
        @auth
            {{-- 用户已登录 --}}
            <div
                class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300 p-4 mb-6 inline-block text-left rounded"
                role="alert">
                <p class="font-bold">Hello, {{ Auth::user()->name }}!</p>
                <p>You are successfully logged in.</p>
                <p class="mt-2">
                    You can view your <a href="{{ route('users.show', ['id' => Auth::id()]) }}"
                                         class="font-medium text-green-800 dark:text-green-200 hover:underline">profile
                        here</a>.
                </p>
            </div>
        @else
            {{-- 用户未登录 (访客) --}}
            <div
                class="bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-500 text-blue-700 dark:text-blue-300 p-4 mb-6 inline-block text-left rounded"
                role="alert">
                <p>Looks like you're visiting as a guest.</p>
                <p class="mt-2">
                    <a href="{{ route('login') }}" class="font-medium text-blue-800 dark:text-blue-200 hover:underline">Login</a>
                    or
                    <a href="{{ route('register') }}"
                       class="font-medium text-blue-800 dark:text-blue-200 hover:underline">Register</a>
                    to access more features!
                </p>
            </div>
        @endauth

        {{-- 可以添加其他主页内容，例如功能介绍、链接等 --}}
        <div class="mt-10 text-left max-w-2xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-3">What you can do:</h2>
            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2">
                <li>Browse the site content.</li>
                <li>Register for a new user account.</li>
                <li>Login with your existing credentials.</li>
                <li>View user profiles (requires login for specific details).</li>
                <li>Logout when you are finished.</li>
            </ul>
        </div>

        {{-- 示例按钮/链接 --}}
        <div class="mt-10">
            <a href="{{ route('register') }}"
               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                Get Started
            </a>
        </div>

    </div>
@endsection

{{-- 如果需要为此页面添加特定的 CSS 或 JS --}}
{{-- @push('styles')
<style>
    /* Home page specific styles */
</style>
@endpush --}}

{{-- @push('scripts')
<script>
    console.log('Home page JavaScript loaded!');
</script>
@endpush --}}
