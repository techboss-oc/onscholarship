@extends('layouts.admin')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <h1 class="admin-page-title">Dashboard</h1>
    <p class="admin-page-subtitle">Welcome back, {{ explode(' ', auth()->user()->name)[0] }}. Here's what's happening today.</p>
</div>

<!-- Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

    <!-- Total Students -->
    <div class="stat-card">
        <div>
            <p class="stat-label">Total Students</p>
            <p class="stat-value">{{ number_format($totalStudents) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Registered learners</p>
        </div>
        <div class="stat-icon" style="background: rgba(59,130,246,0.12);">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
    </div>

    <!-- Pending Agents -->
    <a href="{{ route('admin.agents.index') }}" class="stat-card relative overflow-hidden group cursor-pointer" style="{{ $pendingAgents > 0 ? 'border-color: rgba(241,90,36,0.3);' : '' }}">
        @if($pendingAgents > 0)
            <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-transparent dark:from-orange-900/10 dark:to-transparent rounded-2xl"></div>
        @endif
        <div class="relative z-10">
            <p class="stat-label">Pending Agents</p>
            <p class="stat-value {{ $pendingAgents > 0 ? 'text-[#f15a24]' : '' }}">{{ number_format($pendingAgents) }}</p>
            <p class="text-xs mt-2 {{ $pendingAgents > 0 ? 'text-[#f15a24]/70' : '' }}" style="{{ $pendingAgents > 0 ? '' : 'color: var(--text-muted);' }}">
                {{ $pendingAgents > 0 ? 'Awaiting review →' : 'All caught up' }}
            </p>
        </div>
        <div class="stat-icon relative z-10" style="background: rgba(241,90,36,0.12);">
            <svg class="w-6 h-6 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
    </a>

    <!-- Total Agents -->
    <div class="stat-card">
        <div>
            <p class="stat-label">Total Agents</p>
            <p class="stat-value">{{ number_format($totalAgents) }}</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Partnership accounts</p>
        </div>
        <div class="stat-icon" style="background: rgba(16,185,129,0.12);">
            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
    </div>

    <!-- Quick Link: Applications -->
    <a href="{{ route('admin.applications.index') }}" class="stat-card cursor-pointer group">
        <div>
            <p class="stat-label">Applications</p>
            <p class="stat-value group-hover:text-[#f15a24] transition-colors">→</p>
            <p class="text-xs mt-2" style="color: var(--text-muted);">Review & manage</p>
        </div>
        <div class="stat-icon" style="background: rgba(139,92,246,0.12);">
            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
    </a>
</div>

<!-- Quick Actions + Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Quick Actions -->
    <div class="admin-card p-6">
        <h2 class="brand-font font-bold text-base mb-5" style="color: var(--text-primary);">Quick Actions</h2>
        <div class="space-y-2">
            <a href="{{ route('admin.agents.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: rgba(241,90,36,0.12);">
                    <svg class="w-4 h-4 text-[#f15a24]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--text-primary);">Review Agent Requests</p>
                    <p class="text-xs" style="color: var(--text-muted);">Approve or reject pending agents</p>
                </div>
                <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('admin.students.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.12);">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--text-primary);">View All Students</p>
                    <p class="text-xs" style="color: var(--text-muted);">Browse student roster</p>
                </div>
                <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('admin.applications.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: rgba(139,92,246,0.12);">
                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--text-primary);">Manage Applications</p>
                    <p class="text-xs" style="color: var(--text-muted);">Update application statuses</p>
                </div>
                <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('admin.universities.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: rgba(16,185,129,0.12);">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 8h8"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--text-primary);">Universities</p>
                    <p class="text-xs" style="color: var(--text-muted);">Manage partner institutions</p>
                </div>
                <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('admin.settings.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-white/5 transition group">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background: rgba(107,114,128,0.12);">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--text-primary);">System Settings</p>
                    <p class="text-xs" style="color: var(--text-muted);">Configure platform options</p>
                </div>
                <svg class="w-4 h-4 ml-auto opacity-0 group-hover:opacity-100 transition" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <!-- Activity Log Placeholder -->
    <div class="admin-card p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-5">
            <h2 class="brand-font font-bold text-base" style="color: var(--text-primary);">Recent Activity</h2>
            <span class="badge badge-pending">Coming Soon</span>
        </div>

        <div class="flex flex-col items-center justify-center py-16 text-center">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4" style="background: var(--border);">
                <svg class="w-8 h-8" style="color: var(--text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <p class="text-sm font-semibold" style="color: var(--text-secondary);">No recent activity</p>
            <p class="text-xs mt-1" style="color: var(--text-muted);">Activity logging will be available in the next update.</p>
        </div>
    </div>
</div>
@endsection
