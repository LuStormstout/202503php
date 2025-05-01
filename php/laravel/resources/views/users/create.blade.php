{{-- 文件路径: resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center min-h-[calc(100vh-15rem)] sm:justify-center pt-6 sm:pt-0">

        {{-- Registration Form Card --}}
        <div class="w-full sm:max-w-lg mt-6 px-8 py-10 bg-white dark:bg-gray-800 shadow-xl overflow-hidden sm:rounded-lg">

            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-8">
                {{ __('Create Your Account') }}
            </h2>

            {{-- Display General Validation Errors --}}
            @if ($errors->any())
                <div class="mb-4 font-medium text-sm text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900 border border-red-300 dark:border-red-700 p-3 rounded" role="alert">
                    {{-- <p class="font-bold">{{ __('Whoops! Something went wrong.') }}</p> --}}
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('Full Name') }} <span class="text-red-500">*</span>
                    </label>
                    <input id="name"
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-white dark:text-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md placeholder-gray-400 @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           autocomplete="name"
                           placeholder="Enter your full name" />
                    @error('name')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('Email Address') }} <span class="text-red-500">*</span>
                    </label>
                    <input id="email"
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-white dark:text-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md placeholder-gray-400 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           placeholder="you@example.com" />
                    @error('email')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('Password') }} <span class="text-red-500">*</span>
                    </label>
                    <input id="password"
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-white dark:text-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md placeholder-gray-400 @error('password') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                           type="password"
                           name="password"
                           required
                           autocomplete="new-password"
                           placeholder="Choose a strong password" />
                    @error('password')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400" role="alert">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Minimum 8 characters recommended.</p>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">
                        {{ __('Confirm Password') }} <span class="text-red-500">*</span>
                    </label>
                    <input id="password_confirmation"
                           class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 dark:bg-white dark:text-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-1 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md placeholder-gray-400 @error('password_confirmation') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           placeholder="Enter the password again" />
                    @error('password_confirmation')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="mt-6">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 disabled:opacity-50 transition ease-in-out duration-150">
                        {{ __('Register') }}
                    </button>
                </div>

                {{-- Link to Login Page --}}
                <div class="text-center mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:underline">
                            {{ __('Log in here') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
