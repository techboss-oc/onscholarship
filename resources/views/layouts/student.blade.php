<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Portal - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
        h1,h2,h3,h4,h5,h6,.brand-font { font-family: 'Outfit', sans-serif; }
        .sidebar-active { background: #f15a24; color: white !important; box-shadow: 0 4px 15px rgba(241,90,36,0.3); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
      x-data="{ sidebarOpen: false, darkMode: false }"
      x-init="if(localStorage.theme==='dark'){darkMode=true;document.documentElement.classList.add('dark')}else{darkMode=false;document.documentElement.classList.remove('dark')}"
      :class="{'dark':darkMode}">

    @if(session('registration_success_popup'))
        <div
            x-data="{ open: true }"
            x-init="setTimeout(() => open = false, 4500)"
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 z-[80] flex items-start justify-center px-4 pt-20 sm:items-center sm:pt-0"
            x-cloak
        >
            <div class="absolute inset-0 bg-[#0f172a]/55 backdrop-blur-sm" @click="open = false"></div>

            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                class="relative w-full max-w-md overflow-hidden rounded-[28px] border border-white/10 bg-white shadow-[0_25px_80px_rgba(15,23,42,0.28)] dark:bg-[#0f172a]"
            >
                <div class="absolute inset-x-0 top-0 h-1" style="background: linear-gradient(90deg, #1FA463 0%, #0D47A1 100%);"></div>

                <div class="p-6 sm:p-7">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-white shadow-lg" style="background: linear-gradient(135deg, #1FA463 0%, #0D47A1 100%);">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.24em] text-[#1FA463]">Success</p>
                                <h3 class="mt-1 text-xl font-black brand-font text-[#0f2441] dark:text-white">
                                    {{ session('registration_success_popup.title') }}
                                </h3>
                            </div>
                        </div>

                        <button
                            type="button"
                            @click="open = false"
                            class="rounded-full p-2 text-gray-400 transition hover:bg-gray-100 hover:text-gray-600 dark:hover:bg-white/10 dark:hover:text-white"
                            aria-label="Close success popup"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-5 text-sm sm:text-base leading-7 text-gray-600 dark:text-gray-300">
                        {{ session('registration_success_popup.message') }}
                    </p>

                    <div class="mt-6 flex items-center gap-3 rounded-2xl bg-[#f8fafc] px-4 py-3 text-sm font-medium text-[#0f2441] dark:bg-white/5 dark:text-white/85">
                        <span class="inline-flex h-2.5 w-2.5 rounded-full bg-[#1FA463]"></span>
                        You have been redirected to your student dashboard.
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen=false" class="fixed inset-0 bg-black/40 z-40 lg:hidden" x-cloak></div>

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 shadow-lg transform transition-transform duration-300"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        <div class="flex items-center justify-between h-16 px-6 border-b border-gray-100 dark:border-gray-700">
            <a href="{{ route('home') }}" class="flex items-center flex-shrink-0 px-2">
                <img src="{{ asset('images/logo.png') }}" alt="Onscholarship" class="h-8 w-auto object-contain dark:brightness-0 dark:invert">
            </a>
            <button @click="sidebarOpen=false" class="lg:hidden text-gray-400 hover:text-gray-600 dark:hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Student Info -->
        <div class="p-4 border-b border-gray-100 dark:border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#0f2441] to-blue-700 text-white flex items-center justify-center font-bold text-lg shadow">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-green-500 font-medium">● Active Student</p>
                </div>
            </div>
        </div>

        <nav class="p-3 space-y-1 overflow-y-auto h-[calc(100vh-9rem)]">
            <p class="text-xs font-bold uppercase text-gray-400 tracking-wider px-3 pt-3 pb-1">My Portal</p>
            <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.dashboard') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            <a href="{{ route('student.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.profile') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                My Profile
            </a>
            <a href="{{ route('student.applications.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.applications.*') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                My Applications
            </a>
            <a href="{{ route('student.wishlist.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.wishlist.index') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                My Wishlist
            </a>
            <a href="{{ route('student.documents') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.documents') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Documents
            </a>
            <a href="{{ route('student.programs.search') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.programs.search') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Find Programs
            </a>
            <a href="{{ route('student.scholarships') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('student.scholarships') ? 'sidebar-active' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-[#f15a24]' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.407 2.641 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.407-2.641-1M12 16v1m-7-4a4 4 0 118 0 4 4 0 01-8 0zM17 11a3 3 0 110 6 3 3 0 010-6z"/></svg>
                Scholarship
            </a>

            <div class="pt-4 border-t border-gray-100 dark:border-gray-700 mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Top Header -->
        <header class="sticky top-0 z-40 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 h-16 flex items-center justify-between px-4 sm:px-6">
            <button @click="sidebarOpen=!sidebarOpen" class="lg:hidden text-gray-500 hover:text-[#f15a24] transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div class="flex items-center gap-3 ml-auto">
                <button @click="darkMode=!darkMode;localStorage.theme=darkMode?'dark':'light';darkMode?document.documentElement.classList.add('dark'):document.documentElement.classList.remove('dark')"
                        class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-500 dark:text-gray-400">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg x-cloak x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>
                <a href="{{ route('notifications.index') }}" class="relative p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition text-gray-500 dark:text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="absolute top-1 right-2 flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500 border border-white dark:border-gray-800"></span>
                        </span>
                    @endif
                </a>
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300 ml-2 hidden md:block">{{ auth()->user()->name }}</span>
            </div>
        </header>

        <main class="p-4 sm:p-6">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 rounded-r-lg text-green-700 dark:text-green-400 font-medium" x-data="{show:true}" x-show="show" x-transition>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 rounded-r-lg text-red-700 dark:text-red-400 font-medium">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
