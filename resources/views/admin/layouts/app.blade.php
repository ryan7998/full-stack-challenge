<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false }" x-bind:class="{ 'dark': darkMode }" 
    x-init="darkMode = localStorage.getItem('darkMode') === 'true' || false">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Alpine.js CDN -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-900 transition-colors duration-300">
    <x-nav />
    <!-- Content -->
    <div class="container mx-auto py-8">
        <!-- Dark Mode Toggle Button -->
        <div class="fixed top-50 right-4 z-50">
            <button
                @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                class="flex items-center justify-center w-10 h-10 bg-white dark:bg-gray-700 rounded-full shadow-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-300 focus:outline-none"
                aria-label="Toggle Dark Mode"
            >
                <template x-if="!darkMode">
                    <!-- Sun Icon for Light Mode -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-8.66h-1M4.34 12.34h-1m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.02 0l-.707.707M6.343 17.657l-.707.707M12 5a7 7 0 100 14 7 7 0 000-14z" />
                    </svg>
                </template>
                <template x-if="darkMode">
                    <!-- Moon Icon for Dark Mode -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                    </svg>
                </template>
            </button>
        </div>

        @yield('content')
    </div>

    <!-- Alpine.js Mobile Menu Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                open: false,
            }))
        })

        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        });
    </script>
</body>
</html>
