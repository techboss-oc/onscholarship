<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Onscholarship') }} – @yield('title', 'Sign In')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:400,500,600,700,800,900" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Prevent flash of wrong theme --}}
    <script>
        (function(){
            var dark = localStorage.theme === 'dark' ||
                       (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme:dark)').matches);
            if(dark) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        })();
    </script>

    <style>
        [x-cloak] { display: none !important; }
        *, *::before, *::after { box-sizing: border-box; }
        body  { font-family: 'Inter', sans-serif; }
        h1,h2,h3,h4,h5,h6,.brand-font { font-family: 'Outfit', sans-serif; }
    </style>
</head>

<body class="min-h-full font-sans antialiased bg-white dark:bg-[#0b1120] text-gray-900 dark:text-gray-100 flex flex-col"
      x-data="{ darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }">

    {{-- Minimal auth header --}}
    <header class="absolute top-0 inset-x-0 z-20 flex items-center justify-between px-8 py-5">
        <a href="{{ route('home') }}" class="flex items-center flex-shrink-0">
            <img src="{{ asset('images/logo.png') }}" alt="Onscholarship" class="h-9 w-auto object-contain">
        </a>

        {{-- Dark mode toggle --}}
        <button @click="darkMode = !darkMode; localStorage.theme = darkMode ? 'dark' : 'light'; darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')"
                class="inline-flex h-8 w-14 items-center rounded-full transition-colors duration-300 focus:outline-none"
                :class="darkMode ? 'bg-slate-700' : 'bg-[#0D47A1]'">
            <span class="sr-only">Toggle Dark Mode</span>
            <span :class="darkMode ? 'translate-x-7' : 'translate-x-1'"
                  class="inline-flex h-6 w-6 transform items-center justify-center rounded-full bg-white shadow transition-transform duration-300">
                <svg x-show="!darkMode" class="w-3.5 h-3.5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 01-2 0V3a1 1 0 011-1zm3.536 1.464a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 010-2h1a1 1 0 011 1zm-2.93 5.657a1 1 0 01-1.414 0l-.707-.707a1 1 0 011.414-1.414l.707.707a1 1 0 010 1.414zM10 18a1 1 0 01-1-1v-1a1 1 0 012 0v1a1 1 0 01-1 1zm-5.657-2.93a1 1 0 010-1.414l.707-.707a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414 0zM4 10a1 1 0 011-1h1a1 1 0 010 2H5a1 1 0 01-1-1zm1.757-5.657a1 1 0 011.414 0l.707.707A1 1 0 016.464 6.464l-.707-.707a1 1 0 010-1.414zM10 7a3 3 0 100 6 3 3 0 000-6z" fill-rule="evenodd" clip-rule="evenodd"/>
                </svg>
                <svg x-cloak x-show="darkMode" class="w-3.5 h-3.5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                </svg>
            </span>
        </button>
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
