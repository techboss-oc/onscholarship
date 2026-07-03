<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Onscholarship') }} – @yield('title', 'Sign In')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:400,500,600,700,800,900" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .brand-font {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="min-h-full font-sans antialiased bg-white text-gray-900 flex flex-col">

    {{-- Minimal auth header --}}
    <header class="absolute top-0 inset-x-0 z-20 flex items-center justify-between px-8 py-5">
        <a href="{{ route('home') }}" class="flex items-center flex-shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Onscholarship" class="h-9 w-auto object-contain">
        </a>

    </header>

    {{-- Page content --}}
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Minimal footer --}}
    <footer class="relative z-10 py-6 text-center">
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 text-xs text-gray-400 dark:text-gray-600">
            <span>&copy; {{ date('Y') }} Onscholarship Education Co., Ltd. All rights reserved.</span>
            <span class="hidden sm:inline text-gray-300 dark:text-gray-700">·</span>
            <div class="flex gap-4">
                <a href="#" class="hover:text-gray-600 dark:hover:text-gray-400 transition">Privacy Policy</a>
                <a href="#" class="hover:text-gray-600 dark:hover:text-gray-400 transition">Terms of Service</a>
                <a href="{{ route('home') }}" class="hover:text-gray-600 dark:hover:text-gray-400 transition">Back to Site</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>