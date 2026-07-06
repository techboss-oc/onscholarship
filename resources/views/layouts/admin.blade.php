<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark" data-force-dark="1">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Onscholarship') }} - Admin Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|outfit:400,500,600,700,800,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        (function() {
            document.documentElement.dataset.forceDark = '1';
            document.documentElement.classList.add('dark');
            try {
                localStorage.theme = 'dark';
            } catch (e) {}

            document.addEventListener('DOMContentLoaded', function() {
                document.documentElement.dataset.forceDark = '1';
                document.documentElement.classList.add('dark');
                document.body.classList.add('dark');
                try {
                    localStorage.theme = 'dark';
                } catch (e) {}
            });
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

        /* =====================================================
           LIGHT MODE — Premium White + Navy Design System
        ===================================================== */
        :root {
            --bg-page: #f0f4f9;
            --bg-sidebar: #ffffff;
            --bg-card: #ffffff;
            --text-primary: #0f2441;
            --text-secondary: #4b5f7a;
            --text-muted: #8da0b8;
            --border: #dde5ef;
            --accent: #f15a24;
            --accent-light: rgba(241, 90, 36, 0.12);
            --sidebar-text: #4b5f7a;
            --sidebar-hover: rgba(15, 36, 65, 0.05);
            --sidebar-active-bg: rgba(241, 90, 36, 0.1);
            --sidebar-active-text: #f15a24;
            --sidebar-border: #dde5ef;
            --sidebar-label: #8da0b8;
            --sidebar-logo: #0f2441;
            --shadow-card: 0 1px 4px rgba(15, 36, 65, 0.08), 0 4px 20px rgba(15, 36, 65, 0.06);
            --shadow-nav: 0 2px 12px rgba(15, 36, 65, 0.12);
        }

        /* =====================================================
           DARK MODE — Deep Navy Design System
        ===================================================== */
        .dark {
            --bg-page: #080f1a;
            --bg-sidebar: #0a1628;
            --bg-card: #0d1e33;
            --text-primary: #e8f0fe;
            --text-secondary: #8da0b8;
            --text-muted: #4b5f7a;
            --border: rgba(255, 255, 255, 0.07);
            --sidebar-text: rgba(255, 255, 255, 0.55);
            --sidebar-hover: rgba(255, 255, 255, 0.05);
            --sidebar-active-bg: rgba(241, 90, 36, 0.15);
            --sidebar-active-text: #f97316;
            --sidebar-border: rgba(255, 255, 255, 0.06);
            --sidebar-label: rgba(255, 255, 255, 0.3);
            --sidebar-logo: #ffffff;
            --shadow-card: 0 1px 4px rgba(0, 0, 0, 0.3), 0 4px 20px rgba(0, 0, 0, 0.4);
            --shadow-nav: 0 2px 12px rgba(0, 0, 0, 0.4);
        }

        body {
            background-color: var(--bg-page);
            color: var(--text-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* --- Sidebar --- */
        .admin-sidebar {
            background: var(--bg-sidebar);
            border-right: 1px solid var(--sidebar-border);
            box-shadow: 2px 0 16px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .dark .admin-sidebar {
            box-shadow: 2px 0 16px rgba(0, 0, 0, 0.3);
        }

        .sidebar-logo-text {
            color: var(--sidebar-logo);
        }

        .sidebar-logo-accent {
            color: #f15a24;
        }

        .sidebar-label {
            color: var(--sidebar-label);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0 16px;
            margin: 24px 0 8px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 10px;
            margin: 2px 8px;
            color: var(--sidebar-text);
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .sidebar-link:hover {
            background: var(--sidebar-hover);
            color: var(--text-primary);
        }

        .sidebar-link.active {
            background: var(--sidebar-active-bg);
            color: var(--sidebar-active-text);
            font-weight: 600;
        }

        .sidebar-link .icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            opacity: 0.7;
            transition: opacity 0.15s;
        }

        .sidebar-link:hover .icon,
        .sidebar-link.active .icon {
            opacity: 1;
        }

        /* --- Cards --- */
        .admin-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow-card);
        }

        /* --- Topbar --- */
        .admin-topbar {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow-nav);
        }

        /* --- Form Controls --- */
        input:not([type="checkbox"]):not([type="radio"]):not([type="file"]),
        select,
        textarea {
            background: var(--bg-card) !important;
            color: var(--text-primary) !important;
            border-color: var(--border) !important;
        }

        input:not([type="checkbox"]):not([type="radio"]):not([type="file"])::placeholder,
        textarea::placeholder {
            color: var(--text-muted) !important;
        }

        input:not([type="checkbox"]):not([type="radio"]):not([type="file"]):focus,
        select:focus,
        textarea:focus {
            border-color: #f15a24 !important;
            box-shadow: 0 0 0 2px rgba(241, 90, 36, 0.18) !important;
        }

        select option {
            background: #0d1e33;
            color: #e8f0fe;
        }

        /* --- Stat Cards --- */
        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: var(--shadow-card);
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(15, 36, 65, 0.12);
        }

        .dark .stat-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        }

        .stat-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .stat-value {
            font-family: 'Outfit', sans-serif;
            font-size: 32px;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Sidebar collapse */
        .sidebar-collapsed {
            transform: translateX(-100%);
        }

        /* Table styles */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table thead tr {
            border-bottom: 2px solid var(--border);
        }

        .admin-table thead th {
            padding: 12px 16px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            text-align: left;
        }

        .admin-table tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border);
            color: var(--text-secondary);
            font-size: 13.5px;
        }

        .admin-table tbody tr:last-child td {
            border-bottom: none;
        }

        .admin-table tbody tr:hover td {
            background: rgba(15, 36, 65, 0.03);
        }

        .dark .admin-table tbody tr:hover td {
            background: rgba(255, 255, 255, 0.03);
        }

        /* Badge */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .badge-pending {
            background: rgba(245, 158, 11, 0.12);
            color: #d97706;
        }

        .badge-approved {
            background: rgba(16, 185, 129, 0.12);
            color: #059669;
        }

        .badge-rejected {
            background: rgba(239, 68, 68, 0.12);
            color: #dc2626;
        }

        .badge-suspended {
            background: rgba(107, 114, 128, 0.12);
            color: #6b7280;
        }

        .badge-active {
            background: rgba(16, 185, 129, 0.12);
            color: #059669;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(15, 36, 65, 0.15);
            border-radius: 10px;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.12);
        }

        /* Page heading */
        .admin-page-title {
            font-family: 'Outfit', sans-serif;
            font-size: 24px;
            font-weight: 800;
            color: var(--text-primary);
        }

        .admin-page-subtitle {
            font-size: 13.5px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* Flash message */
        .flash-success {
            background: rgba(16, 185, 129, 0.1);
            border-left: 4px solid #10b981;
            color: #065f46;
            border-radius: 0 12px 12px 0;
        }

        .dark .flash-success {
            background: rgba(16, 185, 129, 0.1);
            color: #6ee7b7;
        }

        .flash-error {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
            color: #991b1b;
            border-radius: 0 12px 12px 0;
        }

        .dark .flash-error {
            background: rgba(239, 68, 68, 0.12);
            color: #fca5a5;
        }

        .validation-modal-backdrop {
            background: rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(4px);
        }

        .validation-modal {
            background: var(--bg-card);
            border: 1px solid rgba(239, 68, 68, 0.2);
            box-shadow: 0 24px 60px rgba(2, 6, 23, 0.38);
        }

        .validation-bullet {
            background: rgba(239, 68, 68, 0.12);
            color: #ef4444;
        }

        .field-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.16) !important;
        }

        /* Dropdown */
        .admin-dropdown {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 8px 32px rgba(15, 36, 65, 0.14);
        }

        .admin-dropdown a,
        .admin-dropdown button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 9px 16px;
            font-size: 13.5px;
            color: var(--text-secondary);
            transition: all 0.12s;
        }

        .admin-dropdown a:hover,
        .admin-dropdown button:hover {
            background: var(--accent-light);
            color: var(--accent);
        }
    </style>
