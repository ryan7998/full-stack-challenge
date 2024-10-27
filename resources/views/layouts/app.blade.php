<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            {{-- @include('layouts.navigation') --}}
            {{-- @include('partials.navbar') --}}
        <x-nav />


            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            {{-- <main>
                {{ $slot }}
            </main> --}}
        
            <!-- Flash Messages -->
            @if(session('success'))
            <div x-data="{ show: true }" x-show="show" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg @click="show = false" class="fill-current h-6 w-6 text-green-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 001.697-1.697l-5.651-5.651 5.651-5.651a1.2 1.2 0 00-1.697-1.697L8 6.653 2.349.999a1.2 1.2 0 10-1.697 1.697L6.653 8l-5.651 5.651a1.2 1.2 0 001.697 1.697L8 9.347l5.651 5.651z"/>
                    </svg>
                </span>
            </div>
            @endif 

            @if(session('error'))
            <div x-data="{ show: true }" x-show="show" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg @click="show = false" class="fill-current h-6 w-6 text-red-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 001.697-1.697l-5.651-5.651 5.651-5.651a1.2 1.2 0 00-1.697-1.697L8 6.653 2.349.999a1.2 1.2 0 10-1.697 1.697L6.653 8l-5.651 5.651a1.2 1.2 0 001.697 1.697L8 9.347l5.651 5.651z"/>
                    </svg>
                </span>
            </div>
            @endif
    
            @yield('content')
        </div>
    </body>
</html>
