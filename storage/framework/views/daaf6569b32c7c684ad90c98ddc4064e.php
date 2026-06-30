<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Onscholarship')); ?> - <?php echo $__env->yieldContent('title', 'Connecting Africa to Quality Education in China'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Connecting Africa to Quality Education in China. Providing comprehensive admission processing, scholarship placement, and visa assistance.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'Onscholarship, Study in China, Scholarships, International Students'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e(config('app.name', 'Onscholarship')); ?> - <?php echo $__env->yieldContent('title', 'Welcome'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Connecting Africa to Quality Education in China.'); ?>">
    <?php if (! empty(trim($__env->yieldContent('og_image')))): ?>
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image'); ?>"><?php endif; ?>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:400,500,600,700,800,900" rel="stylesheet" />
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Prevent flash of wrong theme before Alpine loads -->
    <script>
        (function() {
            var dark = localStorage.theme === 'dark' ||
                (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme:dark)').matches);
            if (dark) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        })();
    </script>

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

        .glass {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .dark .glass {
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* nav active underline */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 2px;
            background: #1FA463;
            transition: width .25s ease;
            border-radius: 2px;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        /* Mobile menu slide-in from right */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: min(320px, 85vw);
            transform: translateX(100%);
            transition: transform .35s cubic-bezier(.4, 0, .2, 1);
            z-index: 200;
            display: flex;
            flex-direction: column;
            box-shadow: -8px 0 40px rgba(0, 0, 0, .18);
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 199;
            opacity: 0;
            pointer-events: none;
            transition: opacity .3s ease;
        }

        .mobile-overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        /* Stat card float animation */
        @keyframes floatUp {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        .float-1 {
            animation: floatUp 4s ease-in-out infinite;
        }

        .float-2 {
            animation: floatUp 5s ease-in-out infinite .8s;
        }

        .float-3 {
            animation: floatUp 4.5s ease-in-out infinite 1.2s;
        }

        .float-4 {
            animation: floatUp 5.5s ease-in-out infinite .4s;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity .5s ease;
        }

        .dark #preloader {
            background: #0b1120;
        }

        .loader-ring {
            width: 48px;
            height: 48px;
            border: 4px solid #f0f0f0;
            border-top: 4px solid #1FA463;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Hero blue blob */
        .hero-blob {
            position: absolute;
            top: -5%;
            right: -5%;
            width: 55%;
            padding-bottom: 70%;
            background: linear-gradient(145deg, #dbeafe 0%, #bfdbfe 35%, #d1fae5 100%);
            border-radius: 40% 60% 60% 40% / 50% 40% 60% 50%;
            z-index: 0;
            opacity: .75;
        }

        .dark .hero-blob {
            background: linear-gradient(145deg, #1e3a5f 0%, #0f2441 50%, #0d3321 100%);
            opacity: .5;
        }
    </style>
</head>

<body class="font-sans antialiased bg-white dark:bg-[#0b1120] text-gray-900 dark:text-gray-100 transition-colors duration-300"
    x-data="{ mobileOpen: false, darkMode: localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }">

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader-ring"></div>
    </div>
    <script>
        // Simple preloader that works everywhere
        function hidePreloader() {
            const pl = document.getElementById('preloader');
            if (pl) {
                pl.style.opacity = '0';
                setTimeout(() => {
                    pl.style.display = 'none';
                }, 500);
            }
        }
        // Hide when DOM is ready OR after 3 seconds as fallback
        document.addEventListener('DOMContentLoaded', () => setTimeout(hidePreloader, 300));
        setTimeout(hidePreloader, 3000); // Fallback to hide after 3 seconds no matter what
    </script>

    <!-- ============================================================
         HEADER
    ============================================================ -->
    <header class="fixed w-full z-50 transition-all duration-400 top-4 px-4 sm:px-6 lg:px-8"
        x-data="{ scrolled: false }"
        @scroll.window="scrolled = window.pageYOffset > 10">

        <div class="max-w-7xl mx-auto rounded-3xl transition-all duration-500 border"
            :class="scrolled
                 ? 'bg-[#0D1F3C]/95 dark:bg-[#070e1a]/95 backdrop-blur-2xl shadow-2xl border-white/10 py-2.5 px-6'
                 : 'bg-[#0D1F3C]/80 dark:bg-[#070e1a]/80 backdrop-blur-xl shadow-xl border-white/10 py-3.5 px-6'">
            <div class="flex items-center justify-between gap-4">

                <!-- LOGO -->
                <a href="<?php echo e(route('home')); ?>" class="flex items-center flex-shrink-0">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Onscholarship" class="h-10 w-auto object-contain" style="filter: brightness(0) invert(1);">
                </a>

                <!-- DESKTOP NAV -->
                <nav class="hidden lg:flex items-center gap-8 font-medium text-sm flex-1 justify-center whitespace-nowrap">
                    <?php
                    $navLinks = [
                    ['route' => 'home', 'label' => 'Home', 'match' => 'home'],
                    ['route' => 'universities.index','label' => 'Universities', 'match' => 'universities.*'],
                    ['route' => 'programs.index', 'label' => 'Programs', 'match' => 'programs.*'],
                    ['route' => 'scholarships.index','label' => 'Scholarships', 'match' => 'scholarships.*'],
                    ['route' => 'services', 'label' => 'Services', 'match' => 'services'],
                    ['route' => 'about', 'label' => 'About Us', 'match' => 'about'],
                    ['route' => 'blog.index', 'label' => 'Blog', 'match' => 'blog.*'],
                    ['route' => 'contact', 'label' => 'Contact', 'match' => 'contact'],
                    ];
                    ?>
                    <?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($link['route'])); ?>"
                        class="nav-link transition-colors pb-0.5 <?php echo e(request()->routeIs($link['match']) ? 'text-white font-bold active' : 'text-white/65 hover:text-white'); ?>">
                        <?php echo e($link['label']); ?>

                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>

                <!-- RIGHT ACTIONS (desktop) -->
                <div class="hidden md:flex items-center gap-3 flex-shrink-0">
                    <!-- Globe/Language -->
                    <button title="Language" class="flex items-center justify-center text-white/60 hover:text-white transition pr-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </button>

                    <!-- Dark mode pill toggle -->
                    <div class="flex items-center gap-2">
                        <button @click="darkMode = !darkMode; localStorage.theme = darkMode ? 'dark' : 'light'; if(darkMode) { document.documentElement.classList.add('dark') } else { document.documentElement.classList.remove('dark') }"
                            class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-[#0D47A1] focus:ring-offset-2"
                            :class="darkMode ? 'bg-slate-700' : 'bg-[#0D47A1]'">
                            <span class="sr-only">Toggle Dark Mode</span>
                            <span :class="darkMode ? 'translate-x-6' : 'translate-x-1'"
                                class="inline-flex h-4 w-4 transform items-center justify-center rounded-full bg-white shadow transition-transform duration-300">
                                <svg x-show="!darkMode" class="w-2.5 h-2.5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a1 1 0 011 1v1a1 1 0 01-2 0V3a1 1 0 011-1zm3.536 1.464a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 010-2h1a1 1 0 011 1zm-2.93 5.657a1 1 0 01-1.414 0l-.707-.707a1 1 0 011.414-1.414l.707.707a1 1 0 010 1.414zM10 18a1 1 0 01-1-1v-1a1 1 0 012 0v1a1 1 0 01-1 1zm-5.657-2.93a1 1 0 010-1.414l.707-.707a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414 0zM4 10a1 1 0 011-1h1a1 1 0 010 2H5a1 1 0 01-1-1zm1.757-5.657a1 1 0 011.414 0l.707.707A1 1 0 016.464 6.464l-.707-.707a1 1 0 010-1.414zM10 7a3 3 0 100 6 3 3 0 000-6z" fill-rule="evenodd" clip-rule="evenodd" />
                                </svg>
                                <svg x-cloak x-show="darkMode" class="w-2.5 h-2.5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                </svg>
                            </span>
                        </button>
                    </div>

                    <!-- Login / CTA -->
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="font-bold text-[13px] uppercase tracking-wide text-white rounded-full px-5 py-2 hover:opacity-90 transition flex-shrink-0" style="background:#0D47A1; box-shadow:0 4px 10px rgba(13,71,161,.2);">Dashboard</a>
                    <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="font-bold text-sm text-white/70 hover:text-white transition px-2">Log in</a>
                    <a href="<?php echo e(route('register')); ?>" class="font-bold text-[13px] uppercase tracking-wide text-white rounded-full px-5 py-2 hover:opacity-90 transition flex-shrink-0" style="background:#1FA463; box-shadow:0 4px 10px rgba(31,164,99,.25);">Apply Now</a>
                    <?php endif; ?>
                </div>

                <!-- MOBILE HAMBURGER -->
                <button @click="mobileOpen = true"
                    class="lg:hidden p-2 rounded-xl text-white/70 hover:text-white hover:bg-white/10 transition focus:outline-none"
                    aria-label="Open menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-overlay" :class="{ 'open': mobileOpen }" @click="mobileOpen = false"></div>

    <!-- Mobile Menu Panel -->
    <div class="mobile-menu" :class="{ 'open': mobileOpen, 'bg-[#0f172a]': $store.theme.dark, 'bg-white': !$store.theme.dark }" role="dialog" aria-modal="true">

        <!-- Panel Header with gradient strip -->
        <div class="flex items-center justify-between px-5 py-4 bg-[#0D1F3C]/95 border-b border-white/10">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Onscholarship" class="h-10 w-auto object-contain" style="filter: brightness(0) invert(1);">
            </a>
            <button @click="mobileOpen = false"
                class="p-2 rounded-xl transition text-white/70 hover:bg-white/10 hover:text-white"
                aria-label="Close menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Nav Links -->
        <nav class="flex-1 overflow-y-auto px-3 py-5 space-y-1">
            <?php $__currentLoopData = $navLinks ?? [['route'=>'home','label'=>'Home','match'=>'home'],['route'=>'universities.index','label'=>'Universities','match'=>'universities.*'],['route'=>'programs.index','label'=>'Programs','match'=>'programs.*'],['route'=>'scholarships.index','label'=>'Scholarships','match'=>'scholarships.*'],['route'=>'services','label'=>'Services','match'=>'services'],['route'=>'about','label'=>'About Us','match'=>'about'],['route'=>'blog.index','label'=>'Blog','match'=>'blog.*'],['route'=>'contact','label'=>'Contact','match'=>'contact']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($link['route'])); ?>"
                @click="mobileOpen = false"
                class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-sm transition-all
                          <?php echo e(request()->routeIs($link['match'])
                              ? 'bg-blue-600 text-white shadow-sm shadow-blue-200'
                              : ''); ?>"
                :class="!<?php echo e(request()->routeIs($link['match']) ? 'true' : 'false'); ?> && ($store.theme.dark ? 'text-gray-300 hover:bg-white/10 hover:text-white' : 'text-gray-600 hover:bg-blue-50 hover:text-[#0D47A1]')">
                <span class="w-1.5 h-1.5 rounded-full flex-shrink-0
                                <?php echo e(request()->routeIs($link['match']) ? 'bg-white' : 'bg-gray-300'); ?>"></span>
                <?php echo e($link['label']); ?>

                <?php if(request()->routeIs($link['match'])): ?>
                <svg class="ml-auto w-4 h-4 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
                <?php endif; ?>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>

        <!-- Panel Footer -->
        <div class="px-5 py-5 space-y-3"
            :class="$store.theme.dark ? 'border-t border-white/10 bg-[#0b1120]' : 'border-t border-gray-100 bg-gray-50'">
            <!-- Dark mode row -->
            <div class="flex items-center justify-between mb-1">
                <span class="text-sm font-semibold" :class="$store.theme.dark ? 'text-gray-300' : 'text-gray-600'">Dark Mode</span>
                <button @click="$store.theme.toggle()"
                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-300 focus:outline-none"
                    :class="$store.theme.dark ? 'bg-indigo-600' : 'bg-[#0D47A1]'">
                    <span :class="$store.theme.dark ? 'translate-x-6' : 'translate-x-1'"
                        class="inline-flex h-4 w-4 transform items-center justify-center rounded-full bg-white shadow transition-transform duration-300">
                        <svg x-show="!$store.theme.dark" class="w-2.5 h-2.5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 01-2 0V3a1 1 0 011-1zm3.536 1.464a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 010-2h1a1 1 0 011 1zm-2.93 5.657a1 1 0 01-1.414 0l-.707-.707a1 1 0 011.414-1.414l.707.707a1 1 0 010 1.414zM10 18a1 1 0 01-1-1v-1a1 1 0 012 0v1a1 1 0 01-1 1zm-5.657-2.93a1 1 0 010-1.414l.707-.707a1 1 0 011.414 1.414l-.707.707a1 1 0 01-1.414 0zM4 10a1 1 0 011-1h1a1 1 0 010 2H5a1 1 0 01-1-1zm1.757-5.657a1 1 0 011.414 0l.707.707A1 1 0 016.464 6.464l-.707-.707a1 1 0 010-1.414zM10 7a3 3 0 100 6 3 3 0 000-6z" fill-rule="evenodd" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="$store.theme.dark" class="w-2.5 h-2.5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </span>
                </button>
            </div>

            <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('dashboard')); ?>" class="block w-full text-center font-bold text-white rounded-xl py-3 text-sm hover:opacity-90 transition" style="background:#0D47A1;">Go to Dashboard</a>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="block w-full text-center font-bold rounded-xl py-3 text-sm transition border-2"
                :class="$store.theme.dark ? 'text-blue-400 border-blue-600 hover:bg-blue-900/30' : 'text-[#0D47A1] border-[#0D47A1] hover:bg-blue-50'">Log In</a>
            <a href="<?php echo e(route('register')); ?>" class="block w-full text-center font-bold text-white rounded-xl py-3 text-sm hover:opacity-90 transition" style="background:#1FA463; box-shadow:0 4px 14px rgba(31,164,99,.35);">Apply Now — It's Free</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- ============================================================
         MAIN CONTENT
    ============================================================ -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo e($slot ?? ''); ?>

    </main>

    <!-- ============================================================
         FOOTER
    ============================================================ -->
    <footer style="background:#0f172a;" class="relative z-10 text-white pt-20 pb-8 border-t-4 border-[#1FA463]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-14">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center mb-5">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Onscholarship" class="h-12 w-auto object-contain" style="filter: brightness(0) invert(1);">
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed">Connecting Africa to Quality Education in China. Comprehensive admission processing, scholarship placement, and visa assistance.</p>
                    <!-- Social Icons row -->
                    <div class="flex gap-3 mt-6">
                        <?php $__currentLoopData = [['M24 4.56C13.26 4.56 4.56 13.26 4.56 24c0 8.6 5.56 15.92 13.28 18.52v-13.1H13.1V24h4.74v-4.12c0-4.68 2.78-7.26 7.04-7.26 2.04 0 4.16.36 4.16.36v4.58h-2.34c-2.3 0-3.02 1.44-3.02 2.9V24h5.14l-.82 5.42h-4.32V42.52C34.44 39.92 40 32.6 40 24c0-10.74-8.7-19.44-16-19.44z','facebook'],['M22.46 6c-7.14.32-12.86 6.08-12.86 13.26 0 7.36 5.96 13.34 13.32 13.34a13.18 13.18 0 0013.3-11.62c.08-.58.12-1.18.12-1.74C36.34 11.96 30.1 6 22.46 6zm0 23.86c-5.86 0-10.62-4.76-10.62-10.6a10.6 10.6 0 0121.2 0c0 5.84-4.76 10.6-10.58 10.6zM29.9 7.06l-2.82 2.82a9.42 9.42 0 000 13.3l2.82 2.82a13.24 13.24 0 000-18.94z','instagram']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="#" class="w-9 h-9 rounded-xl border border-gray-700 flex items-center justify-center text-gray-400 hover:border-[#1FA463] hover:text-[#1FA463] transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 48 48">
                                <path d="<?php echo e($icon[0]); ?>" />
                            </svg>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold brand-font text-base mb-5 flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-[#1FA463] rounded"></span>Quick Links
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <?php $__currentLoopData = [['home','Home'],['about','About Us'],['universities.index','Universities'],['scholarships.index','Scholarships'],['programs.index','Programs']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$r,$l]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route($r)); ?>" class="text-gray-400 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all group">
                                <svg class="w-3 h-3 text-[#1FA463] opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                </svg>
                                <?php echo e($l); ?>

                            </a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-white font-bold brand-font text-base mb-5 flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-[#1FA463] rounded"></span>Services
                    </h4>
                    <ul class="space-y-3 text-sm">
                        <?php $__currentLoopData = ['Admission Processing','Scholarship Placement','Visa Assistance','Document Translation','Agent Partnership']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('services')); ?>" class="text-gray-400 hover:text-white hover:translate-x-1 inline-flex items-center gap-2 transition-all group">
                                <svg class="w-3 h-3 text-[#1FA463] opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                </svg>
                                <?php echo e($svc); ?>

                            </a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-bold brand-font text-base mb-5 flex items-center gap-2">
                        <span class="w-4 h-0.5 bg-[#1FA463] rounded"></span>Contact Us
                    </h4>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/5 border border-gray-700 flex items-center justify-center flex-shrink-0 mt-0.5" style="color:#1FA463;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span>Haikou, Hainan Province, China</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/5 border border-gray-700 flex items-center justify-center flex-shrink-0 mt-0.5" style="color:#1FA463;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <a href="mailto:info@hainansendus.com" class="hover:text-white transition">info@hainansendus.com</a>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-white/5 border border-gray-700 flex items-center justify-center flex-shrink-0 mt-0.5" style="color:#1FA463;">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <span>+86 123 456 7890</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="border-t border-gray-800 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>&copy; <?php echo e(date('Y')); ?> Onscholarship Co., Ltd. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="<?php echo e(route('sitemap')); ?>" class="hover:text-white transition">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 750,
            once: true,
            offset: 60
        });
    </script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <?php echo $__env->make('components.cookie-consent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\laragon\www\hainan\resources\views/layouts/guest.blade.php ENDPATH**/ ?>