<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Agent Portal - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
        h1,h2,h3,h4,h5,h6,.brand-font { font-family: 'Outfit', sans-serif; }
        .sidebar-active { background: #0f2441; color: white !important; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
      x-data="{ sidebarOpen: false }">

    <div x-show="sidebarOpen" @click="sidebarOpen=false" class="fixed inset-0 bg-black/40 z-40 lg:hidden" x-cloak></div>

    <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-[#0f2441] text-white transform transition-transform duration-300"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        <div class="flex items-center justify-between h-16 px-6 border-b border-white/10">
            <a href="{{ route('home') }}" class="flex items-center flex-shrink-0 px-2">
                <img src="{{ asset('images/logo.png') }}" alt="Onscholarship" class="h-8 w-auto object-contain brightness-0 invert">
            </a>
            <button @click="sidebarOpen=false" class="lg:hidden text-white/60 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="p-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#f15a24] text-white flex items-center justify-center font-bold text-lg shadow">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-bold text-sm">{{ auth()->user()->name }}</p>
                    @php
                        $agentApprovalStatus = auth()->user()?->agentProfile?->approval_status;
                    @endphp
                    @if($agentApprovalStatus === 'approved')
                        <p class="text-xs text-green-400 font-medium">● Verified Agent</p>
                    @elseif($agentApprovalStatus === 'rejected')
                        <p class="text-xs text-red-400 font-medium">● Approval Rejected</p>
                    @elseif($agentApprovalStatus === 'suspended')
                        <p class="text-xs text-red-300 font-medium">● Account Suspended</p>
                    @else
                        <p class="text-xs text-amber-300 font-medium">● Pending Approval</p>
                    @endif
                </div>
            </div>
        </div>

        <nav class="p-3 space-y-1 overflow-y-auto h-[calc(100vh-9rem)]">
            <p class="text-xs font-bold uppercase text-white/40 tracking-wider px-3 pt-3 pb-1">Agent Hub</p>
            <a href="{{ route('agent.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('agent.dashboard') ? 'bg-[#f15a24] text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Home
            </a>

            <div x-data="{ open: {{ request()->routeIs('agent.profile') || request()->routeIs('agent.sub-agencies.*') || request()->routeIs('agent.students.*') ? 'true' : 'false' }} }">
                <button @click="open = !open" 
                    class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium transition text-white/70 hover:bg-white/10 hover:text-white"
                    :class="open ? 'bg-white/5' : ''">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Users</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform text-white/20" :class="open ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
                
                <div x-show="open" x-cloak 
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    class="mt-1 ml-4 space-y-1 border-l border-white/10 pl-4 py-1">
                    <a href="{{ route('agent.managers.index') }}" 
                        class="block px-3 py-1.5 rounded-lg text-[13px] font-medium transition {{ request()->routeIs('agent.managers.*') ? 'text-[#f15a24]' : 'text-white/40 hover:text-white' }}">
                        Manager
                    </a>
                    <a href="{{ route('agent.agency.index') }}" 
                        class="block px-3 py-1.5 rounded-lg text-[13px] font-medium transition {{ request()->routeIs('agent.agency.*') ? 'text-[#f15a24]' : 'text-white/40 hover:text-white' }}">
                        Agency
                    </a>
                    <a href="{{ route('agent.students.index') }}" 
                        class="block px-3 py-1.5 rounded-lg text-[13px] font-medium transition {{ request()->routeIs('agent.students.*') ? 'text-[#f15a24]' : 'text-white/40 hover:text-white' }}">
                        Student
                    </a>
                </div>
            </div>

            <a href="{{ route('agent.programs.search') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('agent.programs.search') ? 'bg-[#f15a24] text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Find Programs
            </a>
            <a href="{{ route('agent.scholarships') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('agent.scholarships') ? 'bg-[#f15a24] text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.407 2.641 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.407-2.641-1M12 16v1m-7-4a4 4 0 118 0 4 4 0 01-8 0zM17 11a3 3 0 110 6 3 3 0 010-6z"/></svg>
                Scholarship
            </a>
            <a href="{{ route('agent.applications.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('agent.applications.*') ? 'bg-[#f15a24] text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Applications
            </a>

            <p class="text-xs font-bold uppercase text-white/40 tracking-wider px-3 pt-4 pb-1">Earnings</p>
            <a href="{{ route('agent.commissions.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('agent.commissions.*') ? 'bg-[#f15a24] text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.407 2.641 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.407-2.641-1M12 16v1m-7-4a4 4 0 118 0 4 4 0 01-8 0zM17 11a3 3 0 110 6 3 3 0 010-6z"/></svg>
                Commission
            </a>

            <div class="pt-4 border-t border-white/10 mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-900/20 transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <div class="lg:ml-64 min-h-screen">
        <header class="sticky top-0 z-40 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 h-16 flex items-center justify-between px-4 sm:px-6">
            <button @click="sidebarOpen=!sidebarOpen" class="lg:hidden text-gray-500 hover:text-[#f15a24] transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div class="flex items-center gap-3 ml-auto">
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
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border-l-4 border-green-500 rounded-r-lg text-green-700 dark:text-green-400 font-medium">
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