</head>

<body x-data="{ 
    sidebarOpen: window.innerWidth >= 1024,
    profileOpen: false,
    validationModalOpen: {{ $errors->any() ? 'true' : 'false' }},
    validationErrors: {{ \Illuminate\Support\Js::from($errors->any() ? collect($errors->all())->unique()->values()->all() : []) }}
}" x-init="
    window.addEventListener('resize', () => { if (window.innerWidth >= 1024) { sidebarOpen = true; } });
    window.addEventListener('admin-validation-errors', (event) => {
        validationErrors = event.detail.errors || [];
        validationModalOpen = validationErrors.length > 0;
    });
">

    <div x-show="sidebarOpen && window.innerWidth < 1024"
        x-transition.opacity
        x-cloak
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-slate-950/45 backdrop-blur-[2px] lg:hidden"></div>

    <!-- Sidebar -->
    <aside class="admin-sidebar fixed inset-y-0 left-0 z-50 w-64 transition-transform duration-300 ease-in-out"
        :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">

        <!-- Logo -->
        <div class="flex items-center h-16 px-4 sm:px-6 flex-shrink-0" style="border-bottom: 1px solid var(--sidebar-border);">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center flex-shrink-0 w-full px-2" style="height: 100%;">
                <img src="{{ asset('images/logo.png') }}" alt="Onscholarship" class="h-8 w-auto object-contain brightness-0 invert">
            </a>
            <button @click="sidebarOpen = false"
                class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 text-white/80 hover:bg-white/10 hover:text-white transition"
                aria-label="Close admin menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="p-3 flex-1 overflow-y-auto" @click="if (window.innerWidth < 1024) { sidebarOpen = false; }">
            <div class="sidebar-label">Overview</div>
            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <div class="sidebar-label">Management</div>
            <a href="{{ route('admin.agents.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.agents.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Agent Approvals
            </a>
            <a href="{{ route('admin.contact_requests.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.contact_requests.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact Messages
            </a>
            <a href="{{ route('admin.students.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Students
            </a>
            <a href="{{ route('admin.applications.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.applications.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Applications
            </a>
            <a href="{{ route('admin.application_fees.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.application_fees.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .672-3 1.5S10.343 11 12 11s3 .672 3 1.5S13.657 14 12 14m0-6V6m0 8v2m9-4a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Application Fees
            </a>
            <a href="{{ route('admin.universities.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.universities.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 8h8" />
                </svg>
                Universities
            </a>
            <a href="{{ route('admin.programs.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Programs
            </a>
            <a href="{{ route('admin.scholarships.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.scholarships.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Scholarships
            </a>

            <div class="sidebar-label">Content</div>
            <a href="{{ route('admin.blog.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Blog Posts
            </a>
            <a href="{{ route('admin.blog_categories.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.blog_categories.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Categories
            </a>

            <div class="sidebar-label">System</div>
            <a href="{{ route('admin.settings.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Settings
            </a>

            <!-- Quick View Website -->
            <div class="mt-4 mx-2 mb-2">
                <a href="{{ route('home') }}" target="_blank"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-medium transition"
                    style="border: 1px solid var(--sidebar-border); color: var(--sidebar-text);">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Website
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="transition-all duration-300 ease-in-out" :class="{'lg:ml-64': sidebarOpen}">

        <!-- Top Header -->
        <header class="admin-topbar sticky top-0 z-40 h-16 px-4 sm:px-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Hamburger -->
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-lg hover:bg-[var(--border)] transition text-[var(--text-secondary)]"
                    aria-label="Toggle admin sidebar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Page Breadcrumb -->
                <div class="hidden md:flex items-center gap-2 text-sm">
                    <span class="font-semibold" style="color: var(--text-primary);">Admin</span>
                    <span style="color: var(--text-muted);">/</span>
                    <span style="color: var(--text-muted);">Dashboard</span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <!-- Notification Bell -->
                <a href="{{ route('notifications.index') }}"
                    class="relative p-2 rounded-lg hover:bg-[var(--border)] transition"
                    style="color: var(--text-secondary);">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </a>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false"
                        class="flex items-center gap-2.5 px-3 py-1.5 rounded-xl hover:bg-[var(--border)] transition">
                        <div class="w-8 h-8 rounded-full bg-[#0f2441] text-white flex items-center justify-center font-bold text-sm shadow-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="hidden md:block text-left">
                            <p class="text-xs font-bold leading-tight" style="color: var(--text-primary);">{{ explode(' ', auth()->user()->name)[0] }}</p>
                            <p class="text-[10px] leading-tight" style="color: var(--text-muted);">Administrator</p>
                        </div>
                        <svg class="w-3.5 h-3.5 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--text-muted);">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition.opacity
                        class="admin-dropdown absolute right-0 mt-2 w-52 z-50 overflow-hidden py-1">
                        <div class="px-4 py-3 border-b" style="border-color: var(--border);">
                            <p class="text-xs font-bold" style="color: var(--text-primary);">{{ auth()->user()->name }}</p>
                            <p class="text-xs truncate" style="color: var(--text-muted);">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('home') }}" target="_blank">View Website</a>
                        <div style="border-top: 1px solid var(--border); margin: 4px 0;"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-500 hover:!bg-red-50 dark:hover:!bg-red-900/20 hover:!text-red-600">
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 sm:p-6 lg:p-8 min-h-[calc(100vh-4rem)]">
            <!-- Flash Messages -->
            @if(session('success'))
            <div class="flash-success mb-6 p-4 rounded-r-xl flex justify-between items-center"
                x-data="{ show: true }" x-show="show" x-transition>
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-green-500 hover:text-green-700 p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="flash-error mb-6 p-4 flex justify-between items-center"
                x-data="{ show: true }" x-show="show" x-transition>
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
                <button @click="show = false" class="p-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg></button>
            </div>
            @endif

            <div x-cloak x-show="validationModalOpen" x-transition.opacity class="fixed inset-0 z-[90] flex items-center justify-center px-4">
                <div class="validation-modal-backdrop absolute inset-0" @click="validationModalOpen = false"></div>
                <div class="validation-modal relative w-full max-w-xl rounded-3xl p-6 sm:p-7">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-red-500" style="background: rgba(239, 68, 68, 0.15);">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-black brand-font" style="color: var(--text-primary);">Please Complete The Required Fields</h2>
                                <p class="mt-1 text-sm" style="color: var(--text-secondary);">Review the items below, fill in the missing information, and submit the form again.</p>
                            </div>
                        </div>
                        <button type="button" @click="validationModalOpen = false" class="rounded-xl p-2 text-[var(--text-muted)] hover:bg-white/5 hover:text-[var(--text-primary)] transition" aria-label="Close validation popup">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-6 space-y-3 max-h-[50vh] overflow-y-auto pr-1">
                        <template x-for="(error, index) in validationErrors" :key="index">
                            <div class="flex items-start gap-3 rounded-2xl border border-red-500/15 px-4 py-3" style="background: rgba(239, 68, 68, 0.06);">
                                <span class="validation-bullet mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full text-xs font-bold" x-text="index + 1"></span>
                                <p class="text-sm font-medium leading-6" style="color: var(--text-primary);" x-text="error"></p>
                            </div>
                        </template>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" @click="validationModalOpen = false" class="rounded-xl bg-[#f15a24] px-5 py-2.5 text-sm font-bold text-white transition hover:bg-[#d94a1c]">
                            Continue Editing
                        </button>
                    </div>
                </div>
            </div>

            @yield('content')
            {{ $slot ?? '' }}
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('form[data-admin-validate="true"]').forEach(function(form) {
                var requiredFields = Array.from(form.querySelectorAll('[required]'));

                function getFieldLabel(field) {
                    if (field.dataset.fieldLabel) {
                        return field.dataset.fieldLabel;
                    }

                    if (field.id) {
                        var explicitLabel = form.querySelector('label[for="' + field.id + '"]');
                        if (explicitLabel) {
                            return explicitLabel.textContent.replace('*', '').trim();
                        }
                    }

                    var wrapper = field.closest('div');
                    var nearbyLabel = wrapper ? wrapper.querySelector('label') : null;

                    if (nearbyLabel) {
                        return nearbyLabel.textContent.replace('*', '').trim();
                    }

                    return field.name.replace(/_/g, ' ').replace(/\b\w/g, function(letter) {
                        return letter.toUpperCase();
                    });
                }

                function isEmpty(field) {
                    if (field.type === 'checkbox' || field.type === 'radio') {
                        return !field.checked;
                    }

                    if (field.tagName === 'SELECT') {
                        return field.value === null || field.value === '';
                    }

                    return field.value.trim() === '';
                }

                function clearFieldError(field) {
                    field.classList.remove('field-error');
                }

                function applyFieldError(field) {
                    field.classList.add('field-error');
                }

                requiredFields.forEach(function(field) {
                    ['input', 'change'].forEach(function(eventName) {
                        field.addEventListener(eventName, function() {
                            if (!isEmpty(field)) {
                                clearFieldError(field);
                            }
                        });
                    });
                });

                form.addEventListener('submit', function(event) {
                    var missingFields = [];

                    requiredFields.forEach(function(field) {
                        if (isEmpty(field)) {
                            applyFieldError(field);
                            missingFields.push(getFieldLabel(field) + ' is required.');
                        } else {
                            clearFieldError(field);
                        }
                    });

                    if (missingFields.length > 0) {
                        event.preventDefault();
                        window.dispatchEvent(new CustomEvent('admin-validation-errors', {
                            detail: {
                                errors: Array.from(new Set(missingFields))
                            }
                        }));

                        var firstInvalid = requiredFields.find(isEmpty);
                        if (firstInvalid) {
                            firstInvalid.focus();
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
